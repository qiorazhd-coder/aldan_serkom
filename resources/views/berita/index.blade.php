@extends('layouts.template')

@section('content')
<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">Kelola Berita</h4>
    <a href="{{ route('berita.create') }}" class="btn text-white px-3 py-1.5 fw-semibold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
        <i class="fa-solid fa-plus me-1"></i> Tambah Berita
    </a>
</div>

<div class="px-4 pb-5">
    @if(session('success'))
        <div id="successAlert" class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="border-radius: 10px;">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4 w-100" style="border-radius: 16px; background: #ffffff;">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div class="text-secondary small fw-semibold">
                Showing {{ $beritas->firstItem() ?? 0 }} to {{ $beritas->lastItem() ?? 0 }} of {{ $beritas->total() ?? 0 }} entries
            </div>

            <div class="d-flex align-items-center gap-2">
                <form action="{{ route('berita.index') }}" method="GET" class="d-flex align-items-center">
                    <input type="text" name="search" class="form-control form-control-sm px-3" 
                           placeholder="Cari Berita..." value="{{ request('search') }}" 
                           style="border-radius: 8px; width: 220px; background-color: #f8fafc;">
                    <button type="submit" class="btn btn-sm btn-dark ms-2 px-3" style="border-radius: 8px;">Cari</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th scope="col" class="py-3" style="width: 5%;">No</th>
                        <th scope="col" class="py-3" style="width: 15%;">Gambar</th>
                        <th scope="col" class="py-3" style="width: 30%;">Judul Berita</th>
                        <th scope="col" class="py-3" style="width: 25%;">Isi Berita</th>
                        <th scope="col" class="py-3 text-center" style="width: 25%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($beritas as $key => $item)
                        <tr>
                            <td class="fw-semibold text-secondary">{{ $beritas->firstItem() + $key }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . str_replace('public/', '', $item->gambar)) }}" 
                                         alt="Gambar Berita" 
                                         class="rounded border shadow-sm" 
                                         style="width: 70px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light rounded border d-flex align-items-center justify-content-center text-secondary shadow-sm" style="width: 70px; height: 50px;">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">{{ $item->judul }}</span>
                                <small class="text-muted"><i class="fa-regular fa-clock me-1"></i>{{ $item->created_at->format('d M Y') }}</small>
                            </td>
                            <td>
                                <p class="text-secondary small mb-0">{{ Str::limit(strip_tags($item->isi), 60) }}</p>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('berita.detail', $item->id_berita ?? $item->id) }}" class="btn btn-sm btn-outline-info px-2 py-1" style="border-radius: 6px;" title="Lihat Detail">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('berita.edit', $item->id_berita ?? $item->id) }}" class="btn btn-sm btn-outline-warning px-2 py-1" style="border-radius: 6px;" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('berita.destroy', $item->id_berita ?? $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1" style="border-radius: 6px;" title="Hapus">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open fa-3x mb-3 opacity-50 d-block"></i>
                                Belum ada data berita yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
            <div class="small text-muted">
                Halaman {{ $beritas->currentPage() }} dari {{ $beritas->lastPage() }}
            </div>
            <div>
                {{ $beritas->links() }}
            </div>
        </div>

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