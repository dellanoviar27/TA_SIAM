<aside class="left-sidebar with-vertical">
      <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./main/index.html" class="text-nowrap logo-img">
            <img src="{{asset('assets/images/logos/dark-logo7.png')}}" class="dark-logo" alt="Logo-Dark" />
            <img src="./assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" />
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
              <a class="sidebar-link" href="/student//dashboard" id="get-url" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
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
              <a class="sidebar-link" href="/student/Ppdb_Student/create" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Data Diri</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="/student/Ppdb_Student/create_parent" aria-expanded="false">
                <span>
                  <i class="ti ti-calendar"></i>
                </span>
                <span class="hide-menu">Data Orangtua</span>
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
              <a class="sidebar-link" href="./main/page-pricing.html" aria-expanded="false">
                <span>
                  <i class="ti ti-currency-dollar"></i>
                </span>
                <span class="hide-menu">Jadwal Pelajaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./main/page-faq.html" aria-expanded="false">
                <span>
                  <i class="ti ti-help"></i>
                </span>
                <span class="hide-menu">Nilai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./main/page-account-settings.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-circle"></i>
                </span>
                <span class="hide-menu">Raport</span>
              </a>
            </li>
            
            {{-- <li class="sidebar-item">
              <a class="sidebar-link" href="./landingpage/index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-app-window"></i>
                </span>
                <span class="hide-menu">Landing Page</span>
              </a>
            </li> --}}
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                <span class="d-flex">
                  <i class="ti ti-layout"></i>
                </span>
                <span class="hide-menu">Widgets</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="./main/widgets-cards.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Cards</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-banners.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Banner</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-charts.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Charts</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-feeds.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Feed Widgets</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-apps.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Apps Widgets</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="./main/widgets-data.html" class="sidebar-link">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <i class="ti ti-circle"></i>
                    </div>
                    <span class="hide-menu">Data Widgets</span>
                  </a>
                </li>
              </ul>
            </li>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
      </div>
    </aside>