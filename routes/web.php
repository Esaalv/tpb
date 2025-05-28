<?php

use App\Http\Controllers\Web\Admin\Barang\BarangController;
use App\Http\Controllers\Web\Admin\Barang\Kategori\KategoriController;
use App\Http\Controllers\Web\Admin\Barang\Satuan\SatuanController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\Laporan\LaporanController;
use App\Http\Controllers\Web\Admin\Pengguna\AdminController;
use App\Http\Controllers\Web\Admin\Pengguna\PenggunaController;
use App\Http\Controllers\Web\Admin\Permohonan\PermohonanController;
use App\Http\Controllers\Web\Auth\LoginController;
use App\Http\Controllers\Web\Auth\LogoutController;
use App\Http\Controllers\Web\Ormawa\BerandaController;
use App\Http\Controllers\Web\Ormawa\InformasiController;
use App\Http\Controllers\Web\Ormawa\KeranjangController;
use App\Http\Controllers\Web\Ormawa\PengembalianController;
use App\Http\Controllers\Web\Admin\Pengembalian\PengembalianController as PengembalianControllerAdmin;
use App\Http\Controllers\Web\Ormawa\RiwayatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('masuk', [LoginController::class, 'store'])->name('login.store');

Route::prefix('informasi')->group(function () {
    Route::get('tracking', [InformasiController::class, 'index'])->name('tracking');
    Route::get('tracking/json', [InformasiController::class, 'json'])->name('tracking.json');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::resource('admin/logout', LogoutController::class);

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('pengguna')->group(function () {
        // Route Pengguna Admin
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::post('admin', [AdminController::class, 'store'])->name('admin.store');
        Route::put('admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('admin/{admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

        // Route Pengguna Mahasiswa
        Route::get('mahasiswa', [PenggunaController::class, 'index'])->name('mahasiswa');
        Route::post('mahasiswa', [PenggunaController::class, 'store'])->name('mahasiswa.store');
        Route::put('mahasiswa/{mahasiswa}', [PenggunaController::class, 'update'])->name('mahasiswa.update');
        Route::delete('mahasiswa/{mahasiswa}', [PenggunaController::class, 'destroy'])->name('mahasiswa.destroy');
    });

    Route::prefix('kelola-barang')->group(function () {
        // Route Barang
        Route::get('data-barang', [BarangController::class, 'index'])->name('barang');
        Route::post('data-barang', [BarangController::class, 'store'])->name('barang.store');
        Route::put('data-barang/{data_barang}', [BarangController::class, 'update'])->name('barang.update');
        Route::delete('data-barang/{data_barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

        // Route Kategori
        Route::get('data-kategori', [KategoriController::class, 'index'])->name('kategori');
        Route::post('data-kategori', [KategoriController::class, 'store'])->name('kategori.store');
        Route::put('data-kategori/{data_kategori}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('data-kategori/{data_kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

        // Route Satuan
        Route::get('satuan', [SatuanController::class, 'index'])->name('satuan');
        Route::post('satuan', [SatuanController::class, 'store'])->name('satuan.store');
        Route::put('satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
        Route::delete('satuan/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');
    });

    Route::get('verifikasi-permohonan', [PermohonanController::class, 'index'])->name('verifikasi-permohonan');
    Route::put('verifikasi-permohonan/{id}', [PermohonanController::class, 'update'])->name('verifikasi-permohonan.update');

    Route::get('verifikasi-pengembalian', [PengembalianControllerAdmin::class, 'index'])->name('verifikasi-pengembalian');
    Route::put('verifikasi-pengembalian/{id}', [PengembalianControllerAdmin::class, 'update'])->name('verifikasi-pengembalian.update');

    Route::get('laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export');
});

Route::middleware(['auth:ormawa'])->group(function () {
    Route::resource('logout/ormawa', LogoutController::class);

    Route::get('beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('beranda/{nama_barang}', [BerandaController::class, 'show'])->name('beranda.show');
    Route::post('beranda/{nama_barang}/{barangId}', [BerandaController::class, 'store'])->name('beranda.store');

    Route::get('keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    Route::prefix('informasi')->group(function () {
        Route::get('pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
        Route::post('pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian.store');
    });
    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat');
});
