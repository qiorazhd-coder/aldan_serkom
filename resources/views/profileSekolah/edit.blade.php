@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Edit Profil Sekolah
    </h4>
    <a href="{{ route('profileSekolah.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="card border-0 shadow-sm p-4 p-md-5 mx-auto" style="border-radius: 16px; background: #ffffff; max-width: 800px;">
        
        @if ($errors->any())
            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 10px;">
                <ul class="mb-0 ps-3 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profileSekolah.update', $profileSekolah->id ?? $profileSekolah->id_profile_sekolah) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12 col-md-8">
                    <label class="form-label fw-semibold text-dark">Nama Sekolah <span class="text-danger">*</span></label>
                    <input type="text" name="nama_sekolah" class="form-control py-2.5" value="{{ old('nama_sekolah', $profileSekolah->nama_sekolah) }}" required style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label fw-semibold text-dark">NPSN</label>
                    <input type="text" name="npsn" class="form-control py-2.5" value="{{ old('npsn', $profileSekolah->npsn) }}" style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-8">
                    <label class="form-label fw-semibold text-dark">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control py-2.5" value="{{ old('kepala_sekolah', $profileSekolah->kepala_sekolah) }}" style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-4">
                    <label class="form-label fw-semibold text-dark">Tahun Berdiri</label>
                    <input type="text" name="tahun_berdiri" class="form-control py-2.5" value="{{ old('tahun_berdiri', $profileSekolah->tahun_berdiri) }}" style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark d-block">Logo Sekolah Saat Ini</label>
                    @if($profileSekolah->logo)
                        <div class="p-2 border rounded d-inline-block bg-light mb-2">
                            <img src="{{ asset('storage/' . str_replace('public/', '', $profileSekolah->logo)) }}?t={{ time() }}" 
                                 alt="Logo Saat Ini" 
                                 style="max-width: 120px; max-height: 120px; object-fit: contain;">
                        </div>
                    @else
                        <p class="text-muted small">Belum ada logo yang diunggah.</p>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Ganti Logo (Opsional)</label>
                    <input type="file" name="logo" class="form-control py-2" accept="image/*" style="border-radius: 8px; background-color: #f8fafc;">
                    <small class="text-muted">Format: JPG, PNG, WEBP, SVG (Maks 2MB)</small>
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">Kontak / Telepon</label>
                    <input type="text" name="kontak" class="form-control py-2.5" value="{{ old('kontak', $profileSekolah->kontak) }}" style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control py-2.5" value="{{ old('alamat', $profileSekolah->alamat) }}" style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Visi & Misi</label>
                    <textarea name="visi_misi" class="form-control" rows="4" style="border-radius: 8px; background-color: #f8fafc;">{{ old('visi_misi', $profileSekolah->visi_misi) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Deskripsi Sekolah</label>
                    <textarea name="deskripsi" class="form-control" rows="3" style="border-radius: 8px; background-color: #f8fafc;">{{ old('deskripsi', $profileSekolah->deskripsi) }}</textarea>
                </div>
            </div>

            <div class="pt-4 mt-3 border-top text-end d-flex justify-content-between align-items-center">
                <a href="{{ route('profileSekolah.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-secondary" style="border-radius: 8px;">
                    Batal
                </a>
                <button type="submit" class="btn text-white px-4 py-2.5 fw-bold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Perbarui Data Profil
                </button>
            </div>
        </form>

    </div>
</div>

@endsection