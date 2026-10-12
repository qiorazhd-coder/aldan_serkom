<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA SALAWU' }}</title>
    
    @php
        $logoSekolah = $globalProfile->logo ?? null;
    @endphp
    @if ($logoSekolah)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . str_replace('public/', '', $logoSekolah)) }}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            color: #333;
        }
        .hero-card {
            border: none;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        .profile-img-container {
            width: 140px;
            height: 140px;
            margin: 0 auto;
            position: relative;
        }
        .profile-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 5px 15px rgba(13, 35, 58, 0.2);
        }
        .nav-logo {
            width: 38px;
            height: 38px;
            object-fit: contain;
            border-radius: 50%;
            border: 2px solid #ffc107;
            background-color: #fff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('landing') }}">
                @if ($logoSekolah)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $logoSekolah)) }}" alt="Logo Sekolah" class="nav-logo">
                @else
                    <i class="fa-solid fa-graduation-cap text-warning"></i>
                @endif
                <span>Profil Saya &mdash; {{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA SALAWU' }}</span>
            </a>
            <a href="{{ route('landing') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="hero-card p-4 p-md-5">
                    
                    <div class="text-center mb-4">
                        <div class="profile-img-container mb-3">
                            <img src="{{ asset('storage/profil/aldan.jpg') }}" alt="Foto Aldan" class="profile-img" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Aldan+Dev&background=0d233a&color=ffc107&size=150';">
                        </div>
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-2">Lead Full-Stack Developer</span>
                        <h1 class="fw-bold text-dark mb-1">Aldan</h1>
                        <p class="text-muted">Web & Mobile Application Developer</p>
                    </div>

                    <hr class="my-4 text-muted opacity-25">

                    <div class="mb-4">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-address-card text-warning me-2"></i> Tentang Saya</h4>
                        <p class="text-secondary lh-lg">
                            Halo! Saya adalah pengembang perangkat lunak yang berfokus pada perancangan dan pembangunan sistem aplikasi berbasis web serta mobile yang fungsional dan responsif. Sistem informasi manajemen sekolah di <strong>{{ $globalProfile->nama_sekolah ?? 'SMK MUTIARA SALAWU' }}</strong> ini dirancang dan dikembangkan secara mandiri mulai dari manajemen basis data, panel admin, hingga antarmuka publik.
                        </p>
                    </div>

                    <div class="mb-4">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-laptop-code text-warning me-2"></i> Keahlian & Teknologi</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-dark px-3 py-2"><i class="fa-brands fa-php me-1 text-info"></i> PHP</span>
                            <span class="badge bg-danger px-3 py-2"><i class="fa-brands fa-laravel me-1"></i> Laravel Framework</span>
                            <span class="badge bg-primary px-3 py-2"><i class="fa-brands fa-bootstrap me-1"></i> Bootstrap 5</span>
                            <span class="badge bg-info text-dark px-3 py-2"><i class="fa-brands fa-flutter me-1"></i> Flutter</span>
                            <span class="badge bg-warning text-dark px-3 py-2"><i class="fa-solid fa-database me-1"></i> MySQL</span>
                            <span class="badge bg-secondary px-3 py-2"><i class="fa-brands fa-git-alt me-1"></i> Git</span>
                        </div>
                    </div>


                    <div class="text-center">
                        <a href="{{ route('landing') }}" class="btn btn-dark px-4 py-2 rounded-pill fw-semibold">
                            <i class="fa-solid fa-house me-1"></i> Kembali ke Beranda Utama
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>