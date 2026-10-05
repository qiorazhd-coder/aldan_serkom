<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\profileSekolahController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\ekstrakulikulerController;
use App\Http\Controllers\galeriController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AuthController;



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');


Route::post('/login', [AuthController::class, 'login'])->name('login.process');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin.index');


    Route::get('/profileSekolah',[profileSekolahController::class, 'index'])->name('profileSekolah.index');


    Route::get('/berita',[beritaController::class, 'index'])->name('berita.index');


    Route::get('/guru',[guruController::class, 'index'])->name('guru.index');


    Route::get('/siswa',[siswaController::class, 'index'])->name('siswa.index');


    Route::get('/ekstrakurikuler',[ekstrakulikulerController::class, 'index'])->name('ekstrakurikuler.index');


    Route::get('/galeri',[galeriController::class, 'index'])->name('galeri.index');


    Route::get('/user',[userController::class, 'index'])->name('user.index');

});
