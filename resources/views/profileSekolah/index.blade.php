@extends('layouts.template')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="row">
        <div class="col-md-12">
            <div class="page-header mb-4">

                <h2 class="title-1">
                    Profil Sekolah
                </h2>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Profil Sekolah
                        </li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>


    {{-- DATA PROFIL SEKOLAH --}}
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                {{-- CARD HEADER --}}
                <div class="card-header d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">
                        Data Profil Sekolah
                    </h4>

                    <a href="{{ route('profileSekolah.create') }}"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>
                        Tambah Data

                    </a>

                </div>


                {{-- CARD BODY --}}
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle profile-table">

                            <thead>
                                <tr>

                                    <th>No</th>

                                    <th>Nama Sekolah</th>

                                    <th>Kepala Sekolah</th>

                                    <th>NPSN</th>

                                    <th>Alamat</th>

                                    <th>Kontak</th>

                                    <th>Visi & Misi</th>

                                    <th>Tahun Berdiri</th>

                                    <th>Foto</th>

                                    <th>Logo</th>

                                    <th>Deskripsi</th>

                                    <th>Aksi</th>

                                </tr>
                            </thead>


                            <tbody>

                                @forelse ($profileSekolah as $data)

                                <tr>

                                    {{-- NO --}}
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- NAMA SEKOLAH --}}
                                    <td>
                                        <div class="column-content">
                                            {{ $data->nama_sekolah ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- KEPALA SEKOLAH --}}
                                    <td>
                                        <div class="column-content">
                                            {{ $data->kepala_sekolah ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- NPSN --}}
                                    <td>
                                        <div class="column-content">
                                            {{ $data->npsn ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- ALAMAT --}}
                                    <td>
                                        <div class="column-content address-content">
                                            {{ $data->alamat ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- KONTAK --}}
                                    <td>
                                        <div class="column-content">
                                            {{ $data->kontak ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- VISI MISI --}}
                                    <td>
                                        <div class="column-content long-content">
                                            {{ $data->visi_misi ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- TAHUN BERDIRI --}}
                                    <td>
                                        <div class="column-content text-center">
                                            {{ $data->tahun_berdiri ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- FOTO --}}
                                    <td class="text-center">

                                        @if($data->foto)

                                            <img
                                                src="{{ asset('storage/' . $data->foto) }}"
                                                alt="Foto Sekolah"
                                                class="profile-image"
                                            >

                                        @else

                                            <span class="text-muted">
                                                Tidak ada foto
                                            </span>

                                        @endif

                                    </td>


                                    {{-- LOGO --}}
                                    <td class="text-center">

                                        @if($data->logo)

                                            <img
                                                src="{{ asset('storage/' . $data->logo) }}"
                                                alt="Logo Sekolah"
                                                class="logo-image"
                                            >

                                        @else

                                            <span class="text-muted">
                                                Tidak ada logo
                                            </span>

                                        @endif

                                    </td>


                                    {{-- DESKRIPSI --}}
                                    <td>
                                        <div class="column-content description-content">
                                            {{ $data->deskripsi ?? '-' }}
                                        </div>
                                    </td>


                                    {{-- AKSI --}}
                                    <td>

                                        <div class="action-buttons">

                                            {{-- EDIT --}}
                                            <a
                                                href="{{ route('profileSekolah.edit', $data->id_profile_sekolah) }}"
                                                class="btn btn-warning btn-sm"
                                                title="Edit"
                                            >
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            {{-- HAPUS --}}
                                            <form
                                                action="{{ route('profileSekolah.destroy', $data->id_profile_sekolah) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    title="Hapus"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                                @empty

                                <tr>

                                    <td
                                        colspan="12"
                                        class="text-center py-5"
                                    >

                                        <i class="fas fa-database fa-2x mb-3 text-muted"></i>

                                        <div>
                                            Belum ada data profil sekolah.
                                        </div>

                                    </td>

                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>


{{-- STYLE KHUSUS TABEL PROFIL SEKOLAH --}}
<style>

    /* Jarak antar kolom */
    .profile-table th,
    .profile-table td {
        padding: 15px 20px !important;
        vertical-align: middle;
    }

    /* Header tabel */
    .profile-table thead th {
        white-space: nowrap;
        font-weight: 600;
    }

    /* Isi kolom */
    .column-content {
        min-width: 150px;
        line-height: 1.6;
        white-space: normal;
        word-break: break-word;
    }

    /* Alamat */
    .address-content {
        min-width: 220px;
        max-width: 300px;
    }

    /* Visi Misi */
    .long-content {
        min-width: 250px;
        max-width: 350px;
    }

    /* Deskripsi */
    .description-content {
        min-width: 250px;
        max-width: 350px;
    }

    /* Foto */
    .profile-image {
        width: 100px;
        height: 75px;
        object-fit: cover;
        border-radius: 6px;
        display: block;
        margin: auto;
    }

    /* Logo */
    .logo-image {
        width: 70px;
        height: 70px;
        object-fit: contain;
        display: block;
        margin: auto;
    }

    /* Tombol aksi */
    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
        min-width: 110px;
    }

    /* Form hapus */
    .action-buttons form {
        margin: 0;
    }

    /* Supaya tabel tidak terlalu mepet */
    .profile-table {
        min-width: 1800px;
        margin-bottom: 0;
    }

    /* Scroll horizontal lebih nyaman */
    .table-responsive {
        overflow-x: auto;
    }

</style>

@endsection
