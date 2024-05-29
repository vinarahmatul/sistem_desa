<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto{{ Request::is('Beranda') ? ' active' : '' }}" href="/Beranda">Beranda</a></li>
        <li class="dropdown{{ Request::is('Tentang-Desa-Labanasem', 'Pegawai-Desa-Labanasem', 'Potensi-Desa-Labanasem') ? ' active' : '' }}">
            <a class="nav-link scrollto{{ Request::is('Tentang-Desa-Labanasem', 'Pegawai-Desa-Labanasem', 'Potensi-Desa-Labanasem') ? ' active' : '' }}" href="javascript:void(0)"><span>Tentang</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a class="{{ Request::is('Tentang-Desa-Labanasem') ? 'active' : '' }}" href="/Tentang-Desa-Labanasem">Profile Desa</a></li>
                <li><a class="{{ Request::is('Pegawai-Desa-Labanasem') ? 'active' : '' }}" href="/Pegawai-Desa-Labanasem">Data Kepegawaian</a></li>
                <li><a class="{{ Request::is('Potensi-Desa-Labanasem') ? 'active' : '' }}" href="/Potensi-Desa-Labanasem">Potensi Desa</a></li>
            </ul>
        </li>
        <li class="dropdown{{ Request::is('Agenda-Kegiatan-Desa-Labanasem', 'Berita-Acara-Desa-Labanasem') ? ' active' : '' }}">
            <a class="nav-link scrollto{{ Request::is('Agenda-Kegiatan-Desa-Labanasem', 'Berita-Acara-Desa-Labanasem') ? ' active' : '' }}" href="javascript:void(0)"><span>Kegiatan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a class="{{ Request::is('Agenda-Kegiatan-Desa-Labanasem') ? 'active' : '' }}" href="/Agenda-Kegiatan-Desa-Labanasem">Agenda Kegiatan</a></li>
                <li><a class="{{ Request::is('Berita-Acara-Desa-Labanasem') ? 'active' : '' }}" href="/Berita-Acara-Desa-Labanasem">Berita Acara</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto{{ Request::is('Pelayanan-Masyarakat-Desa-Labanasem') ? ' active' : '' }}" href="/Pelayanan-Masyarakat-Desa-Labanasem">Layanan Masyarakat</a></li>
        <li><a class="nav-link scrollto" href="#">UMKM</a></li>
        <li><a class="nav-link scrollto" href="/Login">Login</a></li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>
