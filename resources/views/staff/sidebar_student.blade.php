<aside class="left-sidebar with-vertical">
  <div>
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="/student/dashboard" class="text-nowrap logo-img">
        <img src="{{ asset('assets/images/logos/dark-logo7.png') }}" class="dark-logo" alt="Logo-Dark" />
        <img src="{{ asset('assets/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
      </a>
      <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">

        @php
            use App\Models\Student;
            $student = \App\Models\Student::where('std_user_id', auth()->id())->first();
        @endphp

          <!-- Home Section -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
          {{-- <a class="sidebar-link" href="/student/dashboard" id="get-url" aria-expanded="false"> --}}
          <a class="sidebar-link" href="/student/dashboard" aria-expanded="false">
            <span><i class="ti ti-aperture"></i></span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

         {{-- STATUS BELUM MENGISI DATA (status null) --}}
       @if(!$student || $student->std_status === 'pending')
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">PENDAFTARAN</span>
          </li>
          {{-- <li class="sidebar-item">
            <a class="sidebar-link" href="/student/Ppdb_Student/list" aria-expanded="false">
              <span><i class="ti ti-user"></i></span>
              <span class="hide-menu">Data Siswa</span>
            </a>
          </li> --}}
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/Ppdb_Student/create" aria-expanded="false">
              <span><i class="ti ti-user"></i></span>
              <span class="hide-menu">Data Siswa</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/Ppdb_Student/create_parent" aria-expanded="false">
              <span><i class="ti ti-users"></i></span>
              <span class="hide-menu">Data Orangtua</span>
            </a>
          </li>

          @if($student)
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('student.uploadForm', $student->std_id) }}" aria-expanded="false">
                <span><i class="ti ti-cloud-upload"></i></span>
                <span class="hide-menu">Upload Berkas</span>
              </a>
            </li>
          @endif
        @endif

        {{-- STATUS SUDAH ISI LENGKAP & MASIH PENDING --}}
        @if($student && $student->std_status === 'pending' && $student->parent && $student->std_kk_photo)
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/Ppdb_Student/confirmation" aria-expanded="false">
              {{-- <span><i class="ti ti-check"></i></span>
              <span class="hide-menu">Konfirmasi ke Madrasah</span> --}}
            </a>
          </li>
        @endif

       

        {{-- Jika SUDAH diverifikasi --}}
        @if($student && $student->std_status === 'verified')

          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">AKADEMIK</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/schedule" aria-expanded="false">
              <span><i class="ti ti-calendar"></i></span>
              <span class="hide-menu">Jadwal Pelajaran</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/grades" aria-expanded="false">
              <span><i class="ti ti-clipboard-check"></i></span>
              <span class="hide-menu">Nilai</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="/student/reports" aria-expanded="false">
              <span><i class="ti ti-file-text"></i></span>
              <span class="hide-menu">Rapor</span>
            </a>
          </li>
        @endif

      </ul>
    </nav>
  </div>
</aside>
