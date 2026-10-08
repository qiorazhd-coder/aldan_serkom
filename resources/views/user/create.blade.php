@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <h4 class="fw-bold mb-1">Tambah User Baru</h4>
        <p class="text-muted mb-4">Tambahkan akun administrator atau operator baru ke dalam sistem.</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label fw-semibold">Role / Hak Akses</label>
                    <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="" disabled selected>Pilih Hak Akses</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Operator" {{ old('role') == 'Operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('user.index') }}" class="btn btn-light px-4">Batal</a>
                <button type="submit" class="btn btn-warning px-4 fw-bold">Simpan User</button>
            </div>
        </form>
    </div>
</div>
@endsection