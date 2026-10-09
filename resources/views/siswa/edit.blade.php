@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Edit Data Siswa
    </h4>
    <a href="{{ route('siswa.index') }}" class="btn btn-outline-dark btn-sm fw-semibold px-3 py-2" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; background: #ffffff;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">NISN</label>
                            <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn', $siswa->nisn) }}" required style="border-radius: 8px;">
                            @error('nisn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Nama Lengkap Siswa</label>
                            <input type="text" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror" value="{{ old('nama_siswa', $siswa->nama_siswa) }}" required style="border-radius: 8px;">
                            @error('nama_siswa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required style="border-radius: 8px;">
                                <option value="Laki-Laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Tahun Masuk</label>
                            <input type="number" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}" required style="border-radius: 8px;">
                            @error('tahun_masuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('siswa.index') }}" class="btn btn-light px-4 py-2 fw-semibold" style="border-radius: 8px;">Batal</a>
                            <button type="submit" class="btn text-white px-4 py-2 fw-semibold" style="background-color: #0d233a; border-radius: 8px;">
                                <i class="fa-solid fa-save me-1"></i> Perbarui Data
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection