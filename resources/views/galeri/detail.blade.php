@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Detail Galeri Kegiatan
    </h4>

    <a href="{{ route('galeri.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 16px; background: #ffffff;">
                
                <div class="mb-4">
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2 d-inline-block">Galeri Kegiatan</span>
                    <h2 class="fw-bold text-dark mb-2">{{ $galeri->judul }}</h2>
                </div>

                <!-- TAMPILAN MEDIA (FOTO ATAU VIDEO) -->
                <div class="mb-4 rounded overflow-hidden shadow-sm border bg-light text-center">
                    @if(!empty($galeri->video))
                        <div class="ratio ratio-16x9">
                            <video controls class="w-100 h-100" style="object-fit: cover;">
                                <source src="{{ asset('storage/' . str_replace('public/', '', $galeri->video)) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutaran video.
                            </video>
                        </div>
                    @else
                        @php
                            $fotoGaleri = $galeri->foto ?? $galeri->gambar ?? null;
                        @endphp
                        @if($fotoGaleri)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGaleri)) }}" alt="{{ $galeri->judul }}" class="img-fluid rounded-4 shadow-sm" style="max-height: 450px; width: 100%; object-fit: cover;">
                        @else
                            <div class="py-5 text-secondary">
                                <i class="fa-solid fa-image fa-3x mb-2"></i>
                                <p class="mb-0">Tidak ada media yang diunggah.</p>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="text-muted small mb-4">
                    <i class="fa-regular fa-calendar me-1"></i> {{ $galeri->created_at ? \Carbon\Carbon::parse($galeri->created_at)->format('d M Y, H:i') : '-' }}
                    <span class="ms-3"><i class="fa-regular fa-user me-1"></i> Admin Sekolah</span>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold text-dark mb-3">Deskripsi Kegiatan</h5>
                    <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                        {{ $galeri->deskripsi ?? 'Tidak ada deskripsi.' }}
                    </div>
                </div>

                <hr class="my-4">

                <div class="text-center">
                    <a href="{{ route('galeri.index') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background-color: #0d233a;">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Galeri
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection