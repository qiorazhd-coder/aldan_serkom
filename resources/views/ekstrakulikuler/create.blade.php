@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h4 class="fw-bold mb-1">Tambah Ekstrakurikuler</h4>
        <p class="text-muted mb-4">Tambahkan data kegiatan ekstrakurikuler baru.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ekstrakulikuler.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label fw-semibold">Nama Ekstrakurikuler</label>
                    <input type="text" name="nama_ekskul" class="form-control" value="{{ old('nama_ekskul') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Pembina</label>
                    <input type="text" name="pembina" class="form-control" value="{{ old('pembina') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Jadwal Latihan</label>
                    <input type="text" name="jadwal_latihan" class="form-control" placeholder="Contoh: Rabu, 15:00 WIB" value="{{ old('jadwal_latihan') }}" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-light px-4">Kembali</a>
                <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection