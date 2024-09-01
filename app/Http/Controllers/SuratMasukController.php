<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    public function index(Request $request)
{
    $surat_masuk = SuratMasuk::query();

    // Filtering based on search query
    if ($request->has('search') && !empty($request->search)) {
        $surat_masuk->where(function($query) use ($request) {
            $query->where('no_surat_masuk', 'like', '%' . $request->search . '%')
                  ->orWhere('judul_surat_masuk', 'like', '%' . $request->search . '%')
                  ->orWhere('jenis_surat', 'like', '%' . $request->search . '%')
                  ->orWhere('asal_surat', 'like', '%' . $request->search . '%')
                  ->orWhere('tanggal_masuk', 'like', '%' . $request->search . '%')
                  ->orWhere('berkas_surat_masuk', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        });
    }

    // Paginate the results
    $surat_masuk = $surat_masuk->paginate($request->input('show', 10));

    return view('surat_masuk', compact('surat_masuk'));
}
    public function suratMasukStore(Request $request)
    {
        if ($request->hasFile('berkas_surat_masuk')) {
            $file = $request->file('berkas_surat_masuk');

            $fileName = time() . '_' . $file->getClientOriginalName();
            // Or using unique identifier
            // $fileName = uniqid() . '_' . $file->getClientOriginalName();

            $file->storeAs('public/surat_masuk', $fileName);
        }

        $surat_masuk = new SuratMasuk();
        $surat_masuk->no_surat_masuk = $request->input('no_surat_masuk');
        $surat_masuk->judul_surat_masuk = $request->input('judul_surat_masuk');
        $surat_masuk->jenis_surat = $request->input('jenis_surat');
        $surat_masuk->asal_surat = $request->input('asal_surat');
        $surat_masuk->tanggal_masuk = $request->input('tanggal_masuk');
        // $surat_masuk->tanggal_diterima = $request->input('tanggal_diterima');

        $surat_masuk->berkas_surat_masuk = $fileName;

        $surat_masuk->keterangan = $request->input('keterangan');

        $surat_masuk->save();

        return redirect()->route('surat.masuk.index')->with('success', 'Surat keluar berhasil dibuat!');
    }

    public function destroy($id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);

        $surat_masuk->delete();

        return redirect()->back()->with('success', 'Surat masuk berhasil dihapus!');
    }

    public function edit($id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);

        return view('edit_surat_masuk', compact('surat_masuk'));
    }
    public function update(Request $request, $id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);

        $surat_masuk->no_surat_masuk = $request->no_surat_masuk;
        $surat_masuk->judul_surat_masuk = $request->judul_surat_masuk;
        $surat_masuk->jenis_surat = $request->jenis_surat;
        $surat_masuk->asal_surat = $request->asal_surat;
        $surat_masuk->tanggal_masuk = $request->tanggal_masuk;
        // $surat_masuk->tanggal_diterima = $request->tanggal_diterima;
        $surat_masuk->keterangan = $request->keterangan;

        if ($request->hasFile('berkas_surat_masuk')) {
            $file = $request->file('berkas_surat_masuk');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Delete old file if it exists
            if ($surat_masuk->berkas_surat_masuk) {
                Storage::delete('public/surat_masuk/' . $surat_masuk->berkas_surat_masuk);
            }

            $file->storeAs('public/surat_masuk', $fileName);
            $surat_masuk->berkas_surat_masuk = $fileName;
        }

        $surat_masuk->save();

        return redirect()->route('surat.masuk.index')->with('success', 'Surat berhasil diperbarui');
    }

    public function showDisposisi($id_surat_masuk)
{
    $suratMasuk = SuratMasuk::findOrFail($id_surat_masuk);
    $disposisi = $suratMasuk->disposisi;

    return view('disposisi_surat_masuk', compact('disposisi', 'suratMasuk'));
}

}
