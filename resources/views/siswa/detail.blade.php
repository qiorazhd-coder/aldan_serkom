<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siswa->nama_siswa }} - {{ $globalProfile->nama_sekolah ?? 'SMK Mutiara' }}</title>
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
    <div class="container" style="margin-top: 130px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <div class="text-center mb-4">
                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2">Detail Data Siswa</span>
                        <h3 class="fw-bold text-dark mb-1">{{ $siswa->nama_siswa }}</h3>
                        <p class="text-muted small">NISN: {{ $siswa->nisn ?? '-' }}</p>
                    </div>

                    <hr class="mb-4">
                    
                    <ul class="list-unstyled text-secondary mb-4 px-md-3" style="line-height: 2.5;">
                        <li class="d-flex justify-content-between border-bottom pb-2">
                            <span><strong><i class="fa-solid fa-id-card me-2 text-warning"></i>NISN</strong></span>
                            <span class="fw-semibold text-dark">{{ $siswa->nisn ?? '-' }}</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span><strong><i class="fa-solid fa-user me-2 text-warning"></i>Nama Lengkap</strong></span>
                            <span class="fw-semibold text-dark">{{ $siswa->nama_siswa ?? '-' }}</span>
                        </li>
                        <li class="d-flex justify-content-between border-bottom py-2">
                            <span><strong><i class="fa-solid fa-venus-mars me-2 text-warning"></i>Jenis Kelamin</strong></span>
                            <span class="fw-semibold text-dark">{{ $siswa->jenis_kelamin ?? '-' }}</span>
                        </li>
                        <li class="d-flex justify-content-between pt-2">
                            <span><strong><i class="fa-solid fa-calendar-days me-2 text-warning"></i>Tahun Masuk</strong></span>
                            <span class="fw-semibold text-dark">{{ $siswa->tahun_masuk ?? '-' }}</span>
                        </li>
                    </ul>

                    <div class="text-center mt-5">
                        <a href="{{ url()->previous() }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold" style="background-color: #0d233a;">
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