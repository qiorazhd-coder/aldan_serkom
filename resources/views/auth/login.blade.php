<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - {{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0d233a 0%, #1a365d 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }
        .btn-custom {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px;
        }
        .btn-custom:hover {
            background-color: #d97706;
            border-color: #d97706;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="login-card">
                    
                    <!-- Header Logo & Nama Sekolah Dinamis dari Profil -->
                    <div class="text-center mb-4">
                        @php
                            $logoLogin = $globalProfile->logo ?? null;
                        @endphp
                        @if($logoLogin)
                            <img src="{{ asset('storage/' . str_replace('public/', '', $logoLogin)) }}" alt="Logo Sekolah" class="mb-3 rounded" style="width: 70px; height: 70px; object-fit: contain;">
                        @else
                            <div class="mb-3 text-warning">
                                <i class="fa-solid fa-graduation-cap fa-3x"></i>
                            </div>
                        @endif
                        <h4 class="fw-bold text-dark mb-1">{{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</h4>
                        <p class="text-muted small">Silakan masuk menggunakan akun admin</p>
                    </div>

                    <!-- Notifikasi Error / Success -->
                    @if(session('error'))
                        <div class="alert alert-danger border-0 small py-2 mb-3" style="border-radius: 8px;">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 small py-2 mb-3" style="border-radius: 8px;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-secondary">Username</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 8px 0 0 8px;"><i class="fa-solid fa-user text-muted"></i></span>
                                <input type="text" name="username" class="form-control bg-light border-start-0 py-2" value="{{ old('username') }}" required placeholder="Masukkan username..." style="border-radius: 0 8px 8px 0;">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-semibold text-secondary">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 8px 0 0 8px;"><i class="fa-solid fa-lock text-muted"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0 py-2" required placeholder="Masukkan password..." style="border-radius: 0 8px 8px 0;">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-custom w-100 shadow-sm mb-3">
                            <i class="fa-solid fa-right-to-bracket me-2"></i>Masuk Dashboard
                        </button>

                        <div class="text-center">
                            <a href="{{ route('landing') }}" class="text-decoration-none small text-muted">
                                <i class="fa-solid fa-arrow-left me-1"></i>Kembali ke Beranda
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>