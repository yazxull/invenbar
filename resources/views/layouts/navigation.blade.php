<nav class="navbar navbar-expand-lg navbar-light modern-nav sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <x-application-logo style="height: 36px; width:auto;" />
        </a>

        <!-- Toggler (hamburger) -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side -->
            <ul class="navbar-nav me-auto ms-lg-4">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link modern-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <i class="bi bi-grid me-1"></i>
                        Dashboard
                    </a>
                </li>

                <!-- Inventaris Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle modern-nav-link {{ request()->routeIs('barang.') || request()->routeIs('peminjaman.') ? 'active' : '' }}"
                        href="#" id="inventarisDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-box-seam me-1"></i>
                        Inventaris
                    </a>
                    <ul class="dropdown-menu modern-dropdown-menu" aria-labelledby="inventarisDropdown">
                        <li>
                            <a class="dropdown-item modern-dropdown-item {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                                href="{{ route('barang.index') }}">
                                <i class="bi bi-box-seam me-2"></i>
                                Barang
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item modern-dropdown-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}"
                                href="{{ route('peminjaman.index') }}">
                                <i class="bi bi-arrow-left-right me-2"></i>
                                Peminjaman
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item modern-dropdown-item {{ request()->routeIs('perbaikan.*') ? 'active' : '' }}"
                                href="{{ route('perbaikan.index') }}">
                                <i class="bi bi-tools me-2"></i>
                                Perbaikan
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- References Dropdown (Admin Only) -->
                @role('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle modern-nav-link {{ request()->routeIs('kategori.') || request()->routeIs('lokasi.') ? 'active' : '' }}"
                            href="#" id="referencesDropdown" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-bookmark me-1"></i>
                            References
                        </a>
                        <ul class="dropdown-menu modern-dropdown-menu" aria-labelledby="referencesDropdown">
                            <li>
                                <a class="dropdown-item modern-dropdown-item {{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                                    href="{{ route('kategori.index') }}">
                                    <i class="bi bi-tag me-2"></i>
                                    Kategori
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item modern-dropdown-item {{ request()->routeIs('lokasi.*') ? 'active' : '' }}"
                                    href="{{ route('lokasi.index') }}">
                                    <i class="bi bi-geo-alt me-2"></i>
                                    Lokasi
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

                <!-- User (Admin Only) -->
                @role('admin')
                    <li class="nav-item">
                        <a class="nav-link modern-nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            <i class="bi bi-people me-1"></i>
                            User
                        </a>
                    </li>
                @endrole
            </ul>

            <!-- Right Side -->
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <!-- Info Lokasi Petugas -->
                @auth
                    @if (Auth::user()->isPetugas() && Auth::user()->lokasi)
                        <li class="nav-item me-3 mb-2 mb-lg-0">
                            <span class="badge-lokasi">
                                <i class="bi bi-geo-alt-fill me-1"></i>
                                {{ Auth::user()->lokasi->nama_lokasi }}
                            </span>
                        </li>
                    @elseif(Auth::user()->isPetugas() && !Auth::user()->lokasi)
                        <li class="nav-item me-3 mb-2 mb-lg-0">
                            <span class="badge-warning-custom">
                                <i class="bi bi-exclamation-triangle me-1"></i>
                                Lokasi belum ditentukan
                            </span>
                        </li>
                    @endif
                @endauth

                <!-- Dropdown User -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle user-dropdown d-flex align-items-center" href="#"
                        id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar me-2">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end modern-dropdown" aria-labelledby="userDropdown">
                        <li class="dropdown-header">
                            <div class="fw-semibold text-dark">{{ Auth::user()->name }}</div>
                            <div class="small text-muted">{{ Auth::user()->email }}</div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-person me-2"></i>
                                {{ __('Profile') }}
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Modern Navigation Styling */
    .modern-nav {
        background: #ffffff;
        border-bottom: 1px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        padding: 0.75rem 0;
    }

    .navbar-brand {
        transition: opacity 0.2s ease;
    }

    .navbar-brand:hover {
        opacity: 0.8;
    }

    /* Navigation Links */
    .modern-nav-link {
        color: #64748b !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        margin: 0 0.25rem;
        border-radius: 8px;
        transition: all 0.2s ease;
        font-size: 0.9375rem;
    }

    .modern-nav-link:hover {
        color: #334155 !important;
        background-color: #f8fafc;
    }

    .modern-nav-link.active {
        color: #3b82f6 !important;
        background-color: #eff6ff;
    }

    .modern-nav-link i {
        font-size: 1rem;
        vertical-align: middle;
    }

    /* Dropdown Menu untuk Inventaris */
    .modern-dropdown-menu {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 0.5rem;
        min-width: 200px;
        margin-top: 0.5rem;
    }

    .modern-dropdown-item {
        padding: 0.625rem 1rem;
        border-radius: 6px;
        color: #475569;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        margin: 0.125rem 0;
        display: flex;
        align-items: center;
    }

    .modern-dropdown-item:hover {
        background-color: #f1f5f9;
        color: #1e293b;
    }

    .modern-dropdown-item.active {
        background-color: #eff6ff;
        color: #3b82f6;
    }

    .modern-dropdown-item i {
        width: 20px;
        text-align: center;
    }

    /* Badge Lokasi */
    .badge-lokasi {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background-color: #f0fdf4;
        color: #15803d;
        border-radius: 8px;
        font-size: 0.8125rem;
        font-weight: 500;
        border: 1px solid #bbf7d0;
    }

    .badge-warning-custom {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background-color: #fffbeb;
        color: #92400e;
        border-radius: 8px;
        font-size: 0.8125rem;
        font-weight: 5;;
        border: 1px solid #fde68a;
    }

    /* User Dropdown */
    .user-dropdown {
        color: #475569 !important;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .user-dropdown:hover {
        background-color: #f8fafc;
        color: #1e293b !important;
    }

    .user-avatar {
        font-size: 1.5rem;
        color: #64748b;
        line-height: 1;
    }

    /* Modern Dropdown Menu (User) */
    .modern-dropdown {
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 0.5rem;
        min-width: 240px;
        margin-top: 0.5rem;
    }

    .modern-dropdown .dropdown-header {
        padding: 0.75rem 1rem;
        background-color: #f8fafc;
        border-radius: 8px;
        margin-bottom: 0.5rem;
    }

    .modern-dropdown .dropdown-item {
        padding: 0.625rem 1rem;
        border-radius: 6px;
        color: #475569;
        font-size: 0.9375rem;
        transition: all 0.2s ease;
        margin: 0.125rem 0;
    }

    .modern-dropdown .dropdown-item:hover {
        background-color: #f1f5f9;
        color: #1e293b;
    }

    .modern-dropdown .dropdown-item.text-danger:hover {
        background-color: #fef2f2;
        color: #dc2626;
    }

    .modern-dropdown .dropdown-item i {
        width: 20px;
        text-align: center;
    }

    .modern-dropdown .dropdown-divider {
        margin: 0.5rem 0;
        border-color: #e2e8f0;
    }

    /* Navbar Toggler */
    .navbar-toggler:focus {
        box-shadow: none;
        outline: 2px solid #e2e8f0;
    }

    /* Mobile Responsive */
    @media (max-width: 991px) {
        .modern-nav-link {
            margin: 0.25rem 0;
        }

        .navbar-nav {
            padding: 1rem 0;
        }

        .modern-dropdown-menu,
        .modern-dropdown {
            border: none;
            box-shadow: none;
        }
    }

    /* Smooth Scroll Behavior */
    html {
        scroll-behavior: smooth;
    }
</style>