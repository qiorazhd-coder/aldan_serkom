@extends('layouts.template')

@section('content')

    <div class="container-fluid" style="position: relative; top: 45px;">
        <div class="mb-4">
            <h4 class="mb-1">Create Pengelola</h4>
            <small class="text-muted">
                Data Pengelola / Create Pengelola
            </small>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="mb-4">
                    Data Pengelola
                </h5>
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
                    <div class="mb-3">
                        <label class="form-label">
                            Name
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" maxlength="50"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                            maxlength="30" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" maxlength="100" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Role
                        </label>

                        <select name="role" class="form-select" required>
                            <option value="">
                            -- Pilih Role --
                            </option>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="Operator" {{ old('role') == 'Operator' ? 'selected' : '' }}>
                                Operator
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
