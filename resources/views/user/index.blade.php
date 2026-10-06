@extends('layouts.template')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Manajemen User</h2>
            <p class="text-muted small mb-0">Kelola akun administrator dan operator sistem.</p>
        </div>
        <a href="{{ route('user.create') }}" class="btn btn-warning fw-semibold px-4 rounded-pill shadow-sm">
            <i class="fa-solid fa-user-plus me-2"></i> Tambah User Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 12px;">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm" style="border-radius: 16px;">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="py-3">No</th>
                            <th class="py-3">Foto</th>
                            <th class="py-3">Nama Lengkap</th>
                            <th class="py-3">Username</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Role</th>
                            <th class="py-3">Dibuat (Timestamp)</th>
                            <th class="py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $u)
                            <tr>
                                <td class="fw-bold text-secondary">{{ $index + 1 }}</td>
                                <td>
                                    @php
                                        $fotoUsr = $u->foto ?? null;
                                    @endphp
                                    @if($fotoUsr)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $fotoUsr)) }}" class="rounded-circle border shadow-sm" style="width: 42px; height: 42px; object-fit: cover;" alt="Foto User">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 42px; height: 42px;">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $u->name }}</span>
                                </td>
                                <td>
                                    <code>{{ $u->username }}</code>
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge {{ $u->role == 'admin' ? 'bg-danger' : 'bg-primary' }} px-3 py-2 rounded-pill fw-semibold">
                                        <i class="fa-solid {{ $u->role == 'admin' ? 'fa-shield-halved' : 'fa-headset' }} me-1"></i>
                                        {{ ucfirst($u->role) }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        <i class="fa-regular fa-clock me-1"></i>
                                        {{ $u->created_at ? $u->created_at->format('d M Y, H:i') . ' WIB' : '-' }}
                                    </small>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('user.edit', $u->id_user ?? $u->id) }}" class="btn btn-sm btn-outline-primary px-3 rounded-pill fw-semibold">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $u->id_user ?? $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger px-3 rounded-pill fw-semibold">
                                                <i class="fa-solid fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-users-slash fa-3x mb-3 text-secondary opacity-50"></i>
                                    <p class="mb-0">Belum ada data user yang terdaftar.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection