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
                </div>

                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approve_student as $no => $student)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $student->std_name }}</td>
                                    <td>{{ $student->std_nisn }}</td>
                                    <td>{{ $student->std_school }}</td>
                                    <td>{{ $student->classes->cls_level ?? '-' }}</td>
                                    <td>{{ ucfirst($student->std_status) }}</td>
                                    <td>
                                        <a href="/staff/student/{{$student->std_id}}/detail" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('approve_student.edit', $student->std_id) }}" class="btn btn-warning btn-sm">Verifikasi</a>
                                        <form action="{{ route('approve_student.destroy', $student->std_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Asal Sekolah</th>
                                <th>Kelas Sekolah Formal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
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
