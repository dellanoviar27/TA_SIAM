@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | Verifikasi Pendaftaran Siswa Baru
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    <h4 class="card-title mb-0">Daftar Calon Siswa Baru</h4>
                    {{-- <a href="/staff/approve_student/create" class="btn btn-primary position-absolute top-0 end-0">Tambah Kelas</a> --}}
                </div>
                <p class="card-subtitle mb-3">
                    
                </p>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th width="10%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status<th>
                                <th>Aksi<th>
                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($approve_student as $no=>$Ppdb_Student)
                            <tr> 
                                <td>{{$no+1}}</td>
                                <td>{{$Ppdb_Student->std_name}}</td>
                                <td>{{$Ppdb_Student->std_nisn}}</td>
                                <td>{{$Ppdb_Student->std_school}}</td>
                                <td>{{$Ppdb_Student->classes->cls_level}}</td>
                                <td>{{$Ppdb_Student->std_status}}</td>
                               
                                <td>
                                     <a href="/staff/approve_student/{{$Ppdb_Student->std_id}}/detail" class="btn btn-primary">Detail</a>
                                     <a href="/staff/approve_student/{{$Ppdb_Student->std_id}}/edit" class="btn btn-primary">Edit</a>
                                     <a href="/staff/approve_student/{{$Ppdb_Student->std_id}}/destroy" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                </td>


                                
                            </tr>
                            @endforeach
                            <!-- end row -->
                            
                        </tbody>
                        <tfoot>
                            <!-- start row -->
                            

                            <tr>
                                <th width="10%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status<th>
                                <th>Aksi<th>
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