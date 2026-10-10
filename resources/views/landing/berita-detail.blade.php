<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- Navbar Publik -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ url('/') }}">
                @php
                    $logoSekolah = $globalProfile->logo ?? null;
                @endphp
                @if($logoSekolah)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $logoSekolah)) }}" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;">
                @else
                    <i class="fa-solid fa-graduation-cap text-warning fs-3"></i>
                @endif
                <span class="fs-5 fw-bold text-dark">{{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</span>
            </a>
            <a href="{{ url('/') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Beranda
            </a>
        </div>
    </nav>

    <!-- Konten Detail -->
    <div class="container py-5" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    
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
                        <a href="{{ url('/') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold" style="background-color: #0d233a;">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>