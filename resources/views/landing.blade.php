<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }} - Portal Resmi Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 80px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            background-color: #f8fafc;
            overflow-x: hidden;
        }
        .navbar {
            background-color: #ffffff !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            z-index: 1030;
            height: 80px;
        }
        .navbar-brand {
            font-weight: 700;
            color: #0d233a !important;
        }
        .navbar-nav .nav-link {
            font-weight: 600;
            color: #475569 !important;
            transition: color 0.2s ease;
            position: relative;
        }
        .navbar-nav .nav-link:hover, 
        .navbar-nav .nav-link.active {
            color: #0d233a !important;
        }
        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 12px;
            right: 12px;
            height: 3px;
            background-color: #f59e0b;
            border-radius: 2px;
        }

        .full-screen-section {
            min-height: 100vh;
            padding-top: 100px;
            padding-bottom: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-sizing: border-box;
        }

        .hero-section {
            position: relative;
            color: white;
            min-height: 100vh;
            padding-top: 100px;
            overflow: hidden;
            display: flex;
            align-items: center;
        }
        .carousel-item {
            height: 100vh;
        }
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }
        .carousel-item::after {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(135deg, rgba(13, 35, 58, 0.90) 0%, rgba(26, 54, 93, 0.82) 100%);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .btn-primary-custom {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: #fff;
            font-weight: 600;
        }
        .btn-primary-custom:hover {
            background-color: #d97706;
            border-color: #d97706;
            color: #fff;
        }

        .card-custom {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 6px 15px -3px rgba(0,0,0,0.06), 0 4px 6px -2px rgba(0,0,0,0.03);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }

        footer {
            background-color: #0d233a;
            color: #cbd5e1;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="80">

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#beranda">
                @php
                    $logoSekolah = $globalProfile->logo ?? null;
                @endphp
                @if($logoSekolah)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $logoSekolah)) }}" alt="Logo" style="width: 42px; height: 42px; object-fit: contain;">
                @else
                    <i class="fa-solid fa-graduation-cap text-warning fs-3"></i>
                @endif
                <span class="fs-5">{{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center gap-lg-3">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#guru">Guru & Staf</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ekstrakulikuler">Ekskul</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                    <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                        @auth
                            <a href="{{ route('admin.index') }}" class="btn btn-sm btn-dark px-4 py-2 rounded-pill fw-bold shadow-sm">Dashboard Admin</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-sm btn-primary-custom px-4 py-2 rounded-pill shadow-sm">Login Admin</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="beranda" class="hero-section">
        <div id="heroCarousel" class="carousel slide carousel-fade position-absolute top-0 start-0 w-100 h-100" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner h-100">
                @if(isset($sliderGaleri) && count($sliderGaleri) > 0)
                    @foreach($sliderGaleri as $key => $foto)
                        @php
                            $imgSource = $foto->gambar ?? $foto->foto ?? null;
                        @endphp
                        @if($imgSource)
                            <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . str_replace('public/', '', $imgSource)) }}" class="w-100 h-100" alt="Slide Background">
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="carousel-item h-100 active">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop" class="w-100 h-100" alt="Default 1">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="https://images.unsplash.com/photo-1562774053-701939374585?q=80&w=1200&auto=format&fit=crop" class="w-100 h-100" alt="Default 2">
                    </div>
                @endif
            </div>
        </div>

        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3">Portal Resmi Sekolah</span>
                    <h1 class="display-3 fw-bold mb-3">{{ $globalProfile->nama_sekolah ?? 'SMK Unggulan Berkarakter Islami' }}</h1>
                    <p class="lead text-light opacity-90 mb-4">{{ Str::limit($globalProfile->deskripsi ?? 'Lembaga pendidikan vokasi terdepan dalam melahirkan generasi kompeten, berakhlak mulia, dan siap kerja di dunia industri.', 160) }}</p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a href="#profil" class="btn btn-primary-custom px-4 py-3 rounded-pill shadow">Jelajahi Profil</a>
                        <a href="#kontak" class="btn btn-outline-light px-4 py-3 rounded-pill">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center">
                    <div class="p-4 bg-white bg-opacity-10 rounded-4 shadow-lg backdrop-blur border border-light border-opacity-25">
                        <div class="row text-center g-3">
                            <div class="col-6 border-end border-light border-opacity-25">
                                <h2 class="fw-bold text-warning mb-1">{{ $totalSiswa ?? 0 }}+</h2>
                                <small class="text-light">Siswa Aktif</small>
                            </div>
                            <div class="col-6">
                                <h2 class="fw-bold text-warning mb-1">{{ $totalGuru ?? 0 }}+</h2>
                                <small class="text-light">Guru & Staf</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="profil" class="full-screen-section bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark display-6">Tentang Sekolah Kami</h2>
                <p class="text-muted lead fs-6">Mengenal lebih dekat visi, misi, dan kepemimpinan sekolah.</p>
            </div>
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6">
                    <div class="card card-custom p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-bullseye text-warning me-2"></i>Visi & Misi</h4>
                        <p class="text-secondary mb-0" style="white-space: pre-line; line-height: 1.8;">{{ $globalProfile->visi_misi ?? 'Belum diisi.' }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-custom p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                        <h4 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-tie text-warning me-2"></i>Sambutan Kepala Sekolah</h4>
                        <p class="text-dark mb-2"><strong>{{ $globalProfile->kepala_sekolah ?? 'Kepala Sekolah' }}</strong></p>
                        <p class="text-secondary mb-0" style="line-height: 1.8;">{{ $globalProfile->deskripsi ?? 'Selamat datang di website resmi sekolah kami. Kami berkomitmen untuk mencetak lulusan yang unggul, terampil, dan berdaya saing global.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="guru" class="full-screen-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark display-6">Guru & Tenaga Pendidik</h2>
                <p class="text-muted lead fs-6">Tenaga pengajar profesional dan berpengalaman di bidangnya.</p>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($guru as $g)
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-custom h-100 text-center p-4 d-flex flex-column">
                            <div class="mb-3 mt-2">
                                @php
                                    $fotoGuru = $g->foto ?? $g->gambar ?? null;
                                @endphp
                                @if($fotoGuru)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGuru)) }}" alt="Foto Guru" class="rounded-circle shadow-sm border mx-auto" style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow-sm mx-auto" style="width: 100px; height: 100px;">
                                        <i class="fa-solid fa-user fa-2x"></i>
                                    </div>
                                @endif
                            </div>
                            <h5 class="fw-bold text-dark mb-1">{{ $g->nama_guru }}</h5>
                            <span class="badge bg-light text-dark border px-3 py-1.5 mb-2">{{ $g->mapel }}</span>
                            <small class="text-muted mb-3 d-block">NIP: {{ $g->nip ?? '-' }}</small>
                            <div class="mt-auto">
                                <a href="{{ route('guru.detail', $g->id_guru ?? $g->id) }}" class="btn btn-sm btn-outline-dark px-3 py-2 rounded-pill fw-semibold w-100">
                                    Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        <p>Data guru belum tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="berita" class="full-screen-section bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark display-6">Berita & Informasi Terbaru</h2>
                <p class="text-muted lead fs-6">Ikuti perkembangan dan kegiatan terbaru dari sekolah.</p>
            </div>
            <div class="row g-4">
                @forelse($berita as $item)
                    <div class="col-md-4">
                        <div class="card card-custom h-100 overflow-hidden d-flex flex-column">
                            @php
                                $fotoBerita = $item->gambar ?? $item->foto ?? null;
                            @endphp
                            @if($fotoBerita)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $fotoBerita)) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Berita">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                                    <i class="fa-solid fa-newspaper fa-3x"></i>
                                </div>
                            @endif
                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <small class="text-muted d-block mb-2"><i class="fa-regular fa-calendar me-1"></i>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y') : '-' }}</small>
                                <h5 class="fw-bold text-dark mb-2">{{ $item->judul }}</h5>
                                <p class="text-secondary small mb-3 flex-grow-1">{{ Str::limit(strip_tags($item->isi), 80) }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('berita.detail', $item->id_berita ?? $item->id) }}" class="btn btn-sm btn-outline-dark px-3 py-2 rounded-pill fw-semibold w-100">
                                        Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        <p>Belum ada berita yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION EKSTRAKURIKULER -->
    <section id="ekstrakulikuler" class="full-screen-section bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2">Kegiatan Siswa</span>
                <h2 class="fw-bold text-dark display-6">Ekstrakurikuler Sekolah</h2>
                <p class="text-muted lead fs-6">Wadah pengembangan bakat, minat, dan kreativitas siswa.</p>
            </div>
            <div class="row g-4">
                @isset($ekstrakulikulers)
                    @forelse($ekstrakulikulers as $item)
                        <div class="col-md-4">
                            <div class="card card-custom h-100 overflow-hidden d-flex flex-column">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $item->gambar)) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="{{ $item->nama_ekskul }}">
                                @else
                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                                        <i class="fa-solid fa-futbol fa-3x"></i>
                                    </div>
                                @endif
                                <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-2">{{ $item->nama_ekskul }}</h5>
                                    <p class="text-muted small mb-3">
                                        <i class="fa-solid fa-user-tie me-1 text-warning"></i> Pembina: {{ $item->pembina ?? '-' }}<br>
                                        <i class="fa-solid fa-calendar-days me-1 text-warning"></i> Jadwal: {{ $item->jadwal_latihan ?? '-' }}
                                    </p>
                                    <p class="text-secondary small mb-3 flex-grow-1">{{ Str::limit(strip_tags($item->deskripsi), 80) }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ route('landing.ekstrakulikuler.detail', $item->id_ekstrakulikuler) }}" class="btn btn-sm btn-outline-dark px-3 py-2 rounded-pill fw-semibold w-100">
                                            Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4 text-muted">
                            <p>Belum ada data ekstrakurikuler.</p>
                        </div>
                    @endforelse
                @endisset
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('landing.ekstrakulikuler') }}" class="btn btn-dark rounded-pill px-4 py-2 fw-semibold">
                    Lihat Semua Ekstrakurikuler <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SECTION GALERI (Dukung Foto & Video Lokal) -->
    <section id="galeri" class="full-screen-section bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark display-6">Galeri Kegiatan Sekolah</h2>
                <p class="text-muted lead fs-6">Dokumentasi momen berharga dan fasilitas kampus.</p>
            </div>
            <div class="row g-4">
                @forelse($galeri as $foto)
                    <div class="col-md-4">
                        <div class="card card-custom h-100 overflow-hidden d-flex flex-column">
                            @if(!empty($foto->video))
                                <div class="ratio ratio-16x9">
                                    <video controls class="w-100 h-100" style="object-fit: cover;">
                                        <source src="{{ asset('storage/' . str_replace('public/', '', $foto->video)) }}" type="video/mp4">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                </div>
                            @else
                                @php
                                    $fotoGaleri = $foto->foto ?? $foto->gambar ?? null;
                                @endphp
                                @if($fotoGaleri)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGaleri)) }}" class="card-img-top" style="height: 220px; object-fit: cover;" alt="Galeri">
                                @else
                                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                                        <i class="fa-solid fa-images fa-3x"></i>
                                    </div>
                                @endif
                            @endif

                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <small class="text-muted d-block mb-2"><i class="fa-regular fa-calendar me-1"></i>{{ $foto->created_at ? \Carbon\Carbon::parse($foto->created_at)->format('d M Y') : '-' }}</small>
                                <h5 class="fw-bold text-dark mb-2">{{ $foto->judul }}</h5>
                                <p class="text-secondary small mb-3 flex-grow-1">{{ Str::limit($foto->deskripsi ?? 'Dokumentasi kegiatan sekolah.', 80) }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('galeri.detail', $foto->id_galeri) }}" class="btn btn-sm btn-outline-dark px-3 py-2 rounded-pill fw-semibold w-100">
                                        Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4 text-muted">
                        <p>Belum ada galeri kegiatan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer id="kontak" class="full-screen-section justify-content-between" style="min-height: 80vh;">
        <div class="container my-auto py-5">
            <div class="row g-5 mb-4">
                <div class="col-lg-5">
                    <h3 class="fw-bold text-white mb-3">{{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</h3>
                    <p class="text-light opacity-75" style="line-height: 1.8;">{{ $globalProfile->deskripsi ?? 'Pusat pendidikan kejuruan berkualitas tinggi yang berkarakter dan siap kerja.' }}</p>
                </div>
                <div class="col-lg-4">
                    <h4 class="fw-bold text-white mb-3">Kontak Sekolah</h4>
                    <p class="mb-2 text-light"><i class="fa-solid fa-location-dot me-2 text-warning"></i>{{ $globalProfile->alamat ?? '-' }}</p>
                    <p class="mb-2 text-light"><i class="fa-solid fa-phone me-2 text-warning"></i>{{ $globalProfile->kontak ?? '-' }}</p>
                    <p class="mb-0 text-light"><i class="fa-solid fa-id-card me-2 text-warning"></i>NPSN: {{ $globalProfile->npsn ?? '-' }}</p>
                </div>
                <div class="col-lg-3">
                    <h4 class="fw-bold text-white mb-3">Navigasi Cepat</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#beranda" class="text-decoration-none text-light opacity-75">Beranda</a></li>
                        <li class="mb-2"><a href="#profil" class="text-decoration-none text-light opacity-75">Profil</a></li>
                        <li class="mb-2"><a href="#guru" class="text-decoration-none text-light opacity-75">Guru & Staf</a></li>
                        <li class="mb-2"><a href="#berita" class="text-decoration-none text-light opacity-75">Berita</a></li>
                        <li class="mb-2"><a href="#ekstrakulikuler" class="text-decoration-none text-light opacity-75">Ekstrakurikuler</a></li>
                        <li class="mb-2"><a href="#galeri" class="text-decoration-none text-light opacity-75">Galeri</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary opacity-50 my-4">
            <div class="text-center text-muted small">
                &copy; {{ date('Y') }} {{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            let sections = document.querySelectorAll('header, section, footer');
            let navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            let current = '';
            sections.forEach(section => {
                let sectionTop = section.offsetTop;
                if (pageYOffset >= (sectionTop - 150)) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>