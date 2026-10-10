@extends('layouts.template')

@section('content')

<div class="bg-white px-4 py-3 border-bottom d-flex align-items-center justify-content-between mb-4 shadow-sm" style="height: 70px;">
    <h4 class="fw-bold mb-0 text-dark" style="font-size: 1.25rem;">
        Profil Sekolah - {{ $profileSekolah->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}
    </h4>
</div>

<div class="px-4 pb-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4 text-white" 
             style="background-color: #10b981; border-radius: 10px;" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">

        <div class="col-12 col-lg-5 col-xl-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100 d-flex flex-column align-items-center justify-content-between" style="border-radius: 16px; background: #ffffff;">
                
                <div class="w-100">
                    <div class="my-3">
                        @if(isset($profileSekolah) && $profileSekolah->logo)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $profileSekolah->logo)) }}?t={{ time() }}" 
                                 alt="Logo Sekolah" 
                                 style="width: 140px; height: 140px; object-fit: contain;">
                        @else
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3 shadow-sm mx-auto" style="width: 140px; height: 140px;">
                                <i class="fa-solid fa-school fa-4x text-primary"></i>
                            </div>
                        @endif
                    </div>

                    <h4 class="fw-bold text-dark mb-1">{{ $profileSekolah->nama_sekolah ?? 'SMK YPC TASIKMALAYA' }}</h4>

                    <div class="text-center mb-4">
                        <div class="mb-3">
                            <span class="d-block text-dark fw-bold">NPSN</span>
                            <span class="text-muted small">{{ $profileSekolah->npsn ?? '-' }}</span>
                        </div>
                        <div class="mb-3">
                            <span class="d-block text-dark fw-bold">Hubungi Sekolah</span>
                            <span class="text-muted small">{{ $profileSekolah->kontak ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="d-block text-dark fw-bold">Lokasi</span>
                            <span class="text-muted small">{{ $profileSekolah->alamat ?? 'Tasikmalaya' }}</span>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 w-100 mt-3">
                    <a href="#visi_misi" class="btn text-white w-50 py-2 fw-semibold small" style="background-color: #0d233a; border-radius: 8px;">
                        Lihat Visi & Misi
                    </a>
                    <a href="tel:{{ $profileSekolah->kontak ?? '' }}" class="btn text-white w-50 py-2 fw-semibold small" style="background-color: #0d233a; border-radius: 8px;">
                        Hubungi Sekolah
                    </a>
                </div>

            </div>
        </div>

        <div class="col-12 col-lg-7 col-xl-8">
            <div class="card border-0 shadow-sm p-4 h-100 d-flex flex-column justify-content-between" style="border-radius: 16px; background: #ffffff;">
                
                <div class="d-flex flex-column gap-2">

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-building fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">Nama Sekolah</div>
                        <div class="col-7 fw-bold text-dark fs-6">{{ $profileSekolah->nama_sekolah ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-user-tie fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">Kepala Sekolah</div>
                        <div class="col-7 text-dark fs-6">{{ $profileSekolah->kepala_sekolah ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <span class="fw-bold small">NPSN</span>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">NPSN</div>
                        <div class="col-7 text-dark fs-6">{{ $profileSekolah->npsn ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-location-dot fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">Alamat</div>
                        <div class="col-7 text-dark fs-6">{{ $profileSekolah->alamat ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-phone fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">Kontak</div>
                        <div class="col-7 text-dark fs-6">{{ $profileSekolah->kontak ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-start py-2.5 border-bottom" id="visi_misi">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center mt-1" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-circle-check fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6 mt-2">Visi & Misi</div>
                        <div class="col-7 text-dark fs-6 mt-2">
                            {!! isset($profileSekolah->visi_misi) ? nl2br(e($profileSekolah->visi_misi)) : '<em class="text-muted">- Belum diisi -</em>' !!}
                        </div>
                    </div>

                    <div class="d-flex align-items-center py-2.5 border-bottom">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-calendar-days fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6">Tahun Berdiri</div>
                        <div class="col-7 text-dark fs-6">{{ $profileSekolah->tahun_berdiri ?? '-' }}</div>
                    </div>

                    <div class="d-flex align-items-start py-2.5">
                        <div class="p-2 rounded-3 me-3 text-white d-flex align-items-center justify-content-center mt-1" style="background-color: #0d233a; width: 42px; height: 42px;">
                            <i class="fa-solid fa-list fa-lg"></i>
                        </div>
                        <div class="col-4 fw-bold text-dark fs-6 mt-2">Sambutan Pimpinan</div>
                        <div class="col-7 text-dark fs-6 mt-2">
                            {!! isset($profileSekolah->deskripsi) ? nl2br(e($profileSekolah->deskripsi)) : '<em class="text-muted">- Belum diisi -</em>' !!}
                        </div>
                    </div>

                </div>

                <div class="mt-4 pt-3 border-top text-end">
                    <a href="{{ route('profileSekolah.edit') }}" 
                       class="btn text-white px-4 py-2.5 fw-bold shadow-sm" 
                       style="background-color: #0d233a; border-radius: 8px;">
                        @if(isset($profileSekolah) && $profileSekolah->id_profil)
                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Data Profil
                        @else
                            <i class="fa-solid fa-plus me-2"></i>Isi Data Profil
                        @endif
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection