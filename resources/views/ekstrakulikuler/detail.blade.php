@extends('layouts.template')

@section('content')
<div class="container py-4" style="margin-bottom: 80px;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border-0">
                
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2 d-inline-block">Detail Ekstrakurikuler</span>
                        <h2 class="fw-bold text-dark mb-0">{{ $ekstrakulikuler->nama_ekskul }}</h2>
                    </div>
                    <!-- Tombol Kembali ke Indeks -->
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                @if($ekstrakulikuler->gambar)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $ekstrakulikuler->gambar)) }}" alt="{{ $ekstrakulikuler->nama_ekskul }}" class="img-fluid rounded-4 shadow-sm" style="max-height: 400px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <div class="row g-3 text-secondary mb-4">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <strong><i class="fa-solid fa-user-tie me-2 text-warning"></i>Pembina:</strong>
                            <div class="text-dark fw-semibold mt-1">{{ $ekstrakulikuler->pembina ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3 border">
                            <strong><i class="fa-solid fa-calendar-days me-2 text-warning"></i>Jadwal Latihan:</strong>
                            <div class="text-dark fw-semibold mt-1">{{ $ekstrakulikuler->jadwal_latihan ?? '-' }}</div>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h5 class="fw-bold text-dark mb-3">Deskripsi Kegiatan</h5>
                    <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                        {!! $ekstrakulikuler->deskripsi ?? '<span class="text-muted fst-italic">Belum ada deskripsi.</span>' !!}
                    </div>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <a href="{{ route('ekstrakulikuler.index') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold" style="background-color: #0d233a;">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection