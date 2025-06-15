@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | Detail Calon Siswa
@endsection

@section('content')

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
      <div class="row align-items-center">
        <div class="col-9">
          <h4 class="fw-semibold mb-8">Detail Calon Siswa</h4>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a class="text-muted text-decoration-none" href="../main/index.html"></a>
              </li>
           
            </ol>
          </nav>
        </div>
        
      </div>
    </div>
  </div>
  <div class="shop-detail">
    <div class="card shadow-none border">
      <div class="card-body p-4">
        <div class="row">
          <div class="col-lg-6">
            <div id="sync1" class="owl-carousel owl-theme">
              <div class="item rounded-4 overflow-hidden">
                <img src="{{ asset('storage/'.$student->std_pictures)}}" alt="modernize-img" class="img-fluid">
              </div>
              
            </div>
          </div>

          <div class="col-lg-6">
            <div class="shop-content">
              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>NIK</h4>
              <h6 class="mb-0 fs-4">{{$student->std_nik}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0"> 
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Nama</h4>
              <h6 class="mb-0 fs-4">{{$student->std_name}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Jenis Kelamin</h4>
              <h6 class="mb-0 fs-4">{{$student->std_gender}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Tempat Lahir</h4>
              <h6 class="mb-0 fs-4">{{$student->std_birth_place}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Tanggal Lahir</h4>
              <h6 class="mb-0 fs-4">{{$student->std_birth_date}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Anak Ke</h4>
              <h6 class="mb-0 fs-4">{{$student->std_child_to}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Jumlah Saudara</h4>
              <h6 class="mb-0 fs-4">{{$student->std_number_of_siblings}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Tanggal Masuk</h4>
              <h6 class="mb-0 fs-4">{{$student->std_date_registration}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Nama Sekolah</h4>
              <h6 class="mb-0 fs-4">{{$student->std_school}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Kelas</h4>
              <h6 class="mb-0 fs-4">{{$student->classes->cls_name ?? '-'}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>NISN</h4>
              <h6 class="mb-0 fs-4">{{$student->std_nisn}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Nama Ayah</h4>
              <h6 class="mb-0 fs-4">{{$parent->prt_father}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>status Ayah</h4>
              <h6 class="mb-0 fs-4">{{$parent->prt_status_father}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>

              <div class="d-flex align-items-center gap-2 mb-2">
                <span class="badge text-bg-success fs-2 fw-semibold"></span>
                <span class="fs-2"></span>
              </div>
              <h4>Alamat Ayah</h4>
              <h6 class="mb-0 fs-4">{{$parent->prt_address_father}}</h6>
              <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
                <ul class="list-unstyled d-flex align-items-center mb-0">
              </div>    
            

          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
          </div>
          <h4>Pekerjaan Ayah</h4>
          <h6 class="mb-0 fs-4">{{$parent->prt_job_father}}</h6>
          <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
            <ul class="list-unstyled d-flex align-items-center mb-0">
          </div>

          <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
          </div>
          <h4>Penghasilan Ayah</h4>
          <h6 class="mb-0 fs-4">{{$parent->prt_income_father}}</h6>
          <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
            <ul class="list-unstyled d-flex align-items-center mb-0">
          </div>    
       

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Nama Ibu</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_mother}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>
         
         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Status Ibu</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_status_mother}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Alamat Ibu</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_address_mother}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Pekerjaan Ibu</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_job_mother}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Penghasilan Ibu</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_income_mother}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Nama Wali</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_guardian}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Alamat Wali</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_address_guardian}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Pekerjaan Wali</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_job_guardian}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>Penghasilan Wali</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_income_guardian}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>

         <div class="d-flex align-items-center gap-2 mb-2">
            <span class="badge text-bg-success fs-2 fw-semibold"></span>
            <span class="fs-2"></span>
         </div>
         <h4>No. HP Orangtua</h4>
         <h6 class="mb-0 fs-4">{{$parent->prt_parent_phone}}</h6>
         <div class="d-flex align-items-center gap-8 pb-4 border-bottom">
           <ul class="list-unstyled d-flex align-items-center mb-0">
         </div>
         
         </div>
    </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script src="{{asset('assets/js/datatable/datatable-advanced.init.js')}}"></script>
@endpush