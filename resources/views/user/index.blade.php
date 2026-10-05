@extends('layouts.template')

@section('content')
    <div class="container-fluid">

        <div style="margin-top: 40px;">

            {{-- HEADER --}}
            <div
                style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        ">

                <div>
                    <h4
                        style="
                    margin: 0 0 6px 0;
                    font-size: 24px;
                    font-weight: 600;
                    color: #1f2937;
                ">
                        Data Pengelola
                    </h4>

                    <div style="
                    font-size: 14px;
                    color: #6b7280;
                ">
                        Data Pengelola / User
                    </div>
                </div>

                <a href="{{ route('user.create') }}"
                    style="
                    display: inline-block;
                    padding: 9px 16px;
                    background: #3b73d1;
                    color: white;
                    text-decoration: none;
                    border-radius: 6px;
                    font-size: 14px;
                ">
                    Add Data
                </a>

            </div>


            {{-- CARD --}}
            <div
                style="
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 25px;
        ">

                <h5
                    style="
                margin: 0 0 20px 0;
                font-size: 18px;
                font-weight: 600;
                color: #1f2937;
            ">
                    Data Pengelola
                </h5>

                @if (session('success'))
                    <div
                        style="
                    padding: 12px 15px;
                    margin-bottom: 20px;
                    background: #d1e7dd;
                    border: 1px solid #badbcc;
                    color: #0f5132;
                    border-radius: 6px;
                    font-size: 14px;">
                        {{ session('success') }}
                    </div>
                @endif

                <div style="
                width: 100%;
                overflow-x: auto;">

                    <table
                        style="
                    width: 100%;
                    min-width: 900px;
                    border-collapse: collapse;
                    table-layout: fixed;
                    background: white;">

                        <thead>

                            <tr style="background: #f8f9fa;">
                                <th
                                style="
                                width: 60px;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: center;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    No
                                </th>

                                <th
                                style="
                                width: 20%;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: left;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    Name
                                </th>

                                <th
                                style="
                                width: 20%;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: left;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    Username
                                </th>

                                <th
                                style="
                                width: 20%;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: left;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    Password
                                </th>

                                <th
                                style="
                                width: 15%;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: left;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    Role
                                </th>

                                <th
                                    style="
                                width: 190px;
                                padding: 14px 12px;
                                border: 1px solid #dee2e6;
                                text-align: center;
                                font-size: 14px;
                                font-weight: 600;
                                color: #374151;">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($users as $user)
                                <tr>
                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    text-align: center;
                                    font-size: 14px;
                                    color: #374151;">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    font-size: 14px;
                                    color: #374151;
                                    word-break: break-word;">
                                        {{ $user->name }}
                                    </td>

                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    font-size: 14px;
                                    color: #374151;
                                    word-break: break-word;">
                                        {{ $user->username }}
                                    </td>

                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    font-size: 14px;
                                    color: #374151;">
                                        ********
                                    </td>

                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    font-size: 14px;
                                    color: #374151;">
                                        {{ $user->role }}
                                    </td>

                                    <td
                                        style="
                                    padding: 14px 12px;
                                    border: 1px solid #dee2e6;
                                    text-align: center;
                                    white-space: nowrap;">

                                        <a href="{{ route('user.edit', $user->id_user) }}"
                                            style="
                                            display: inline-block;
                                            padding: 7px 13px;
                                            background: #3b73d1;
                                            color: white;
                                            text-decoration: none;
                                            border-radius: 5px;
                                            font-size: 13px;
                                            margin-right: 4px;">
                                            Edit
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id_user) }}" method="POST"
                                            style="display: inline;">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                style="
                                                    padding: 7px 13px;
                                                    background: #dc3545;
                                                    color: white;
                                                    border: none;
                                                    border-radius: 5px;
                                                    font-size: 13px;
                                                    cursor: pointer; "
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        style="
                                        padding: 30px;
                                        border: 1px solid #dee2e6;
                                        text-align: center;
                                        color: #6b7280;
                                        font-size: 14px;">
                                        Belum ada data pengelola.
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
