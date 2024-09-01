<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class LaporanSuratMasukController extends Controller
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

        // Filtering based on date
        if ($request->has('filter_tgl') && !empty($request->filter_tgl)) {
            $surat_masuk->whereDate('tanggal_masuk', $request->filter_tgl);
        }

        // Paginate the results
        $surat_masuk = $surat_masuk->paginate($request->input('show', 10));

        return view('laporan_surat_masuk', compact('surat_masuk'));
    }

    public function downloadPDF(Request $request)
{
    $surat_masuk = SuratMasuk::query();

    // Filtering based on date
    if ($request->has('date') && !empty($request->date)) {
        $surat_masuk->whereDate('tanggal_masuk', $request->date);
    }

    $data = $surat_masuk->get();

    // Generate PDF
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('download_laporan_surat_masuk', compact('data'));

    return $pdf->download('laporan_surat_masuk.pdf');
}
}
