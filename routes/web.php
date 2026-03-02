<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PendudukController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PerangkatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\GaleriController;

// PUBLIC
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/berita/{id}', [PublicController::class, 'detailBerita'])->name('berita.detail');
Route::get('/profil', [PublicController::class, 'profil'])->name('profil');
Route::get('/sejarah', [PublicController::class, 'sejarah'])->name('sejarah');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/layanan', [PublicController::class, 'layanan'])->name('layanan');
Route::get('/cek-nik', [PublicController::class, 'cekNik'])->name('cek-nik');
Route::post('/cek-nik', [PublicController::class, 'prosesNik'])->name('cek-nik.proses');
Route::get('/pengaduan', [PublicController::class, 'pengaduan'])->name('pengaduan');
Route::post('/pengaduan', [PublicController::class, 'simpanPengaduan'])->name('pengaduan.simpan');

// AUTH
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN (protected)
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('penduduk', PendudukController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('perangkat', PerangkatController::class);
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::patch('/pengaduan/{id}/status', [PengaduanController::class, 'updateStatus'])->name('pengaduan.status');
    Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::resource('dokumen', DokumenController::class);
    Route::resource('galeri', GaleriController::class);
});
