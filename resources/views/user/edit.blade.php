@extends('layouts.template')

@section('content')

    <div class="container-fluid" style="position: relative; top: 45px;">

        <div class="mb-4">
            <h4 class="mb-1">
                Edit Pengelola
            </h4>
            <small class="text-muted">
                Data Pengelola / Edit Pengelola
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

                <form action="{{ route('user.update', $user->id_user) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">
                            Name
                        </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}"
                            maxlength="50" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>
                        <input type="text" name="username" class="form-control"
                            value="{{ old('username', $user->username) }}" maxlength="30" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" maxlength="100">
                        <small class="text-muted">
                            Kosongkan jika password tidak ingin diubah.
                        </small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Role
                        </label>
                        <select name="role" class="form-select" required>
                            <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                            <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>
                                Operator
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>

@endsection
