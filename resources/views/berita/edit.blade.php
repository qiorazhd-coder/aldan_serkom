@extends('layouts.template')

@section('content')
<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">Edit Berita</h4>
    <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="card border-0 shadow-sm p-4 p-md-5 mx-auto" style="border-radius: 16px; background: #ffffff; max-width: 800px;">
        
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4">
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.update', $berita->id_berita ?? $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Judul Berita <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control py-2.5" value="{{ old('judul', $berita->judul) }}" required style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Isi Berita <span class="text-danger">*</span></label>
                <textarea name="isi" class="form-control py-2.5" rows="6" required style="border-radius: 8px; background-color: #f8fafc;">{{ old('isi', $berita->isi) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark d-block">Gambar Saat Ini</label>
                @if($berita->gambar)
                    <img src="{{ asset('storage/' . str_replace('public/', '', $berita->gambar)) }}" alt="Gambar Berita" class="rounded border mb-2" style="width: 120px; height: 90px; object-fit: cover;">
                @else
                    <p class="text-muted small">Belum ada gambar.</p>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">Ganti Gambar (Opsional)</label>
                <input type="file" name="gambar" class="form-control py-2" accept="image/*" style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="pt-3 border-top text-end d-flex justify-content-between align-items-center">
                <a href="{{ route('berita.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-secondary">Batal</a>
                <button type="submit" class="btn text-white px-4 py-2.5 fw-bold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Perbarui Berita
                </button>
            </div>
        </form>
    </div>
</div>
@endsection