<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} | {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</title>
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
        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .navbar-brand {
            font-weight: 700;
            color: #0d233a !important;
        }
        .content-card {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        }
        footer {
            background-color: #0d233a;
            color: #cbd5e1;
        }
    </style>
</head>
<body>

    <!-- Navbar dengan Logo & Nama Sekolah Dinamis dari Profil -->
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('landing') }}">
                @php
                    $logoSekolah = $globalProfile->logo ?? null;
                @endphp
                @if($logoSekolah)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $logoSekolah)) }}" alt="Logo Sekolah" style="width: 40px; height: 40px; object-fit: contain;">
                @else
                    <i class="fa-solid fa-graduation-cap text-warning fs-3"></i>
                @endif
                <span>{{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</span>
            </a>
            
            <!-- Tombol Kembali Pintar pada Navbar -->
            @auth
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-dark px-3 rounded-pill fw-semibold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            @else
                <a href="{{ route('landing') }}#berita" class="btn btn-sm btn-outline-dark px-3 rounded-pill fw-semibold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            @endauth
        </div>
    </nav>

    <!-- Konten Utama Detail Berita -->
    <main class="container" style="padding-top: 120px; padding-bottom: 80px;">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <div class="content-card p-4 p-md-5">
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-bold mb-3">Berita & Informasi</span>
                    <h1 class="fw-bold text-dark mb-3" style="font-size: 2rem; line-height: 1.3;">{{ $berita->judul }}</h1>
                    <div class="text-muted small mb-4 pb-3 border-bottom d-flex align-items-center gap-3">
                        <span><i class="fa-regular fa-calendar me-1"></i>{{ $berita->created_at->format('d M Y, H:i') }} WIB</span>
                        <span><i class="fa-regular fa-user me-1"></i>Admin Sekolah</span>
                    </div>

                    <!-- Menampilkan Gambar Berita Secara Aman -->
                    @php
                        $fotoBerita = $berita->gambar ?? $berita->foto ?? null;
                    @endphp

                    @if($fotoBerita)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoBerita)) }}" 
                                 alt="{{ $berita->judul }}" 
                                 class="img-fluid rounded-4 shadow-sm w-100 border" 
                                 style="max-height: 450px; object-fit: cover;">
                        </div>
                    @else
                        <div class="mb-4 text-center bg-light rounded-4 py-5 border">
                            <i class="fa-solid fa-newspaper fa-4x text-secondary opacity-50 mb-2"></i>
                            <p class="text-muted small mb-0">Tidak ada gambar untuk berita ini.</p>
                        </div>
                    @endif

                    <!-- Isi Berita -->
                    <div class="article-body text-secondary" style="line-height: 1.8; font-size: 1.05rem; white-space: pre-line;">
                        {!! $berita->isi !!}
                    </div>

                    <!-- Tombol Kembali Pintar di Bagian Bawah -->
                    <div class="mt-5 pt-4 border-top d-flex justify-content-between align-items-center">
                        @auth
                            <a href="{{ url()->previous() }}" class="btn btn-dark px-4 py-2 rounded-pill fw-semibold">
                                <i class="fa-solid fa-arrow-left me-2"></i>Kembali
                            </a>
                        @else
                            <a href="{{ route('landing') }}#berita" class="btn btn-dark px-4 py-2 rounded-pill fw-semibold">
                                <i class="fa-solid fa-arrow-left me-2"></i>Berita Lainnya
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-4 text-center">
        <div class="container text-muted small">
            &copy; {{ date('Y') }} {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>