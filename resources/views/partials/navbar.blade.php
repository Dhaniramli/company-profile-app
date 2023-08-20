<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Company Profile</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="#">Beranda</a>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                        <li><a class="dropdown-item" href="#">Tugas & Fungsi</a></li>
                        <li><a class="dropdown-item" href="#">Kedudukan & Alamat</a></li>
                        <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item" href="#">Denah Kantor</a></li>
                        <li><a class="dropdown-item" href="#">Pejabat Struktural</a></li>
                        <li><a class="dropdown-item" href="#">Unit Kerja</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">Program Kegiatan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Berita Kegiatan</a></li>
                        <li><a class="dropdown-item" href="#">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">Masyarakat</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pengaduan Masyarakat</a></li>
                        <li><a class="dropdown-item" href="#">Survey Masyarakat</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Dokumen & Publikasi</a>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">Tautan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Youtube</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mitra Kerja</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                {{-- @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @else --}}
                <li class="nav-item">
                    <a href="/login" class="nav-link "><i
                            class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                {{-- @endauth --}}
            </ul>

        </div>
    </div>
</nav>
