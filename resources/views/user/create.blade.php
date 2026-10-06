@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h2 class="fw-bold text-dark mb-1">Tambah User Baru</h2>
        <p class="text-muted small mb-0">Tambahkan akun administrator atau operator baru ke dalam sistem.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 12px;">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control py-2.5" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso" style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control py-2.5" value="{{ old('username') }}" required placeholder="Contoh: operator123" style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" name="email" class="form-control py-2.5" value="{{ old('email') }}" required placeholder="Contoh: email@sekolah.com" style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Password</label>
                        <input type="password" name="password" class="form-control py-2.5" required placeholder="Minimal 6 karakter" style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Role / Hak Akses</label>
                        <select name="role" class="form-select py-2.5" required style="border-radius: 10px;">
                            <option value="" disabled selected>-- Pilih Role --</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Akses Penuh)</option>
                            <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator (Akses Terbatas)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Foto Profil (Opsional)</label>
                        <input type="file" name="foto" class="form-control py-2.5" style="border-radius: 10px;">
                        <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 2MB)</small>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-end gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-light px-4 rounded-pill fw-semibold">Batal</a>
                    <button type="submit" class="btn btn-warning px-5 rounded-pill fw-semibold shadow-sm">Simpan User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection