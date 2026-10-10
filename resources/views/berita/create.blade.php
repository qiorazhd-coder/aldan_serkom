@extends('layouts.template')

@section('content')
{{-- MENGGUNAKAN container-fluid AGAR LEBAR PENUH HAMPIR MEMENUHI LAYAR --}}
<div class="container-fluid px-3 px-md-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0 text-dark">Tambah Berita Baru</h3>
        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- CARD FORM DENGAN LEBAR MAKSIMAL 100% DAN PADDING LUAS --}}
    <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 w-100">
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul Berita --}}
            <div class="mb-4">
                <label for="judul" class="form-label fw-semibold text-dark fs-5">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="judul" id="judul" 
                       class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                       placeholder="Masukkan judul berita..." value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Isi Berita (Textarea dibuat lebih tinggi agar leluasa) --}}
            <div class="mb-4">
                <label for="isi" class="form-label fw-semibold text-dark fs-5">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" id="isi" rows="12" 
                          class="form-control form-control-lg @error('isi') is-invalid @enderror" 
                          placeholder="Tulis isi berita lengkap di sini..." required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Baris Gambar & Tombol --}}
            <div class="row align-items-center g-4 pt-2">
                <div class="col-12 col-lg-6">
                    <label for="gambar" class="form-label fw-semibold text-dark">Gambar Berita <span class="text-muted small">(Opsional)</span></label>
                    <input type="file" name="gambar" id="gambar" 
                           class="form-control form-control-lg @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted d-block mt-1">Format yang didukung: JPG, PNG, JPEG. Maksimal 2MB.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-6 text-lg-end mt-4 mt-lg-0">
                    <button type="reset" class="btn btn-lg btn-outline-secondary px-4 rounded-pill me-2">
                        <i class="fas fa-undo me-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-lg btn-dark px-5 rounded-pill shadow-sm">
                        <i class="fas fa-save me-1"></i> Simpan Berita
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>
@endsection