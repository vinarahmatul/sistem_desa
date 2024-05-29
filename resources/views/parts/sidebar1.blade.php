@if (auth()->user()->level == 'admin')
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img class="image" border="0" src="../images/logodinas.png" width="50px" 
                style="padding: 0px; color:#ffff;">
              </span>
              <span class="demo menu-text fw-bolder ms-2" style="font-size:large; color:#029765;">Desa Labanasem</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"> 
              <i class="bx bx-chevron-left bx-sm align-middle"></i> 
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="/Dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="/Profile-Desa" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Data Kepegawaian">Profile Desa</div>
              </a>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-book-alt"></i>
                <div data-i18n="Data Kependudukan">Data Kependudukan</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="/Berdasarkan-Usia" class="menu-link">
                    <div data-i18n="Berdasarkan Usia">Berdasarkan Usia</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/Berdasarkan-Pekerjaan" class="menu-link">
                    <div data-i18n="Berdasarkan Pekerjaan">Berdasarkan Pekerjaan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/Berdasarkan-Agama" class="menu-link">
                    <div data-i18n="Berdasarkan Agama">Berdasarkan Agama</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/Berdasarkan-Pendidikan" class="menu-link">
                    <div data-i18n="Berdasarkan Pendidikan">Berdasarkan Pendidikan</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="/Berdasarkan-Kesehatan" class="menu-link">
                    <div data-i18n="Berdasarkan Kesehatan">Berdasarkan Kesehatan</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="/Data-Pegawai" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div data-i18n="Data Kepegawaian">Data Kepegawaian</div>
              </a>
            </li>
            
            <li class="menu-item">
              <a href="/Agenda-Kegiatan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-calendar-event"></i>
                <div data-i18n="Agenda Kegiatan">Agenda Kegiatan</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="/Berita-Acara" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-news"></i>
                <div data-i18n="Berita Acara">Berita Acara</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="/Layanan-Masyarakat" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-receipt"></i>
                <div data-i18n="Pelayanan Masyarakat">Pelayanan Masyarakat</div>
              </a>
            </li>
          </ul>
        </aside>

        <script>
          // Mendapatkan URL saat ini
          var currentUrl = window.location.href;

          // Mengambil daftar elemen menu
          var menuItems = document.querySelectorAll('.menu-item');

          // Melakukan iterasi pada setiap elemen menu
          menuItems.forEach(function(item) {
              // Mendapatkan URL menu
              var menuUrl = item.querySelector('a').getAttribute('href');

              // Membandingkan URL menu dengan URL saat ini
              if (currentUrl.includes(menuUrl)) {
                  // Menambahkan kelas "active" pada menu yang sedang aktif
                  item.classList.add('active');
              }
          });
      </script>

        @endif