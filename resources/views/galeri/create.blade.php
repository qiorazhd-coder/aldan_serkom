@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Tambah Galeri Baru
    </h4>
    <a href="{{ route('galeri.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="card border-0 shadow-sm p-4 p-md-5 mx-auto" style="border-radius: 16px; background: #ffffff; max-width: 700px;">
        
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px;">
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Judul Kegiatan <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control py-2" value="{{ old('judul') }}" placeholder="Contoh: Pentas Seni Sekolah" required style="border-radius: 8px; background-color: #f8fafc;">
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold text-dark">Jenis Konten <span class="text-danger">*</span></label>
                <select id="jenisKonten" class="form-select py-2" onchange="toggleJenisKonten()" style="border-radius: 8px; background-color: #f8fafc;">
                    <option value="foto">Foto</option>
                    <option value="video">Video (Unggah File MP4/WebM)</option>
                </select>
            </div>

            <!-- Input Foto -->
            <div class="mb-3" id="wrapperFoto">
                <label class="form-label fw-semibold text-dark">Unggah Foto</label>
                <input type="file" name="foto" class="form-control py-2" accept="image/*" style="border-radius: 8px; background-color: #f8fafc;">
                <small class="text-muted">Format: JPG, PNG, WEBP (Maks 2MB)</small>
            </div>

            <!-- Input Video Lokal -->
            <div class="mb-3 d-none" id="wrapperVideo">
                <label class="form-label fw-semibold text-dark">Unggah File Video</label>
                <input type="file" name="video" class="form-control py-2" accept="video/mp4,video/webm,video/ogg" style="border-radius: 8px; background-color: #f8fafc;">
                <small class="text-muted">Format: MP4, MKV, WEBM (Maks 20MB)</small>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold text-dark">Deskripsi (Opsional)</label>
                <textarea name="deskripsi" class="form-control" rows="3" placeholder="Keterangan singkat mengenai galeri..." style="border-radius: 8px; background-color: #f8fafc;">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="pt-3 border-top text-end d-flex justify-content-between align-items-center">
                <a href="{{ route('galeri.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-secondary" style="border-radius: 8px;">
                    Batal
                </a>
                <button type="submit" class="btn text-white px-4 py-2.5 fw-bold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Galeri
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function toggleJenisKonten() {
        let jenis = document.getElementById('jenisKonten').value;
        let wrapperFoto = document.getElementById('wrapperFoto');
        let wrapperVideo = document.getElementById('wrapperVideo');

        if (jenis === 'video') {
            wrapperFoto.classList.add('d-none');
            wrapperVideo.classList.remove('d-none');
        } else {
            wrapperVideo.classList.add('d-none');
            wrapperFoto.classList.remove('d-none');
        }
    }
</script>

@endsection