@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h4 class="fw-bold mb-4">Tambah Ekstrakurikuler</h4>

        <form action="{{ route('ekstrakulikuler.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_ekskul" class="form-label">Nama Ekstrakurikuler</label>
                <input type="text" class="form-control" id="nama_ekskul" name="nama_ekskul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('ekstrakulikuler.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection