<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DisposisiController extends Controller
{
    public function index($idSuratMasuk)
    {
        $suratMasuk = SuratMasuk::findOrFail($idSuratMasuk);
        $disposisi = $suratMasuk->disposisi;

        return view('disposisi_surat_masuk', compact('disposisi'));
    }
    public function create($id)
    {
        $surat_masuk = SuratMasuk::findOrFail($id);

        return view('tambah_disposisi_surat_masuk', compact('surat_masuk'));
    }

    public function store(Request $request, $idSuratMasuk)
    {
        $request->validate([
            'catatan' => 'required',
            'instruksi' => 'required',
            'tujuan' => 'required',
            'pengisi' => 'required',
        ]);

        $disposisi = new Disposisi([
            'surat_masuk_id' => $idSuratMasuk,
            'catatan' => $request->get('catatan'),
            'instruksi' => $request->get('instruksi'),
            'tujuan' => $request->get('tujuan'),
            'pengisi' => $request->get('pengisi'),
        ]);

        $disposisi->save();

        return redirect()->route('surat.masuk.disposisi', $idSuratMasuk)->with('success', 'Disposisi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $disposisi = Disposisi::findOrFail($id);

        $disposisi->delete();

        return redirect()->back()->with('success', 'Surat masuk berhasil dihapus!');
    }

    public function edit($id)
    {
        $disposisi = Disposisi::findOrFail($id);

        return view('edit_disposisi_surat_masuk', compact('disposisi'));
    }

    public function update(Request $request, $id)
    {
        $disposisi = Disposisi::findOrFail($id);

        $disposisi->catatan = $request->catatan;
        $disposisi->instruksi = $request->instruksi;
        $disposisi->tujuan = $request->tujuan;
        $disposisi->pengisi = $request->pengisi;

        $disposisi->save();

        return redirect()->back()->with('success', 'Dispoisi berhasil diperbarui');
    }
}
