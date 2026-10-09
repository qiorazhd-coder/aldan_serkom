@extends('layouts.template')

@section('content')
    <div class="container-fluid px-4">

        <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 text-white" style="background-color: #0b1f3b;">
            <h2 class="fw-bold mb-2">
                Selamat Datang di Dashboard {{ $profile->nama_sekolah ?? $profileSekolah->nama_sekolah ?? 'SMK MUTIARA' }} 👋
            </h2>
            <p class="mb-0 text-white-50">Sistem Manajemen Informasi Sekolah. Kelola data sekolah, profil, siswa, berita, dan galeri secara mudah dan terintegrasi.</p>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold">TOTAL SISWA</span>
                        <div class="bg-success text-white p-2 rounded-3">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-2">{{ $totalSiswa ?? 0 }}</h3>
                    <a href="{{ route('siswa.index') }}" class="text-decoration-none small text-primary fw-semibold">
                        Kelola Data Siswa &rarr;
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold">GURU & STAF</span>
                        <div class="bg-primary text-white p-2 rounded-3">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-2">{{ $totalGuru ?? 0 }}</h3>
                    <a href="{{ route('guru.index') }}" class="text-decoration-none small text-primary fw-semibold">
                        Kelola Guru & Staf &rarr;
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold">BERITA & INFORMASI</span>
                        <div class="bg-warning text-white p-2 rounded-3">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-2">{{ $totalBerita ?? 0 }}</h3>
                    <a href="{{ route('berita.index') }}" class="text-decoration-none small text-primary fw-semibold">
                        Kelola Berita &rarr;
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold">GALERI FOTO</span>
                        <div class="bg-danger text-white p-2 rounded-3">
                            <i class="fa-solid fa-images"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-2">{{ $totalGaleri ?? 0 }}</h3>
                    <a href="{{ route('galeri.index') }}" class="text-decoration-none small text-primary fw-semibold">
                        Kelola Galeri &rarr;
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl">
                <div class="card border-0 shadow-sm p-3 rounded-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-bold">EKSTRAKURIKULER</span>
                        <div class="bg-info text-white p-2 rounded-3">
                            <i class="fa-solid fa-basketball"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-2">{{ $totalEkstrakurikuler ?? 0 }}</h3>
                    <a href="{{ route('ekstrakulikuler.index') }}" class="text-decoration-none small text-primary fw-semibold">
                        Kelola Ekstrakurikuler &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-12">
                <div class="card shadow-sm border-0 rounded-4 p-4">
                    <h5 class="fw-bold mb-4"><i class="fas fa-bolt text-warning me-2"></i> Akses Cepat</h5>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('siswa.create') }}" class="btn btn-light text-start border p-3 rounded-3 d-flex justify-content-between align-items-center w-100">
                                <span><i class="fas fa-user-plus text-success me-2"></i> Tambah Siswa</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('guru.create') }}" class="btn btn-light text-start border p-3 rounded-3 d-flex justify-content-between align-items-center w-100">
                                <span><i class="fas fa-chalkboard-teacher text-primary me-2"></i> Tambah Guru</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('berita.create') }}" class="btn btn-light text-start border p-3 rounded-3 d-flex justify-content-between align-items-center w-100">
                                <span><i class="fas fa-newspaper text-warning me-2"></i> Buat Berita</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-light text-start border p-3 rounded-3 d-flex justify-content-between align-items-center w-100">
                                <span><i class="fas fa-futbol text-info me-2"></i> Tambah Ekskul</span>
                                <i class="fas fa-chevron-right small text-muted"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="fw-bold mb-0"><i class="fas fa-newspaper text-warning me-2"></i> Berita & Informasi Terbaru</h5>
                    @if(isset($totalBerita) && $totalBerita > 3)
                        <a href="{{ route('berita.index') }}" class="btn btn-sm btn-outline-primary fw-semibold rounded-pill px-3">
                            Lihat Semua &rarr;
                        </a>
                    @endif
                </div>

                <div class="row g-3">
                    @forelse($beritaTerbaru as $berita)
                        <div class="col-12 col-md-4">
                            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden d-flex flex-column">
                                @if(isset($berita->gambar))
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $berita->gambar)) }}" 
                                         alt="Gambar Berita" 
                                         class="card-img-top" 
                                         style="height: 160px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 160px;">
                                        <i class="fas fa-image fa-2x"></i>
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column justify-content-between p-3">
                                    <div>
                                        <span class="text-muted small d-block mb-1">
                                            <i class="far fa-calendar-alt me-1"></i> {{ $berita->created_at->format('d M Y') }}
                                        </span>
                                        <h6 class="fw-bold text-dark mb-2">
                                            {{ $berita->judulkah ?? $berita->judul ?? 'Judul Berita' }}
                                        </h6>
                                        <p class="text-muted small mb-3">
                                            {{ Str::limit(strip_tags($berita->isi ?? $berita->deskripsi ?? ''), 70) }}
                                        </p>
                                    </div>
                                    <a href="{{ route('berita.index') }}" class="text-decoration-none small text-primary fw-semibold">
                                        Baca Selengkapnya &rarr;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="card border-0 shadow-sm rounded-4 p-4 text-center text-muted">
                                <p class="mb-0">Belum ada berita atau pengumuman yang diunggah.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
@endsection