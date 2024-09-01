<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $today = Carbon::today();
        $today = Carbon::today()->format('Y-m-d');


        $totalSuratMasuk = SuratMasuk::count();
        $totalSuratKeluar = SuratKeluar::count();
        // $suratMasuk = SuratMasuk::whereDate('tanggal_masuk', $today)->paginate($request->input('show', 10));
        // $suratKeluar = SuratKeluar::whereDate('tanggal_keluar', $today)->paginate($request->input('show', 10));

        $suratMasuk = SuratMasuk::whereDate('tanggal_masuk', $today)->paginate($request->input('show', 10));
        $suratKeluar = SuratKeluar::whereDate('tanggal_keluar', $today)->paginate($request->input('show', 10));
        // $suratMasuk = SuratMasuk::paginate($request->input('show', 10));
        // $suratKeluar = SuratKeluar::paginate($request->input('show', 10));

        return view('dashboard', compact('totalSuratMasuk', 'totalSuratKeluar', 'suratMasuk', 'suratKeluar'));
    }
}
