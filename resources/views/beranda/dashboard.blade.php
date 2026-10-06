@extends('layouts.template')

@section('content')
<div class="container-fluid px-4">
    <!-- Header Selamat Datang -->
    <div class="p-4 mb-4 text-white rounded-4 shadow-sm" style="background: linear-gradient(135deg, #0d233a 0%, #1a365d 100%);">
        <h2 class="fw-bold mb-2">Selamat Datang di SAKOLA PANEL! 👋</h2>
        <p class="mb-0 text-light opacity-75">Sistem Manajemen Informasi Sekolah. Kelola data sekolah, profil, siswa, berita, dan galeri secara mudah dan terintegrasi.</p>
    </div>

    <!-- Statistik Card Ringkas -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">TOTAL SISWA</span>
                        <h3 class="fw-bold mb-0 text-dark">{{ $totalSiswa ?? 5 }}</h3>
                    </div>
                    <div class="bg-success text-white p-3 rounded-3 shadow-sm">
                        <i class="fa-solid fa-user-graduate fa-lg"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="{{ route('siswa.index') }}" class="text-decoration-none small text-primary fw-semibold">Kelola Data Siswa &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">GURU & STAF</span>
                        <h3 class="fw-bold mb-0 text-dark">{{ $totalGuru ?? 5 }}</h3>
                    </div>
                    <div class="bg-primary text-white p-3 rounded-3 shadow-sm">
                        <i class="fa-solid fa-chalkboard-user fa-lg"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="{{ route('guru.index') }}" class="text-decoration-none small text-primary fw-semibold">Kelola Guru & Staf &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">BERITA & INFORMASI</span>
                        <h3 class="fw-bold mb-0 text-dark">{{ $totalBerita ?? 2 }}</h3>
                    </div>
                    <div class="bg-warning text-dark p-3 rounded-3 shadow-sm">
                        <i class="fa-solid fa-newspaper fa-lg"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="{{ route('berita.index') }}" class="text-decoration-none small text-primary fw-semibold">Kelola Berita &rarr;</a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm p-3 rounded-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small fw-semibold">GALERI FOTO</span>
                        <h3 class="fw-bold mb-0 text-dark">{{ $totalGaleri ?? 3 }}</h3>
                    </div>
                    <div class="bg-info text-white p-3 rounded-3 shadow-sm">
                        <i class="fa-solid fa-images fa-lg"></i>
                    </div>
                </div>
                <hr class="my-2">
                <a href="{{ route('galeri.index') }}" class="text-decoration-none small text-primary fw-semibold">Kelola Galeri &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Informasi Singkat & Akses Cepat -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-info text-primary me-2"></i>Informasi Sekolah</h5>
                <hr>
                <div class="row g-3">
                    <div class="col-md-6">
                        <span class="text-muted small">Nama Sekolah</span>
                        <h6 class="fw-bold text-dark">{{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small">Kepala Sekolah</span>
                        <h6 class="fw-bold text-dark">{{ $globalProfile->kepala_sekolah ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small">NPSN</span>
                        <h6 class="fw-bold text-dark">{{ $globalProfile->npsn ?? '-' }}</h6>
                    </div>
                    <div class="col-md-6">
                        <span class="text-muted small">Kontak Utama</span>
                        <h6 class="fw-bold text-dark">{{ $globalProfile->kontak ?? '-' }}</h6>
                    </div>
                    <div class="col-12">
                        <span class="text-muted small">Alamat Lengkap</span>
                        <h6 class="fw-bold text-dark">{{ $globalProfile->alamat ?? '-' }}</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i>Akses Cepat</h5>
                <hr>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('siswa.index') }}" class="btn btn-light text-start p-2.5 rounded-3 border d-flex justify-content-between align-items-center">
                        <span><i class="fa-solid fa-user-plus text-success me-2"></i> Tambah Siswa Baru</span>
                        <i class="fa-solid fa-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('guru.index') }}" class="btn btn-light text-start p-2.5 rounded-3 border d-flex justify-content-between align-items-center">
                        <span><i class="fa-solid fa-chalkboard-user text-primary me-2"></i> Tambah Guru / Staf</span>
                        <i class="fa-solid fa-chevron-right small text-muted"></i>
                    </a>
                    <a href="{{ route('berita.create') }}" class="btn btn-light text-start p-2.5 rounded-3 border d-flex justify-content-between align-items-center">
                        <span><i class="fa-solid fa-newspaper text-warning me-2"></i> Buat Berita / Pengumuman</span>
                        <i class="fa-solid fa-chevron-right small text-muted"></i>
                    </a>
                    @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
                    <a href="{{ route('user.index') }}" class="btn btn-light text-start p-2.5 rounded-3 border d-flex justify-content-between align-items-center">
                        <span><i class="fa-solid fa-users-gear text-danger me-2"></i> Manajemen Pengguna</span>
                        <i class="fa-solid fa-chevron-right small text-muted"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection