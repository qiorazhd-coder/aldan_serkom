@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="mb-4">
        <h2 class="fw-bold text-dark mb-1">Edit User</h2>
        <p class="text-muted small mb-0">Perbarui informasi akun administrator atau operator.</p>
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
            <form action="{{ route('user.update', $user->id_user ?? $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4 align-items-center mb-4">
                    <div class="col-md-auto text-center">
                        @php
                            $fotoUsr = $user->foto ?? null;
                        @endphp
                        @if($fotoUsr)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $fotoUsr)) }}" class="rounded-circle border shadow-sm" style="width: 80px; height: 80px; object-fit: cover;" alt="Foto">
                        @else
                            <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px;">
                                <i class="fa-solid fa-user fa-2x"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col">
                        <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
                        <p class="text-muted small mb-0">Bergabung sejak: {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}</p>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control py-2.5" value="{{ old('name', $user->name) }}" required style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Username</label>
                        <input type="text" name="username" class="form-control py-2.5" value="{{ old('username', $user->username) }}" required style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Email</label>
                        <input type="email" name="email" class="form-control py-2.5" value="{{ old('email', $user->email) }}" required style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Password Baru <span class="text-muted small">(Kosongkan jika tidak ingin mengubah password)</span></label>
                        <input type="password" name="password" class="form-control py-2.5" placeholder="Biarkan kosong jika tetap" style="border-radius: 10px;">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Role / Hak Akses</label>
                        <select name="role" class="form-select py-2.5" required style="border-radius: 10px;">
                            <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Admin (Akses Penuh)</option>
                            <option value="operator" {{ (old('role', $user->role) == 'operator') ? 'selected' : '' }}>Operator (Akses Terbatas)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Ganti Foto Profil (Opsional)</label>
                        <input type="file" name="foto" class="form-control py-2.5" style="border-radius: 10px;">
                        <small class="text-muted">Format: JPG, PNG, WEBP (Maks. 2MB)</small>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-end gap-2">
                    <a href="{{ route('user.index') }}" class="btn btn-light px-4 rounded-pill fw-semibold">Batal</a>
                    <button type="submit" class="btn btn-warning px-5 rounded-pill fw-semibold shadow-sm">Perbarui User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection