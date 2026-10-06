@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Detail Guru / Staf
    </h4>
    <a href="{{ route('guru.index') }}" class="btn btn-outline-secondary px-3 py-1.5 fw-semibold" style="border-radius: 8px;">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="px-4 pb-4">
    <div class="card border-0 shadow-sm p-4 w-100" style="border-radius: 16px; background: #ffffff;">
        <div class="row g-4 align-items-center">
            
            <div class="col-12 col-md-4 col-lg-3 text-center border-end pe-md-4">
                @if($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" 
                         class="rounded shadow-sm img-fluid" style="max-height: 260px; object-fit: cover; border-radius: 12px;">
                @else
                    <div class="bg-light rounded d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 180px; height: 230px; border-radius: 12px;">
                        <i class="fa-solid fa-user fa-5x text-secondary"></i>
                    </div>
                @endif
                <h5 class="fw-bold text-dark mt-3 mb-1">{{ $guru->nama_guru }}</h5>
                <span class="badge bg-secondary px-3 py-2 fw-normal fs-6">NIP: {{ $guru->nip }}</span>
            </div>

            <div class="col-12 col-md-8 col-lg-9 ps-md-4">
                <h5 class="fw-bold text-dark border-bottom pb-2 mb-4">Informasi Pegawai</h5>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">ID Guru (UUID)</div>
                    <div class="col-12 col-sm-8 text-dark font-monospace text-muted small">{{ $guru->id_guru }}</div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">Nama Lengkap</div>
                    <div class="col-12 col-sm-8 fw-bold text-dark fs-6">{{ $guru->nama_guru }}</div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">NIP / NUPTK</div>
                    <div class="col-12 col-sm-8 text-dark fs-6">{{ $guru->nip }}</div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">Mata Pelajaran</div>
                    <div class="col-12 col-sm-8 text-dark fs-6">{{ $guru->mapel ?? '-' }}</div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">Tanggal Dibuat</div>
                    <div class="col-12 col-sm-8 text-muted small">{{ $guru->created_at ? $guru->created_at->translatedFormat('d F Y H:i') : '-' }}</div>
                </div>

                <div class="row mb-4 align-items-center">
                    <div class="col-12 col-sm-4 text-secondary fw-semibold">Terakhir Diperbarui</div>
                    <div class="col-12 col-sm-8 text-muted small">{{ $guru->updated_at ? $guru->updated_at->translatedFormat('d F Y H:i') : '-' }}</div>
                </div>

                <div class="border-top pt-3 text-end gap-2 d-flex justify-content-end">
                    <a href="{{ route('guru.edit', $guru->id_guru) }}" class="btn text-white px-4 py-2 fw-semibold" style="background-color: #0d233a; border-radius: 8px;">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Data
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection