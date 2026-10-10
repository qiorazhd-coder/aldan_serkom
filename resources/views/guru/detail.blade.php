@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Detail Tenaga Pendidik
    </h4>

    <a href="{{ route('guru.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 16px; background: #ffffff;">
                
                <div class="row align-items-center g-5 py-3">
                    <div class="col-md-4 text-center text-md-start">
                        @php
                            $fotoGuru = $guru->foto ?? $guru->gambar ?? null;
                        @endphp
                        @if($fotoGuru)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGuru)) }}" alt="Foto Guru" class="rounded-circle shadow-sm border mx-auto d-block" style="width: 180px; height: 180px; object-fit: cover;">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow-sm mx-auto" style="width: 180px; height: 180px;">
                                <i class="fa-solid fa-user fa-4x"></i>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-8 ps-md-4 text-center text-md-start">
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 fs-6">Tenaga Pendidik</span>
                        <h2 class="fw-bold text-dark mb-4 fs-2">{{ $guru->nama_guru }}</h2>
                        
                        <ul class="list-unstyled text-secondary mb-0 fs-5" style="line-height: 2.2;">
                            <li><strong><i class="fa-solid fa-book me-2 text-warning"></i>Mata Pelajaran:</strong> {{ $guru->mapel }}</li>
                            <li><strong><i class="fa-solid fa-id-card me-2 text-warning"></i>NIP:</strong> {{ $guru->nip ?? '-' }}</li>
                            <li><strong><i class="fa-solid fa-school me-2 text-warning"></i>Status:</strong> Guru Pengajar Aktif</li>
                        </ul>
                    </div>
                </div>

                <hr class="my-5">

                <div class="text-center">
                    <a href="{{ route('guru.index') }}" class="btn text-white rounded-pill px-5 py-3 fw-semibold fs-5 shadow-sm" style="background-color: #0d233a;">
                        <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Daftar Guru
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection