@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SiSordu | Verifikasi Pendaftaran Siswa Baru
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="mb-5 position-relative">
                    <h4 class="card-title mb-0">Daftar Calon Siswa Baru</h4>
                    <a href="/staff/approve_student/create" class="btn btn-primary position-absolute top-0 end-0">Tambah Kelas</a>
                </div>
                <p class="card-subtitle mb-3">
                    
                </p>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <!-- start row -->
                            {{-- <tr>
                                <th width="10%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status Pendaftaran<th>
                                <th>Aksi</th>
                            </tr> --}}
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            @foreach ($student as $no=>$student)
                            <div class="card my-2 p-3">
                                <p><strong>Name:</strong> {{ $student->name }}</p>
                                <form method="POST" action="{{ route('students.approve', $student->id) }}" class="d-inline">
                                    @csrf
                                    <button class="btn btn-success btn-sm">Approve</button>
                                </form>
                    
                                <form method="POST" action="{{ route('students.reject', $student->id) }}" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                            @endforeach
                            <!-- end row -->
                            
                        </tbody>
                        <tfoot>
                            <!-- start row -->
                            

                            {{-- <tr>
                                <th width="10%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status Pendaftaran<th>
                                <th>Aksi</th>
                            </tr> --}}
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