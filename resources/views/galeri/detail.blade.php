<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $galeri->judul }} - {{ $globalProfile->nama_sekolah ?? 'SMK Mutiara' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #333;
        }
        .navbar-detail {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            height: 80px;
        }
    </style>
</head>
<body>

    <!-- Navbar Atas -->
    <nav class="navbar navbar-expand navbar-detail px-4 fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
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
            <a href="{{ url()->previous() }}" class="btn btn-outline-dark btn-sm rounded-pill px-3 fw-semibold">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container" style="margin-top: 120px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3">Galeri Kegiatan</span>
                    
                    <h2 class="fw-bold text-dark mb-3">{{ $galeri->judul }}</h2>
                    
                    <div class="text-muted small mb-4 d-flex align-items-center gap-3">
                        <span><i class="fa-regular fa-calendar me-1"></i> {{ $galeri->created_at ? \Carbon\Carbon::parse($galeri->created_at)->format('d M Y, H:i') : '-' }}</span>
                        <span><i class="fa-regular fa-user me-1"></i> Admin Sekolah</span>
                    </div>

                    @php
                        $fotoGaleri = $galeri->gambar ?? $galeri->foto ?? null;
                    @endphp

                    @if($fotoGaleri)
                        <div class="mb-4 text-center rounded-3 overflow-hidden shadow-sm bg-black" style="max-height: 500px;">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGaleri)) }}" 
                                 alt="{{ $galeri->judul }}" 
                                 class="img-fluid w-100" 
                                 style="max-height: 500px; object-fit: contain;">
                        </div>
                    @endif

                    <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                        {{ $galeri->deskripsi ?? 'Tidak ada deskripsi tersedia.' }}
                    </div>

                    <hr class="my-5">

                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark rounded-pill px-4 py-2 fw-semibold">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>