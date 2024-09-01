<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanSuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $surat_keluar = SuratKeluar::query();

        // Filtering based on search query
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

        // Filtering based on date
        if ($request->has('filter_tgl') && !empty($request->filter_tgl)) {
            $surat_keluar->whereDate('tanggal_keluar', $request->filter_tgl);
        }

        // Paginate the results
        $surat_keluar = $surat_keluar->paginate($request->input('show', 10));

        return view('laporan_surat_keluar', compact('surat_keluar'));
    }

    public function downloadPDF(Request $request)
{
    $surat_keluar = SuratKeluar::query();

    // Filtering based on date
    if ($request->has('date') && !empty($request->date)) {
        $surat_keluar->whereDate('tanggal_keluar', $request->date);
    }

    $data = $surat_keluar->get();

    // Generate PDF
    $pdf = app('dompdf.wrapper');
    $pdf->loadView('download_laporan_surat_keluar', compact('data'));

    return $pdf->download('laporan_surat_keluar.pdf');
}

}
