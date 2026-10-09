<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ekstrakulikuler->nama_ekskul }} - Ekstrakurikuler</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <!-- Navbar Publik -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">SMK MUTIARA</a>
            <a href="{{ route('landing.ekstrakulikuler') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </nav>

    <!-- Konten Detail -->
    <div class="container py-5" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    
                    <div class="mb-4">
                        <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2 d-inline-block">Ekstrakurikuler</span>
                        <h2 class="fw-bold text-dark mb-3">{{ $ekstrakulikuler->nama_ekskul }}</h2>
                    </div>

                    @if($ekstrakulikuler->gambar)
                        <div class="mb-4 text-center">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $ekstrakulikuler->gambar)) }}" alt="{{ $ekstrakulikuler->nama_ekskul }}" class="img-fluid rounded-4 shadow-sm" style="max-height: 400px; width: 100%; object-fit: cover;">
                        </div>
                    @endif

                    <div class="row g-3 text-secondary mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <strong><i class="fa-solid fa-user-tie me-2 text-warning"></i>Pembina:</strong>
                                <div class="text-dark fw-semibold mt-1">{{ $ekstrakulikuler->pembina ?? '-' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <strong><i class="fa-solid fa-calendar-days me-2 text-warning"></i>Jadwal Latihan:</strong>
                                <div class="text-dark fw-semibold mt-1">{{ $ekstrakulikuler->jadwal_latihan ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h5 class="fw-bold text-dark mb-3">Deskripsi Kegiatan</h5>
                        <div class="text-secondary" style="line-height: 1.8; white-space: pre-line;">
                            {!! $ekstrakulikuler->deskripsi ?? '<span class="text-muted fst-italic">Belum ada deskripsi.</span>' !!}
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="text-center">
                        <a href="{{ route('landing.ekstrakulikuler') }}" class="btn text-white rounded-pill px-4 py-2 fw-semibold" style="background-color: #0d233a;">
                            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Ekstrakurikuler
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