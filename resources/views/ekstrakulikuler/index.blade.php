@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0">Data Ekstrakurikuler</h4>
            <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-primary">Tambah Ekstrakurikuler</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Ekskul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ekstrakulikulers as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="" width="60" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $item->nama_ekskul }}</td>
                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td>
                            <a href="{{ route('ekstrakulikuler.edit', $item->id ?? $item->id_ekstrakulikuler) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('ekstrakulikuler.destroy', $item->id ?? $item->id_ekstrakulikuler) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection