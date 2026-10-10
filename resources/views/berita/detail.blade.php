@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Detail Berita & Informasi
    </h4>

    <a href="{{ route('berita.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 16px; background: #ffffff;">
                
                <div class="mb-4">
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2 d-inline-block">Berita & Informasi</span>
                    <h2 class="fw-bold text-dark mb-3">{{ $berita->judul }}</h2>
                </div>

                <div class="text-muted small mb-4">
                    <i class="fa-regular fa-calendar me-1"></i> {{ $berita->created_at ? \Carbon\Carbon::parse($berita->created_at)->format('d M Y, H:i') : '-' }}
                    <span class="ms-3"><i class="fa-regular fa-user me-1"></i> Admin Sekolah</span>
                </div>

                @php
                    $fotoBerita = $berita->foto ?? $berita->gambar ?? null;
                @endphp
                @if($fotoBerita)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $fotoBerita)) }}" alt="{{ $berita->judul }}" class="img-fluid rounded-4 shadow-sm" style="max-height: 450px; width: 100%; object-fit: cover;">
                    </div>
                @endif

                <div class="mb-5">
                    <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                        {!! $berita->isi ?? $berita->deskripsi ?? 'Tidak ada konten berita.' !!}
                    </div>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <a href="{{ route('berita.index') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #0d233a;">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Berita
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection