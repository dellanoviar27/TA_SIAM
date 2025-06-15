<aside class="left-sidebar with-vertical">
      <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./main/index.html" class="text-nowrap logo-img">
            <img src="{{asset('assets/images/logos/dark-logo7.png')}}" class="dark-logo" alt="Logo-Dark" />
            <img src="{{asset('ssets/images/logos/light-logo.svg')}}" class="light-logo" alt="Logo-light" />
          </a>
          <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
          </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ---------------------------------- -->
            <!-- Home -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/dashboard" id="get-url" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dasboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/information" aria-expanded="false">
                <span>
                  <i class="ti ti-bell"></i>
                </span>
                <span class="hide-menu">Pengumuman</span>
              </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- PPDB -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">PPDB</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/approve_student" aria-expanded="false">
                <span>
                  <i class="ti ti-check"></i>
                </span>
                <span class="hide-menu">Verifikasi Siswa Baru</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./main/app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-reload"></i>
                </span>
                <span class="hide-menu">Daftar Ulang</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/semester" aria-expanded="false">
                <span>
                  <i class="ti ti-archive"></i>
                </span>
                <span class="hide-menu">Semester</span>
              </a>
            </li>

             <!-- ---------------------------------- -->
            <!-- AKADEMIK -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AKADEMIK</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/classes" aria-expanded="false">
                <span>
                  <i class="ti ti-layout"></i>
                </span>
                <span class="hide-menu">Kelas</span>
              </a>
            </li>
            {{-- <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-layout"></i>
                </span>
                <span class="hide-menu">Kelas</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="./main/widgets-cards.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Input Kelas</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-banners.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Kelas Ajar</span>
                  </a>
                </li> --}}

            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/subject" aria-expanded="false">
                <span>
                  <i class="ti ti-book"></i>
                </span>
                <span class="hide-menu">Mata Pelajaran</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/homeroom_teacher" aria-expanded="false">
                <span>
                  <i class="ti ti-home"></i>
                </span>
                <span class="hide-menu">Wali Kelas</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/schedule" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <spasn class="hide-menu">Jadwal Pelajaran</spasn>
              </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- DATA MASTER-->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">DATA MASTER</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/student" aria-expanded="false">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Data Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/teacher" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Guru</span>
              </a>
            </li>
             <li class="sidebar-item">
              <a class="sidebar-link" href="/staff/management" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Staf</span>
              </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- LAPORAN-->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">LAPORAN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./main/app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file"></i>
                </span>
                <span class="hide-menu">Laporan Nilai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./main/app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-receipt"></i>
                </span>
                <span class="hide-menu">Rekap Absensi</span>
              </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- SETTING-->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">SETTING</span>
            </li>
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="./main/app-calendar.html" aria-expanded="false">
                <span>
                  <i class="ti ti-settings"></i>
                </span>
                <span class="hide-menu">Pengaturan Akun</span>
              </a>
            </li> --}}

            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-layout"></i>
                </span>
                <span class="hide-menu">Pengaturan Akun</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="/staff/staff_account" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Staff</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-banners.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Guru</span>
                  </a>
                </li>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
      </div>
    </aside>