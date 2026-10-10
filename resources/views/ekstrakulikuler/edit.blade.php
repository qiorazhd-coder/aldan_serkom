@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Edit Ekstrakurikuler
    </h4>
    <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="container-fluid px-4 pb-5">
    <div class="card border-0 shadow-sm p-4 p-md-5 w-100" style="border-radius: 16px; background: #ffffff;">
        
        <form action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->id_ekstrakulikuler ?? $ekstrakulikuler->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Nama Ekstrakurikuler</label>
                <input type="text" name="nama_ekskul" class="form-control py-2.5" value="{{ old('nama_ekskul', $ekstrakulikuler->nama_ekskul) }}" required style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Pembina</label>
                <input type="text" name="pembina" class="form-control py-2.5" value="{{ old('pembina', $ekstrakulikuler->pembina ?? '') }}" placeholder="Nama pembina..." style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Jadwal Latihan</label>
                <input type="text" name="jadwal_latihan" class="form-control py-2.5" value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan ?? '') }}" placeholder="Contoh: Setiap Jumat, 15:00 WIB" style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" style="border-radius: 8px; background-color: #f8fafc;">{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">Gambar (Opsional)</label>
                @if($ekstrakulikuler->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $ekstrakulikuler->gambar)) }}" alt="Preview" style="height: 80px; border-radius: 8px;" class="shadow-sm border">
                    </div>
                @endif
                <input type="file" name="gambar" class="form-control py-2" accept="image/*" style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="pt-4 mt-3 border-top text-end d-flex justify-content-between align-items-center">
                <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-secondary" style="border-radius: 8px;">
                    Kembali
                </a>
                <button type="submit" class="btn text-white px-4 py-2.5 fw-bold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>

    </div>
</div>

@endsection