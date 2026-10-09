<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - Sekolah</title>
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
            <a href="{{ url('/') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Beranda
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container py-5" style="margin-top: 80px;">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-1.5 rounded-pill fw-semibold mb-2">Kegiatan Siswa</span>
            <h2 class="fw-bold text-dark">Ekstrakurikuler Sekolah</h2>
            <p class="text-secondary">Pilihan kegiatan ekstrakurikuler untuk mengembangkan bakat dan minat siswa.</p>
        </div>

        <div class="row g-4">
            @forelse($ekstrakulikulers as $item)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 overflow-hidden">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $item->gambar)) }}" class="card-img-top" alt="{{ $item->nama_ekskul }}" style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                                <i class="fa-solid fa-futbol fa-3x opacity-50"></i>
                            </div>
                        @endif
                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold text-dark mb-2">{{ $item->nama_ekskul }}</h5>
                            <p class="text-muted small mb-3">
                                <i class="fa-solid fa-user-tie me-1 text-warning"></i> Pembina: {{ $item->pembina ?? '-' }}<br>
                                <i class="fa-solid fa-calendar-days me-1 text-warning"></i> Jadwal: {{ $item->jadwal_latihan ?? '-' }}
                            </p>
                            <p class="text-secondary small mb-4">
                                {{ Str::limit(strip_tags($item->deskripsi), 90) }}
                            </p>
                            <div class="mt-auto">
                                <a href="{{ route('landing.ekstrakulikuler.detail', $item->id ?? $item->id_ekstrakulikuler) }}" class="btn btn-outline-dark btn-sm rounded-pill px-4 fw-semibold w-100">
                                    Selengkapnya <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-folder-open fa-3x text-muted mb-3 d-block opacity-50"></i>
                    <h5 class="text-muted fw-bold">Belum Ada Ekstrakurikuler</h5>
                    <p class="text-muted small">Data kegiatan ekstrakurikuler akan segera ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>