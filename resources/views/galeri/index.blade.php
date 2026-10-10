@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Data Galeri Foto & Video
    </h4>

    <a href="{{ route('galeri.create') }}" class="btn text-white fw-semibold px-3 py-2 shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
        <i class="fa-solid fa-plus me-2"></i>Tambah Galeri Baru
    </a>
</div>

<div class="px-4 pb-5">

    @if(session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 text-white" style="background-color: #10b981; border-radius: 10px;" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4 w-100" style="border-radius: 16px; background: #ffffff;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 60px;">No</th>
                            <th class="py-3 px-3 text-center" style="width: 120px;">Media</th>
                            <th class="py-3 px-3">Judul Kegiatan</th>
                            <th class="py-3 px-3">Deskripsi</th>
                            <th class="py-3 px-3 text-center" style="width: 170px;">Tanggal Unggah</th>
                            <th class="py-3 px-4 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeries as $index => $item)
                            <tr>
                                <td class="text-center fw-bold text-secondary px-4">
                                    {{ $galeries->firstItem() + $index }}
                                </td>
                                <td class="text-center px-3 py-2">
                                    <div class="rounded overflow-hidden shadow-sm d-inline-block border position-relative" style="width: 80px; height: 55px; background-color: #f8fafc;">
                                        @if(!empty($item->video))
                                            <video class="w-100 h-100" style="object-fit: cover;" muted>
                                                <source src="{{ asset('storage/' . str_replace('public/', '', $item->video)) }}" type="video/mp4">
                                            </video>
                                            <span class="position-absolute top-50 start-50 translate-middle badge bg-dark bg-opacity-75 text-white p-1 rounded-circle" style="font-size: 9px;">
                                                <i class="fa-solid fa-play"></i>
                                            </span>
                                        @else
                                            @php
                                                $fotoGaleri = $item->foto ?? $item->gambar ?? null;
                                            @endphp
                                            @if($fotoGaleri)
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $fotoGaleri)) }}?t={{ time() }}" 
                                                     alt="{{ $item->judul }}" 
                                                     class="w-100 h-100" 
                                                     style="object-fit: cover;">[cite: 2]
                                            @else
                                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary text-white">
                                                    <i class="fa-solid fa-image"></i>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td class="px-3">
                                    <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">
                                        {{ $item->judul }}
                                    </span>
                                </td>
                                <td class="px-3 text-secondary small">
                                    {{ Str::limit($item->deskripsi ?? '-', 60) }}
                                </td>
                                <td class="text-center px-3 text-muted small">
                                    {{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="text-center px-4">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('galeri.detail', $item->id_galeri) }}" 
                                           class="btn btn-sm btn-outline-info px-2 py-1" 
                                           style="border-radius: 6px;" 
                                           title="Lihat Detail">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{ route('galeri.edit', $item->id_galeri) }}" 
                                           class="btn btn-sm btn-outline-warning px-2 py-1" 
                                           style="border-radius: 6px;" 
                                           title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('galeri.destroy', $item->id_galeri) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger px-2 py-1" 
                                                    style="border-radius: 6px;"
                                                    title="Hapus Data">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-images fa-3x mb-3 d-block opacity-50"></i>
                                    <span class="fw-bold d-block fs-6">Belum Ada Data Galeri</span>
                                    <small>Silakan klik tombol "Tambah Galeri Baru" untuk memasukkan data.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($galeries, 'hasPages') && $galeries->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div class="small text-muted">
                    Halaman {{ $galeries->currentPage() }} dari {{ $galeries->lastPage() }}
                </div>
                <div>
                    {{ $galeries->links() }}
                </div>
            </div>
        @endif
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let alertEl = document.getElementById('successAlert');
        if (alertEl) {
            setTimeout(function() {
                let alert = new bootstrap.Alert(alertEl);
                alert.close();
            }, 3000); 
        }
    });
</script>

@endsection