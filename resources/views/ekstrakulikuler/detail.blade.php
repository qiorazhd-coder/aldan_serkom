@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h4 class="fw-bold mb-4">Detail Ekstrakurikuler</h4>

        @if($ekstrakulikuler->gambar)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $ekstrakulikuler->gambar) }}" alt="" width="200" class="img-thumbnail">
            </div>
        @endif

        <div class="mb-3">
            <label class="fw-bold">Nama Ekstrakurikuler:</label>
            <p>{{ $ekstrakulikuler->nama_ekskul }}</p>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Deskripsi:</label>
            <p>{{ $ekstrakulikuler->deskripsi ?? 'Tidak ada deskripsi' }}</p>
        </div>

        <div>
            <a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection