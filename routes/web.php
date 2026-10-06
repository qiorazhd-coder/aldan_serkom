<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\profileSekolahController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\ekstrakulikulerController;
use App\Http\Controllers\galeriController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AuthController;

// ==========================================
// RUTE PUBLIK (Bisa diakses tanpa login)
// ==========================================
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/berita/detail/{id}', [beritaController::class, 'show'])->name('berita.detail'); // Diubah sedikit path-nya agar tidak bentrok dengan resource berita admin

// ==========================================
// RUTE AUTENTIKASI
// ==========================================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE ADMIN (Harus login terlebih dahulu)
// ==========================================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/profileSekolah', [profileSekolahController::class, 'index'])->name('profileSekolah.index');
    Route::get('/profileSekolah/create', [profileSekolahController::class, 'create'])->name('profileSekolah.create');
    Route::post('/profileSekolah', [profileSekolahController::class, 'store'])->name('profileSekolah.store');
    Route::get('/profileSekolah/{id}/edit', [profileSekolahController::class, 'edit'])->name('profileSekolah.edit');
    Route::put('/profileSekolah/{id}', [profileSekolahController::class, 'update'])->name('profileSekolah.update');
    Route::delete('/profileSekolah/{id}', [profileSekolahController::class, 'destroy'])->name('profileSekolah.destroy');

    // Menggunakan Resource Berita secara normal (tanpa except) agar /berita/create berfungsi kembali
    Route::resource('berita', beritaController::class);

    Route::resource('guru', guruController::class);

    Route::resource('siswa', siswaController::class);

    Route::resource('ekstrakurikuler', ekstrakulikulerController::class);

    Route::resource('galeri', galeriController::class);

    Route::resource('user', userController::class);

});