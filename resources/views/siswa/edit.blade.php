@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Edit Data Siswa
    </h4>
    <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
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

        <form action="{{ route('siswa.update', $siswa->id_siswa) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">NISN <span class="text-danger">*</span></label>
                    <input type="text" name="nisn" class="form-control py-2.5" value="{{ old('nisn', $siswa->nisn) }}" required style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select name="jenis_kelamin" class="form-select py-2.5" required style="border-radius: 8px; background-color: #f8fafc;">
                        <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Nama Lengkap Siswa <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control py-2.5" value="{{ old('nama', $siswa->nama) }}" required style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">Kelas <span class="text-danger">*</span></label>
                    <input type="text" name="kelas" class="form-control py-2.5" value="{{ old('kelas', $siswa->kelas) }}" required style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12 col-md-6">
                    <label class="form-label fw-semibold text-dark">Jurusan <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan" class="form-control py-2.5" value="{{ old('jurusan', $siswa->jurusan) }}" required style="border-radius: 8px; background-color: #f8fafc;">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Alamat (Opsional)</label>
                    <textarea name="alamat" class="form-control" rows="3" style="border-radius: 8px; background-color: #f8fafc;">{{ old('alamat', $siswa->alamat) }}</textarea>
                </div>
            </div>

            <div class="pt-4 mt-3 border-top text-end d-flex justify-content-between align-items-center">
                <a href="{{ route('siswa.index') }}" class="btn btn-light border px-4 py-2 fw-semibold text-secondary" style="border-radius: 8px;">
                    Batal
                </a>
                <button type="submit" class="btn text-white px-4 py-2.5 fw-bold shadow-sm" style="background-color: #0d233a; border-radius: 8px;">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Perbarui Data
                </button>
            </div>
        </form>

    </div>
</div>

@endsection