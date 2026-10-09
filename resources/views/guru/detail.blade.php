<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guru->nama_guru }} - {{ $globalProfile->nama_sekolah ?? 'SMK Mutiara' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container" style="margin-top: 130px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <div class="row align-items-center g-5 py-3">
                        <div class="col-md-4 text-center text-md-start">
                            @php
                                $fotoGuru = $guru->foto ?? $guru->gambar ?? null;
                            @endphp
                            @if($fotoGuru)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGuru)) }}" alt="Foto Guru" class="rounded-circle shadow-sm border mx-auto d-block" style="width: 200px; height: 200px; object-fit: cover;">
                            @else
                                <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow-sm mx-auto" style="width: 200px; height: 200px;">
                                    <i class="fa-solid fa-user fa-4x"></i>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-8 ps-md-4 text-center text-md-start">
                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3 fs-6">Tenaga Pendidik</span>
                            <h2 class="fw-bold text-dark mb-4 fs-1">{{ $guru->nama_guru }}</h2>
                            
                            <ul class="list-unstyled text-secondary mb-0 fs-5" style="line-height: 2.2;">
                                <li><strong><i class="fa-solid fa-book me-2 text-warning"></i>Mata Pelajaran:</strong> {{ $guru->mapel }}</li>
                                <li><strong><i class="fa-solid fa-id-card me-2 text-warning"></i>NIP:</strong> {{ $guru->nip ?? '-' }}</li>
                                <li><strong><i class="fa-solid fa-school me-2 text-warning"></i>Status:</strong> Guru Pengajar Aktif</li>
                            </ul>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-dark rounded-pill px-5 py-3 fw-semibold fs-5">
                            <i class="fa-solid fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>