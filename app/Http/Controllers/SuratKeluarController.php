<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
{
    $surat_keluar = SuratKeluar::query();

    // Filtering based on search query
    // if ($request->has('search') && !empty($request->search)) {
    //     $surat_keluar->where('judul_surat_keluar', 'like', '%' . $request->search . '%');
    // }
    if ($request->has('search') && !empty($request->search)) {
        $surat_keluar->where(function($query) use ($request) {
            $query->where('no_surat_keluar', 'like', '%' . $request->search . '%')
                  ->orWhere('judul_surat_keluar', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis_surat', 'like', '%' . $request->search . '%')
                  ->orWhere('tujuan', 'like', '%' . $request->search . '%')
                  ->orWhere('tanggal_keluar', 'like', '%' . $request->search . '%')
                  ->orWhere('berkas_surat_keluar', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        });
    }

    // Paginate the results
    $surat_keluar = $surat_keluar->paginate($request->input('show', 10));

    return view('surat_keluar', compact('surat_keluar'));
}
    public function suratKeluarStore(Request $request)
    {
        if ($request->hasFile('berkas_surat_keluar')) {
            $file = $request->file('berkas_surat_keluar');

            // $fileName = $file->getClientOriginalName();
            $fileName = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('public/surat_keluar', $fileName);
        }

        $suratKeluar = new SuratKeluar();
        $suratKeluar->no_surat_keluar = $request->input('no_surat_keluar');
        $suratKeluar->judul_surat_keluar = $request->input('judul_surat_keluar');
        $suratKeluar->jenis_surat = $request->input('jenis_surat');
        $suratKeluar->tujuan = $request->input('tujuan');
        $suratKeluar->tanggal_keluar = $request->input('tanggal_keluar');

        $suratKeluar->berkas_surat_keluar = $fileName;

        $suratKeluar->keterangan = $request->input('keterangan');

        $suratKeluar->save();

        return redirect()->route('surat.keluar.index')->with('success', 'Surat keluar berhasil dibuat!');
    }

    public function destroy($id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);

        $surat_keluar->delete();

        return redirect()->back()->with('success', 'Surat keluar berhasil dihapus!');
    }

    public function edit($id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);

        return view('edit_surat_keluar', compact('surat_keluar'));
    }
    public function update(Request $request, $id)
    {
        $surat_keluar = SuratKeluar::findOrFail($id);

        $surat_keluar->no_surat_keluar = $request->no_surat_keluar;
        $surat_keluar->judul_surat_keluar = $request->judul_surat_keluar;
        $surat_keluar->jenis_surat = $request->jenis_surat;
        $surat_keluar->tujuan = $request->tujuan;
        $surat_keluar->tanggal_keluar = $request->tanggal_keluar;
        $surat_keluar->keterangan = $request->keterangan;

        if ($request->hasFile('berkas_surat_keluar')) {
            $file = $request->file('berkas_surat_keluar');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Delete old file if it exists
            if ($surat_keluar->berkas_surat_keluar) {
                Storage::delete('public/surat_keluar/' . $surat_keluar->berkas_surat_keluar);
            }

            $file->storeAs('public/surat_keluar', $fileName);
            $surat_keluar->berkas_surat_keluar = $fileName;
        }

        $surat_keluar->save();

        return redirect()->route('surat.keluar.index')->with('success', 'Surat berhasil diperbarui');
    }
}
