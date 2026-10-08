@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h4 class="fw-bold mb-4">Edit Profil Sekolah</h4>

        <form action="{{ route('profileSekolah.update', $profileSekolah->id ?? $profileSekolah->id_profile_sekolah) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control @error('nama_sekolah') is-invalid @enderror" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah', $profileSekolah->nama_sekolah) }}" required>
                @error('nama_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kepala_sekolah" class="form-label">Kepala Sekolah</label>
                <input type="text" class="form-control @error('kepala_sekolah') is-invalid @enderror" id="kepala_sekolah" name="kepala_sekolah" value="{{ old('kepala_sekolah', $profileSekolah->kepala_sekolah) }}">
                @error('kepala_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="text" class="form-control @error('npsn') is-invalid @enderror" id="npsn" name="npsn" value="{{ old('npsn', $profileSekolah->npsn) }}">
                @error('npsn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control @error('kontak') is-invalid @enderror" id="kontak" name="kontak" value="{{ old('kontak', $profileSekolah->kontak) }}">
                @error('kontak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_berdiri" class="form-label">Tahun Berdiri</label>
                <input type="text" class="form-control @error('tahun_berdiri') is-invalid @enderror" id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri', $profileSekolah->tahun_berdiri) }}">
                @error('tahun_berdiri')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat', $profileSekolah->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="visi_misi" class="form-label">Visi & Misi</label>
                <textarea class="form-control @error('visi_misi') is-invalid @enderror" id="visi_misi" name="visi_misi" rows="4">{{ old('visi_misi', $profileSekolah->visi_misi) }}</textarea>
                @error('visi_misi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $profileSekolah->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo Sekolah</label>
                @if($profileSekolah->logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $profileSekolah->logo) }}" alt="Logo" width="100" class="img-thumbnail">
                    </div>
                @endif
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('profileSekolah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection