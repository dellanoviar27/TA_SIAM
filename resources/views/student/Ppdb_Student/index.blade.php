@extends('staff.master_student')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | PPDB
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    <h4 class="card-title mb-0">Daftar PPDB</h4>
                    {{-- <a href="/student/ppdb/create" class="btn btn-primary position-absolute top-0 end-0">Tambah Kelas</a> --}}
                </div>
                <p class="card-subtitle mb-3">
                    
                </p>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Anak Ke</th>
                                <th>Jumlah Saudara</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Sekolah</th>
                                <th>Kelas</th>
                                <th>NISN</th>
                                <th>Nama Ayah</th>
                                <th>Status Ayah</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Nama Ibu</th>
                                <th>Status Ibu</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Nama Wali</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>No. HP Orang tua</th>
                                <th>Foto Diri</th>
                                <th>Aksi</th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($Ppdb_Student as $no=>$Ppdb_Student)
                            <tr> 
                                <td>{{$no+1}}</td>
                                <td>{{$Ppdb_Student->std_nik}}</td>
                                <td>{{$Ppdb_Student->std_name}}</td>
                                <td>{{$Ppdb_Student->std_gender}}</td>
                                <td>{{$Ppdb_Student->std_place_of_birth}}</td>
                                <td>{{$Ppdb_Student->std_date_of_birth}}</td>
                                <td>{{$Ppdb_Student->std_child_to}}</td>
                                <td>{{$Ppdb_Student->std_number_of_siblings}}</td>
                                <td>{{$Ppdb_Student->std_address}}</td>
                                <td>{{$Ppdb_Student->std_date_registration}}</td>
                                <td>{{$Ppdb_Student->std_school}}</td>
                                <td>{{$Ppdb_Student->std_class_id}}</td>
                                <td>{{$Ppdb_Student->std_nisn}}</td>
                                <td>{{$Ppdb_Student->prt_father}}</td>
                                <td>{{$Ppdb_Student->prt_status_father}}</td>
                                <td>{{$Ppdb_Student->prt_address_father}}</td>
                                <td>{{$Ppdb_Student->prt_job_father}}</td>
                                <td>{{$Ppdb_Student->prt_income_father}}</td>
                                <td>{{$Ppdb_Student->prt_mother}}</td>
                                <td>{{$Ppdb_Student->prt_status_mother}}</td>
                                <td>{{$Ppdb_Student->prt_address_mother}}</td>
                                <td>{{$Ppdb_Student->prt_job_mother}}</td>
                                <td>{{$Ppdb_Student->prt_income_mother}}</td>
                                <td>{{$Ppdb_Student->prt_guardian}}</td>
                                <td>{{$Ppdb_Student->prt_address_guardian}}</td>
                                <td>{{$Ppdb_Student->prt_job_guardian}}</td>
                                <td>{{$Ppdb_Student->prt_income_guardian}}</td>
                                <td>{{$Ppdb_Student->prt_parent_phone}}</td>
                                <td>{{$Ppdb_Student->std_pictures}}</td>
                                <td>
                                     <a href="/student/Ppdb_Student/{{$Ppdb_Student->std_id}}/edit" class="btn btn-primary">Edit</a>
                                     <a href="/student/Ppdb_Student/{{$Ppdb_Student->std_id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Delete</a>

                                </td>


                                
                            </tr>
                            @endforeach
                            <!-- end row -->
                            
                        </tbody>
                        <tfoot>
                            <!-- start row -->
                            

                            <tr>
                                <th width="10%">No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Anak Ke</th>
                                <th>Jumlah Saudara</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Nama Sekolah</th>
                                <th>Kelas</th>
                                <th>NISN</th>
                                <th>Nama Ayah</th>
                                <th>Status Ayah</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Nama Ibu</th>
                                <th>Status Ibu</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Nama Wali</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>No. HP Orang tua</th>
                                <th>Foto Diri</th>
                                <th>Aksi</th>
                            </tr>
                            <!-- end row -->
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection



@push('script')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
@endpush