<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Company Profile</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ (Request::is('admin/visi-misi*') || Request::is('admin/unit-kerja*') || Request::is('admin/pejabat-struktural*') || Request::is('admin/denah-kantor*') || Request::is('admin/struktur-organisasi*')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/visi-misi*') ? 'active' : '' }}" href="/admin/visi-misi">Visi & Misi</a>
                <a class="collapse-item" href="#">Tugas & Fungsi</a>
                <a class="collapse-item" href="#">Kedudukan & Alamat</a>
                <a class="collapse-item {{ Request::is('admin/struktur-organisasi*') ? 'active' : '' }}" href="/admin/struktur-organisasi">Struktur Organisasi</a>
                <a class="collapse-item {{ Request::is('admin/denah-kantor*') ? 'active' : '' }}" href="/admin/denah-kantor">Denah Kantor</a>
                <a class="collapse-item {{ Request::is('admin/pejabat-struktural*') ? 'active' : '' }}" href="/admin/pejabat-struktural">Pejabat Struktural</a>
                <a class="collapse-item {{ Request::is('admin/unit-kerja*') ? 'active' : '' }}" href="/admin/unit-kerja">Unit Kerja</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ (Request::is('admin/posts*') || Request::is('admin/galeri*')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-tasks"></i>
            <span>Program Kegiatan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/posts*') ? 'active' : '' }}" href="/admin/posts">Berita Kegiatan</a>
                <a class="collapse-item {{ Request::is('admin/galeri*') ? 'active' : '' }}" href="/admin/galeri">Galeri</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
            aria-expanded="true" aria-controls="collapseThree">
            <i class="fa fa-users"></i>
            <span>Masyarakat</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Pengaduan Masyarakat</a>
                <a class="collapse-item" href="#">Survey Masyarakat</a>
            </div>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fa fa-camera"></i>
            <span>Dokumen & Publikasi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
            aria-expanded="true" aria-controls="collapseFour">
            <i class="fa fa-link"></i>
            <span>Tautan</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Youtube</a>
            </div>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fa fa-handshake"></i>
            <span>Mitra Kerja</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block mb-5">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
