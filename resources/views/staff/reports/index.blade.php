@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    Laporan Rapor Siswa | SIAM Al-Mu'min
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <div class="mb-5 position-relative">
                <h4 class="card-title mb-0">Laporan Rapor Siswa</h4>
            </div>

            {{-- FILTER --}}
            <form method="GET" class="row g-3 mb-3">
                <div class="col-md-4">
                    <select name="semester_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Pilih Semester</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->smt_id }}" {{ $semesterId == $semester->smt_id ? 'selected' : '' }}>
                                {{ $semester->smt_school_year }} | {{ $semester->smt_semester }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-6">
                    <select name="class_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->cls_id }}" {{ request('class_id') == $class->cls_id ? 'selected' : '' }}>
                                {{ $class->cls_level }} {{ $class->cls_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>

            {{-- TABLE --}}
            <div class="table-responsive">
                <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                       <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($raports as $no => $report)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $report['student']->user->name ?? '-' }}</td>
                                <td>{{ $report['classes']->cls_level ?? '' }} {{ $report['classes']->cls_number ?? '' }}</td>
                                <td>{{ $report['semester']->smt_semester ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('staff.report.print', [$report['student']->std_id, $report['semesterId']]) }}" target="_blank" class="btn btn-danger btn-sm">
                                        <i class="fas fa-print"></i> PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Semester</th>
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
    <script>
        $('#file_export').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            responsive: true
        });
    </script>
@endpush
