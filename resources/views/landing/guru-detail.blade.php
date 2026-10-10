<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guru->nama_guru ?? 'Detail Guru' }} - {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA' }}</title>
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
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm text-center">
                    
                    <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-3">Tenaga Pendidik</span>

                    <div class="mb-4">
                        @php
                            $fotoGuru = $guru->foto ?? $guru->gambar ?? null;
                        @endphp
                        @if($fotoGuru)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGuru)) }}" alt="{{ $guru->nama_guru }}" class="rounded-circle shadow-sm" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 150px; height: 150px;">
                                <i class="fa-solid fa-user-tie fa-4x"></i>
                            </div>
                        @endif
                    </div>

                    <h2 class="fw-bold text-dark mb-4">{{ $guru->nama_guru ?? '-' }}</h2>

                    <div class="text-start bg-light p-4 rounded-4 border mb-4">
                        <div class="mb-3">
                            <strong><i class="fa-solid fa-book me-2 text-warning"></i>Mata Pelajaran:</strong>
                            <div class="text-dark fw-semibold mt-1">{{ $guru->mapel ?? '-' }}</div>
                        </div>
                        <div class="mb-3">
                            <strong><i class="fa-solid fa-id-card me-2 text-warning"></i>NIP:</strong>
                            <div class="text-dark fw-semibold mt-1">{{ $guru->nip ?? '-' }}</div>
                        </div>
                        <div>
                            <strong><i class="fa-solid fa-building-columns me-2 text-warning"></i>Status:</strong>
                            <div class="text-dark fw-semibold mt-1">Guru Pengajar Aktif</div>
                        </div>
                    </div>

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