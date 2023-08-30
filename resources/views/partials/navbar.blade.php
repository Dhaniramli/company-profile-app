<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="/">Company Profile Profile</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer {{  ($active === 'visi-misi' || $active === 'tugas-fungsi' || $active === 'kedudukan' || $active === 'struktur-organisasi' || $active === 'denah-kantor' || $active === 'pejabat-struktural' || $active === 'unit-kerja') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Profil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ $active === 'visi-misi' ? 'active' : '' }}"
                                href="/visi-misi">Visi & Misi</a></li>
                        <li><a class="dropdown-item {{ $active === 'tugas-fungsi' ? 'active' : '' }}"
                                href="/tugas-fungsi">Tugas & Fungsi</a></li>
                        <li><a class="dropdown-item {{ $active === 'kedudukan' ? 'active' : '' }}"
                                href="/kedudukan">Kedudukan & Alamat</a></li>
                        <li><a class="dropdown-item {{ $active === 'struktur-organisasi' ? 'active' : '' }}"
                                href="/struktur-organisasi">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item {{ $active === 'denah-kantor' ? 'active' : '' }}"
                                href="/denah-kantor">Denah Kantor</a></li>
                        <li><a class="dropdown-item {{ $active === 'pejabat-struktural' ? 'active' : '' }}"
                                href="/pejabat-struktural">Pejabat Struktural</a></li>
                        <li><a class="dropdown-item {{ $active === 'unit-kerja' ? 'active' : '' }}"
                                href="/unit-kerja">Unit Kerja</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer {{ ($active === 'news' || $active === 'galeri-kegiatan') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Program Kegiatan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ $active === 'news' ? 'active' : '' }}" href="/news">Berita
                                Kegiatan</a></li>
                        <li><a class="dropdown-item {{ $active === 'galeri-kegiatan' ? 'active' : '' }}"
                                href="/galeri-kegiatan">Galeri</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer {{ ($active === 'pengaduan' || $active === 'pengaduan2') ? 'active' : '' }}"
                        data-bs-toggle="dropdown">Masyarakat</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item {{ $active === 'pengaduan' ? 'active' : '' }}"
                                href="/pengaduan">Pengaduan Masyarakat</a></li>
                        <li><a class="dropdown-item {{ $active === 'pengaduan2' ? 'active' : '' }}"
                                href="/form-survey">Survey Masyarakat</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'sakip' ? 'active' : '' }}" href="/sakip">Dokumen & Publikasi</a>
                </li>
                <li class="nav-item dropdown cursor-pointer">
                    <a class="nav-link dropdown-toggle cursor-pointer" data-bs-toggle="dropdown">Tautan</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                                href="https://www.youtube.com/watch?v=wRxxUSAkGZ4&list=PLnrs9DcLyeJTG-_mjD68Gn0sC5hbzaU2T">Youtube</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'mitra-kerja' ? 'active' : '' }}" href="/mitra-kerja">Mitra
                        Kerja</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;"><i class="bi bi-box-arrow-right"></i>
                            Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                            class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
