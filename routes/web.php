<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\LaporanSuratMasukController;
use App\Http\Controllers\LaporanSuratKeluarController;
use App\Models\Disposisi;

Route::prefix('auth')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware('auth')->group(function () {
Route::get('/', [DashboardController::class, 'index'])->name('index');


Route::prefix('surat')->group(function () {
    Route::prefix('surat-masuk')->group(function () {
        Route::get('/tambah', function () {
            return view('tambah_surat_masuk');
        });

        Route::get('/', [SuratMasukController::class, 'index'])->name('surat.masuk.index');
        Route::post('/tambah', [SuratMasukController::class, 'suratMasukStore'])->name('surat.masuk.store');
        Route::delete('/{id}', [SuratMasukController::class, 'destroy'])->name('surat.masuk.destroy');
        Route::get('/{id}/edit', [SuratMasukController::class, 'edit'])->name('surat.masuk.edit');
        Route::post('/{id}', [SuratMasukController::class, 'update'])->name('surat.masuk.update');

        Route::post('/{id_surat_masuk}/disposisi', [DisposisiController::class, 'store'])->name('surat.masuk.disposisi.store');

        Route::get('/disposisi/{idSuratMasuk}/tambah', [DisposisiController::class, 'create'])->name('tambah.dispoisi.surat.masuk');
        Route::get('/{id_surat_masuk}/disposisi', [SuratMasukController::class, 'showDisposisi'])->name('surat.masuk.disposisi');
        Route::get('/disposisi/{idSuratMasuk}', [DisposisiController::class, 'index'])->name('disposisi.surat.masuk');

        Route::delete('/disposisi/{id}', [DisposisiController::class, 'destroy'])->name('disposisi.surat.masuk.destroy');

        Route::get('/disposisi/{id}/edit', [DisposisiController::class, 'edit'])->name('disposisi.surat.masuk.edit');
        Route::post('/disposisi/{id}', [DisposisiController::class, 'update'])->name('disposisi.surat.masuk.update');
    });

    Route::prefix('surat-keluar')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('surat.keluar.index');
        Route::delete('/{id}', [SuratKeluarController::class, 'destroy'])->name('surat.keluar.destroy');
        Route::put('/{id}', [SuratKeluarController::class, 'update'])->name('surat.keluar.update');
        Route::get('/{id}/edit', [SuratKeluarController::class, 'edit'])->name('surat.keluar.edit');
        Route::get('/tambah', function () {
            return view('tambah_surat_keluar');
        });
        Route::post('/tambah', [SuratKeluarController::class, 'suratKeluarStore'])->name('surat.keluar.store');
    });
});

Route::prefix('pengaturan')->group(function () {
    Route::get('/indeks', function () {
        return view('indeks');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/tambah', function () {
            return view('tambah_users');
        })->middleware('checkRole:admin');
        Route::get('/{id}/edit-user', [UserController::class, 'editUser'])->name('user.edit');
        Route::post('/tambah', [UserController::class, 'create'])->name('user.create');
        Route::put('/{id}/edit-user', [UserController::class, 'updateUser'])->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', function () {
            return view('profile');
        })->name('profile.index');
        Route::get('/{id}/edit-profile', [UserController::class, 'editProfile'])->name('profile.edit');
        Route::put('/{id}/edit-profile', [UserController::class, 'updateProfile'])->name('profile.update');
        Route::get('/{id}/edit-password', [UserController::class, 'editPassword'])->name('profile.edit.password');
        Route::put('/{id}', [UserController::class, 'updatePassword'])->name('profile.update.password');
    });
});

Route::prefix('laporan')->group(function () {
    Route::get('/laporan-surat-masuk', [LaporanSuratMasukController::class, 'index'])->name('laporan.surat.masuk');
    Route::get('/surat/masuk/downloadPDF', [LaporanSuratMasukController::class, 'downloadPDF'])->name('laporan.surat.masuk.downloadPDF');

    Route::get('/laporan-surat-keluar', [LaporanSuratKeluarController::class, 'index'])->name('laporan.surat.keluar');
    Route::get('/surat/keluar/downloadPDF', [LaporanSuratKeluarController::class, 'downloadPDF'])->name('laporan.surat.keluar.downloadPDF');
});

Route::get('/tentang', function () {
    return view('tentang');
});
});
