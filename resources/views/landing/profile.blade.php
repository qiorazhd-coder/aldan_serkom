<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sekolah - SMK MUTIARA SALAWU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- Navbar Sederhana -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
                <i class="fa-solid fa-graduation-cap text-warning me-2"></i> SMK MUTIARA SALAWU
            </a>
            <a href="{{ route('landing') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <!-- Konten Profil -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <div class="text-center mb-5">
                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-2">Informasi Sekolah</span>
                        <h1 class="fw-bold text-dark">Profil Resmi Sekolah</h1>
                        <p class="text-muted">Mengenal lebih dekat visi, misi, dan identitas SMK Mutiara Salawu.</p>
                    </div>

                    <div class="row align-items-center g-5 mb-5">
                        <div class="col-md-5 text-center">
                            <div class="p-3 bg-light rounded-4 border">
                                <i class="fa-solid fa-school text-primary display-1 py-4"></i>
                                <h5 class="fw-bold text-dark mb-1">SMK MUTIARA SALAWU</h5>
                                <p class="text-muted small mb-0">Lembaga Pendidikan Vokasi Terkemuka</p>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h3 class="fw-bold text-dark mb-3">Tentang Kami</h3>
                            <p class="text-muted lh-base">
                                Selamat datang di portal resmi sekolah kami. Kami berkomitmen penuh untuk menghadirkan pendidikan kejuruan berkualitas yang membekali peserta didik dengan keterampilan profesional (hard skills), karakter mulia (soft skills), serta kesiapan penuh untuk menghadapi dunia kerja, industri, maupun berwirausaha.
                            </p>
                            <div class="row g-3 mt-3">
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">NPSN</small>
                                        <span class="fw-bold text-dark">008644</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 border rounded-3 bg-light">
                                        <small class="text-muted d-block">Kepala Sekolah</small>
                                        <span class="fw-bold text-dark">Lindawati, S.Pd</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visi & Misi -->
                    <div class="p-4 bg-light rounded-4 border-start border-4 border-primary mb-4">
                        <h4 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i> Visi & Misi</h4>
                        <p class="text-muted mb-0 lh-base">
                            <strong>Visi:</strong> Menjadi lembaga vokasi terdepan yang menghasilkan lulusan unggul, berkarakter mulia, kompeten, dan siap kerja melalui pembelajaran berbasis industri serta penguatan jiwa kewirausahaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>