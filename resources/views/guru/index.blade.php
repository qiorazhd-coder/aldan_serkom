@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Data Guru & Tenaga Pendidik
    </h4>

    <a href="{{ route('guru.create') }}" class="btn text-white fw-semibold px-3 py-2 shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
        <i class="fa-solid fa-plus me-2"></i>Tambah Guru
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
        
        <div class="p-3 bg-light border-bottom d-flex justify-content-between align-items-center">
            <form action="{{ route('guru.index') }}" method="GET" class="d-flex gap-2 w-100" style="max-width: 400px;">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama, NIP, atau mata pelajaran..." value="{{ $search ?? '' }}" style="border-radius: 6px;">
                <button type="submit" class="btn btn-sm text-white px-3" style="background-color: #0d233a; border-radius: 6px;">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: #0d233a; color: #ffffff;">
                        <tr>
                            <th class="py-3 px-4 text-center" style="width: 60px;">No</th>
                            <th class="py-3 px-3 text-center" style="width: 80px;">Foto</th>
                            <th class="py-3 px-3" style="width: 180px;">NIP</th>
                            <th class="py-3 px-3">Nama Lengkap Guru</th>
                            <th class="py-3 px-3">Mata Pelajaran (Mapel)</th>
                            <th class="py-3 px-4 text-center" style="width: 250px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($guru as $index => $item)
                            <tr>
                                <td class="text-center fw-bold text-secondary px-4">
                                    {{ $guru->firstItem() + $index }}
                                </td>
                                <td class="text-center px-3">
                                    @if($item->foto)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $item->foto)) }}?t={{ time() }}" alt="Foto Guru" class="rounded-circle border" style="width: 45px; height: 45px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-3 fw-semibold text-dark">
                                    {{ $item->nip ?? '-' }}
                                </td>
                                <td class="px-3 fw-bold text-dark">
                                    {{ $item->nama_guru }}
                                </td>
                                <td class="px-3 text-secondary">
                                    <span class="badge bg-light text-dark border px-2.5 py-1.5" style="border-radius: 6px; font-size: 0.85rem;">
                                        {{ $item->mapel }}
                                    </span>
                                </td>
                                <td class="text-center px-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <!-- Tombol Detail Publik -->
                                        <a href="{{ route('guru.detail', $item->id_guru ?? $item->id) }}" 
                                           class="btn btn-sm btn-outline-info fw-semibold px-2.5 py-1.5" 
                                           style="border-radius: 6px;" 
                                           title="Lihat Detail">
                                            <i class="fa-solid fa-eye me-1"></i> Detail
                                        </a>

                                        <a href="{{ route('guru.edit', $item->id_guru) }}" 
                                           class="btn btn-sm btn-outline-warning fw-semibold px-2.5 py-1.5" 
                                           style="border-radius: 6px;" 
                                           title="Edit Data">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('guru.destroy', $item->id_guru) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger fw-semibold px-2.5 py-1.5" 
                                                    style="border-radius: 6px;"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data guru ini?')" 
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
                                    <i class="fa-solid fa-chalkboard-user fa-3x mb-3 d-block opacity-50"></i>
                                    <span class="fw-bold d-block fs-6">Belum Ada Data Guru</span>
                                    <small>Silakan klik tombol "Tambah Guru" untuk memasukkan data.</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($guru->hasPages())
            <div class="card-footer bg-white border-0 py-3 px-4 d-flex justify-content-center">
                {{ $guru->links() }}
            </div>
        @endif
    </div>

</div>

@endsection