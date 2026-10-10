<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin - {{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            overflow-x: hidden;
        }
        #sidebar {
            min-width: 280px;
            max-width: 280px;
            background: #0d233a;
            color: #fff;
            min-height: 100vh;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: -280px; /* Sembunyikan secara default di HP */
            z-index: 1050;
        }
        #sidebar.active {
            left: 0; /* Munculkan saat aktif */
        }
        #sidebar .sidebar-header {
            padding: 22px 20px;
            background: #09192a;
        }
        #sidebar ul.components {
            padding: 20px 0;
        }
        #sidebar ul li a {
            padding: 14px 22px;
            font-size: 1rem;
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
        }
        #sidebar ul li a:hover,
        #sidebar ul li a.active {
            color: #fff;
            background: #1a365d;
            border-left: 4px solid #f59e0b;
        }
        #content {
            width: 100%;
            margin-left: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }
        
        /* Tampilan di Laptop / Layar Besar */
        @media (min-width: 992px) {
            #sidebar {
                left: 0; /* Selalu tampil di laptop */
            }
            #sidebar.active {
                left: -280px; 
            }
            #content {
                width: calc(100% - 280px);
                margin-left: 280px;
            }
            #sidebar.active + #content,
            #content.expanded {
                width: 100%;
                margin-left: 0;
            }
        }

        .navbar-top {
            background: #ffffff;
            height: 70px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        
        /* Overlay gelap saat sidebar muncul di HP */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.4);
            z-index: 1040;
            display: none;
        }
        .sidebar-overlay.active {
            display: block;
        }
    </style>
</head>
<body>

    <!-- Overlay untuk HP -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="wrapper d-flex flex-column flex-lg-row">
        
        <!-- SIDEBAR -->
        <nav id="sidebar">
            <div class="sidebar-header d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    @php
                        $logoApp = $globalProfile->logo ?? null;
                    @endphp
                    @if($logoApp)
                        <img src="{{ asset('storage/' . str_replace('public/', '', $logoApp)) }}" alt="Logo" style="width: 35px; height: 35px; object-fit: contain;">
                    @else
                        <i class="fa-solid fa-graduation-cap text-warning fs-4"></i>
                    @endif
                    <h5 class="fw-bold mb-0 text-white" style="font-size: 1.1rem;">{{ $globalProfile->nama_sekolah ?? 'Aldan Serkom' }}</h5>
                </div>
                <!-- Tombol Close Sidebar di HP -->
                <button class="btn text-white d-lg-none" id="sidebarCloseBtn">
                    <i class="fa-solid fa-xmark fs-5"></i>
                </button>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{ route('admin.index') }}" class="{{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="fa-solid fa-house me-2"></i> Beranda Utama
                    </a>
                </li>
                <li>
                    <a href="{{ route('profileSekolah.index') }}" class="{{ Request::is('profileSekolah*') ? 'active' : '' }}">
                        <i class="fa-solid fa-school me-2"></i> Profil Sekolah
                    </a>
                </li>
                <li>
                    <a href="{{ route('guru.index') }}" class="{{ Request::is('guru*') ? 'active' : '' }}">
                        <i class="fa-solid fa-chalkboard-user me-2"></i> Guru & Staf
                    </a>
                </li>
                <li>
                    <a href="{{ route('siswa.index') }}" class="{{ Request::is('siswa*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-graduate me-2"></i> Data Siswa
                    </a>
                </li>
                <li>
                    <a href="{{ route('ekstrakulikuler.index') }}" class="{{ Request::is('ekstrakurikuler*') ? 'active' : '' }}">
                        <i class="fa-solid fa-basketball me-2"></i> Ekstrakurikuler
                    </a>
                </li>
                <li>
                    <a href="{{ route('galeri.index') }}" class="{{ Request::is('galeri*') ? 'active' : '' }}">
                        <i class="fa-solid fa-images me-2"></i> Galeri Foto
                    </a>
                </li>
                <li>
                    <a href="{{ route('berita.index') }}" class="{{ Request::is('berita*') ? 'active' : '' }}">
                        <i class="fa-solid fa-newspaper me-2"></i> Berita & Informasi
                    </a>
                </li>

                @if(Auth::check() && strtolower(Auth::user()->role) === 'admin')
                <li>
                    <a href="{{ route('user.index') }}" class="{{ Request::is('user*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users-gear me-2"></i> Manajemen User
                    </a>
                </li>
                @endif
            </ul>

            <div class="px-4 pb-4 mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 btn-sm rounded-pill py-2">
                        <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
                    </button>
                </form>
            </div>
        </nav>

        <div id="content">
            
            <!-- TOP NAVBAR -->
            <nav class="navbar navbar-expand navbar-top px-4 d-flex justify-content-between align-items-center">
                <!-- Tombol Hamburger (Hanya tampil di HP/Tablet, otomatis sembunyi di Laptop berkat d-lg-none) -->
                <button class="btn btn-light border shadow-sm d-lg-none" id="sidebarToggle" type="button">
                    <i class="fa-solid fa-bars text-dark"></i>
                </button>

                <div class="dropdown ms-auto">
                    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle text-dark gap-2 p-1 rounded-pill pe-3 bg-light border" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="rounded-circle bg-warning text-dark d-inline-flex align-items-center justify-content-center shadow-sm fw-bold" style="width: 38px; height: 38px; font-size: 0.9rem;">
                            {{ Auth::check() ? strtoupper(substr(Auth::user()->username, 0, 1)) : 'A' }}
                        </div>
                        <div class="d-none d-md-block text-start" style="line-height: 1.2;">
                            <span class="fw-bold d-block" style="font-size: 0.85rem;">{{ Auth::user()?->username ?? 'Guest' }}</span>
                            <small class="text-muted" style="font-size: 0.75rem;">{{ ucfirst(Auth::user()?->role ?? 'Tamu') }}</small>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 py-3 px-2 mt-2" aria-labelledby="adminDropdown" style="width: 240px; border-radius: 14px;">
                        <li class="px-3 pb-2 mb-2 border-bottom text-center">
                            <div class="rounded-circle bg-warning text-dark d-inline-flex align-items-center justify-content-center shadow-sm fw-bold mb-2 fs-4" style="width: 55px; height: 55px;">
                                {{ Auth::check() ? strtoupper(substr(Auth::user()->username, 0, 1)) : 'A' }}
                            </div>
                            <h6 class="fw-bold text-dark mb-0">@ {{ Auth::user()?->username ?? 'Guest' }}</h6>
                            <small class="text-muted">{{ ucfirst(Auth::user()?->role ?? 'Tamu') }}</small>
                        </li>

                        @auth
                        <li>
                            <a class="dropdown-item py-2 px-3 rounded-2 fw-semibold text-dark d-flex align-items-center gap-2" href="{{ route('user.edit', Auth::user()->id_user) }}">
                                <i class="fa-solid fa-user-pen text-primary"></i> Edit Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider my-2"></li>
                        @endauth

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item py-2 px-3 rounded-2 fw-semibold text-danger d-flex align-items-center gap-2">
                                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="main-content">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Script Bootstrap & Toggle Hamburger -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });
        }

        if (sidebarCloseBtn) {
            sidebarCloseBtn.addEventListener('click', function () {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }

        if (sidebarOverlay) {
            sidebarOverlay.addEventListener('click', function () {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
            });
        }
    </script>
</body>
</html>