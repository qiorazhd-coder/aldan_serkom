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


Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/daftar-ekstrakulikuler', [ekstrakulikulerController::class, 'publicIndex'])->name('landing.ekstrakulikuler');
Route::get('/daftar-ekstrakulikuler/detail/{id}', [ekstrakulikulerController::class, 'publicDetail'])->name('landing.ekstrakulikuler.detail');

Route::get('/berita/detail/{id}', [beritaController::class, 'showDetail'])->name('berita.detail');
Route::get('/guru/detail/{id}', [guruController::class, 'showDetail'])->name('guru.detail');
Route::get('/siswa/detail/{id}', [siswaController::class, 'showDetail'])->name('siswa.detail');
Route::get('/ekstrakulikuler/detail/{id}', [ekstrakulikulerController::class, 'showDetail'])->name('ekstrakulikuler.detail');
Route::get('/guru/detail/{id}', [guruController::class, 'showDetail'])->name('guru.detail');
Route::get('/galeri/detail/{id}', [galeriController::class, 'showDetail'])->name('galeri.detail');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/profileSekolah', [profileSekolahController::class, 'index'])->name('profileSekolah.index');
    Route::get('/profileSekolah/edit', [profileSekolahController::class, 'edit'])->name('profileSekolah.edit');
    Route::put('/profileSekolah/update', [profileSekolahController::class, 'update'])->name('profileSekolah.update');

    Route::get('/berita', [beritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [beritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [beritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [beritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [beritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [beritaController::class, 'destroy'])->name('berita.destroy');

    Route::get('/guru', [guruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [guruController::class, 'create'])->name('guru.create');
    Route::post('/guru', [guruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [guruController::class, 'edit'])->name('guru.edit');
    Route::put('/guru/{id}', [guruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [guruController::class, 'destroy'])->name('guru.destroy');

    Route::get('/siswa', [siswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [siswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [siswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [siswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [siswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [siswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get('/ekstrakulikuler', [ekstrakulikulerController::class, 'index'])->name('ekstrakulikuler.index');
    Route::get('/ekstrakulikuler/create', [ekstrakulikulerController::class, 'create'])->name('ekstrakulikuler.create');
    Route::post('/ekstrakulikuler', [ekstrakulikulerController::class, 'store'])->name('ekstrakulikuler.store');
    Route::get('/ekstrakulikuler/{id}/edit', [ekstrakulikulerController::class, 'edit'])->name('ekstrakulikuler.edit');
    Route::put('/ekstrakulikuler/{id}', [ekstrakulikulerController::class, 'update'])->name('ekstrakulikuler.update');
    Route::delete('/ekstrakulikuler/{id}', [ekstrakulikulerController::class, 'destroy'])->name('ekstrakulikuler.destroy');

    Route::get('/galeri', [galeriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [galeriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [galeriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [galeriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [galeriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [galeriController::class, 'destroy'])->name('galeri.destroy');

    Route::get('/user', [userController::class, 'index'])->name('user.index');
    Route::get('/user/create', [userController::class, 'create'])->name('user.create');
    Route::post('/user', [userController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [userController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [userController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [userController::class, 'destroy'])->name('user.destroy');

});