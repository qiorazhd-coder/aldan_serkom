<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Website Profil Sekolah SMK YPC" />
    <title>Dashboard Admin | Profil Sekolah SMK YPC</title>

    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all" />
    <link rel="preconnect" href="https://rsms.me/" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link href="{{ asset('vendor/fontawesome-7.3.1/css/all.min.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('vendor/bootstrap-5.3.8.min.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('asset/css/theme.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('asset/css/app.css') }}" rel="stylesheet" media="all" />
</head>

<body class="app">
    <a class="visually-hidden-focusable skip-link" href="#main-content">Skip to main content</a>

    <div class="page-wrapper">
        <!-- Header Mobile -->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ route('admin.index') }}">
                            <i class="fa-solid fa-graduation-cap fa-lg me-2 text-primary"></i>
                            <strong style="font-size: 16px;">PROFIL SEKOLAH <span class="text-primary">SMK
                                    YPC</span></strong>
                        </a>
                        <button class="hamburger hamburger--slider" type="button" aria-label="Toggle navigation">
                            <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="{{ route('admin.index') }}"><i class="fa-solid fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('profileSekolah.index') }}"><i class="fa-solid fa-school"></i>Profil
                                Sekolah</a>
                        </li>
                        <li>
                            <a href="{{ route('berita.index') }}"><i class="fa-solid fa-newspaper"></i>Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('guru.index') }}"><i class="fa-solid fa-chalkboard-user"></i>Guru &
                                Staf</a>
                        </li>
                        <li>
                            <a href="{{ route('siswa.index') }}"><i class="fa-solid fa-user-graduate"></i>Siswa</a>
                        </li>
                        <li>
                            <a href="{{ route('ekstrakurikuler.index') }}"><i
                                    class="fa-solid fa-futbol"></i>Ekstrakurikuler</a>
                        </li>
                        <li>
                            <a href="{{ route('galeri.index') }}"><i class="fa-solid fa-images"></i>Galeri</a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}"><i class="fa-solid fa-users-gear"></i>Manajemen
                                User</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- End Header Mobile -->

        <!-- Sidebar Desktop -->
        <aside class="menu-sidebar" id="main-sidebar">
            <div class="logo">
                <a class="logo-link" href="{{ route('admin.index') }}"
                    style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                    <span class="logo-mark" aria-hidden="true"
                        style="background: #4272d7; color: #fff; padding: 6px 10px; border-radius: 6px;">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </span>
                    <span class="logo-text" style="font-weight: 700; font-size: 15px; color: #333;">
                        SMK YPC
                    </span>
                </a>
                <button class="sidebar-close js-sidebar-toggle" type="button" aria-label="Close navigation">
                    <i class="fa-solid fa-xmark" aria-hidden="true"></i>
                </button>
            </div>

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}">
                                <i class="fa-solid fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('profileSekolah.*') ? 'active' : '' }}">
                            <a href="{{ route('profileSekolah.index') }}">
                                <i class="fa-solid fa-school"></i>Profil Sekolah
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">
                            <a href="{{ route('berita.index') }}">
                                <i class="fa-solid fa-newspaper"></i>Berita
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('guru.*') ? 'active' : '' }}">
                            <a href="{{ route('guru.index') }}">
                                <i class="fa-solid fa-chalkboard-user"></i>Guru & Staf
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                            <a href="{{ route('siswa.index') }}">
                                <i class="fa-solid fa-user-graduate"></i>Siswa
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}">
                            <a href="{{ route('ekstrakurikuler.index') }}">
                                <i class="fa-solid fa-futbol"></i>Ekstrakurikuler
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                            <a href="{{ route('galeri.index') }}">
                                <i class="fa-solid fa-images"></i>Galeri
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}">
                                <i class="fa-solid fa-users-gear"></i>Manajemen User
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- End Sidebar Desktop -->

        <!-- Page Container -->
        <div class="page-container">
            <!-- Header Desktop -->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap justify-content-end">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="content">
                                        <a class="js-acc-btn" href="#"><i
                                                class="fa-solid fa-user me-2"></i>{{ Auth::user()->username ?? 'Admin SMK YPC' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- End Header Desktop -->

                        <!-- Footer -->
                        <div class="row" style="margin-top: 28px;">
                            <div class="col-md-12">
                                <div class="copyright text-center text-muted">
                                    <p>Copyright © {{ date('Y') }} <strong>SMK YPC</strong>. All rights reserved.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>
            <!-- End Main Content Area -->
        </div>
        <!-- End Page Container -->
    </div>

    <script src="{{ asset('js/vanilla-utils.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.8.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/chart.umd.js-4.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap5-init.js') }}"></script>
    <script src="{{ asset('js/main-vanilla.js') }}"></script>
    <script src="{{ asset('js/modern-plugins.js') }}"></script>
</body>

</html>
