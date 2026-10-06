@extends('layouts.template')

@section('content')

<!-- Topbar Header -->
<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Data Galeri Foto
    </h4>

    <a href="{{ route('galeri.create') }}" class="btn text-white fw-semibold px-3 py-2 shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
        <i class="fa-solid fa-plus me-2"></i>Tambah Foto Baru
    </a>
</div>

<div class="px-4 pb-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 text-white" style="background-color: #10b981; border-radius: 10px;" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 16px; background: #ffffff;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #0d233a; color: #ffffff;">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 60px;">No</th>
                            <th class="py-3 px-3 text-center" style="width: 120px;">Foto</th>
                            <th class="py-3 px-3">Judul Foto / Kegiatan</th>
                            <th class="py-3 px-3">Deskripsi</th>
                            <th class="py-3 px-3 text-center" style="width: 170px;">Tanggal Unggah</th>
                            <th class="py-3 px-4 text-center" style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($galeri as $index => $item)
                            <tr>
                                <td class="text-center fw-bold text-secondary px-4">
                                    {{ $galeri->firstItem() + $index }}
                                </td>
                                <td class="text-center px-3 py-2">
                                    <div class="rounded overflow-hidden shadow-sm d-inline-block border" style="width: 90px; height: 60px; background-color: #f8fafc;">
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $item->foto)) }}?t={{ time() }}" 
                                             alt="{{ $item->judul }}" 
                                             class="w-100 h-100" 
                                             style="object-fit: cover;">
                                    </div>
                                </td>
                                <td class="px-3">
                                    <span class="fw-bold text-dark d-block" style="font-size: 0.95rem;">
                                        {{ $item->judul }}
                                    </span>
                                </td>
                                <td class="px-3 text-secondary small">
                                    {{ $item->deskripsi ?? '-' }}
                                </td>
                                <td class="text-center px-3 text-muted small">
                                    {{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="text-center px-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('galeri.edit', $item->id_galeri) }}" 
                                           class="btn btn-sm btn-outline-warning fw-semibold px-2.5 py-1.5" 
                                           style="border-radius: 6px;" 
                                           title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('galeri.destroy', $item->id_galeri) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger fw-semibold px-2.5 py-1.5" 
                                                    style="border-radius: 6px;"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')" 
                                                    title="Hapus Data">
                                                <i class="fa-solid fa-trash-can me-1"></i> Hapus
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
                                    <small>Silakan klik tombol "Tambah Foto Baru" untuk memasukkan data.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($galeri->hasPages())
            <div class="card-footer bg-white border-0 py-3 px-4 d-flex justify-content-center">
                {{ $galeri->links() }}
            </div>
        @endif
    </div>

</div>

@endsection