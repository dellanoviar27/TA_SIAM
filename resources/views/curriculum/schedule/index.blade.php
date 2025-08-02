@extends('staff.master_curriculum')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    Daftar Jadwal Pelajaran | SIAM Al-Mu'min
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <div class="mb-5 position-relative">
                <h4 class="card-title mb-0">Daftar Jadwal Pelajaran</h4>
                <a href="/curriculum/schedule/create" class="btn btn-primary position-absolute top-0 end-0">Tambah Jadwal Pelajaran</a>
            </div>

            {{-- FILTER --}}
            <form method="GET" class="row g-3 mb-3">
                <div class="col-md-4">
                    <select name="semester_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Pilih Semester</option>
                        @foreach ($semesters as $semester)
                            <option value="{{ $semester->smt_id }}" {{ request('semester_id') == $semester->smt_id ? 'selected' : '' }}>
                                {{ $semester->smt_school_year }} | {{ $semester->smt_semester }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="class_id" class="form-select" onchange="this.form.submit()">
                        <option value="">Pilih Kelas</option>
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
                            <th width="5%">No</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                            <th>Semester</th>
                            <th>Tampilkan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule as $no => $Schedule)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $Schedule->sch_day }}</td>
                            <td>{{ $Schedule->classes->cls_level }} {{ $Schedule->classes->cls_number }}</td>
                            <td>{{ $Schedule->subject->sbj_name }}</td>
                            <td>{{ $Schedule->teacher->user->name ?? '-' }}</td>
                            <td>{{ $Schedule->sch_start_time }} - {{ $Schedule->sch_end_time }}</td>
                            <td>{{ $Schedule->semester->smt_semester }}</td>
                            <td>
                                @if ($Schedule->sch_is_visible)
                                    {{-- <span class="badge bg-success">✔️</span> --}}

                                    <span class="badge bg-success">Public</span>
                                @else
                                    {{-- <span class="badge bg-secondary">❌</span> --}}
                                    
                                    <span class="badge bg-secondary">Privat</span>
                                @endif
                            </td>
                            <td>
                                <a href="/curriculum/schedule/{{ $Schedule->sch_id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/curriculum/schedule/{{ $Schedule->sch_id }}/destroy" class="btn btn-sm btn-danger" data-confirm-delete="true">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                            <th>Jam</th>
                            <th>Semester</th>
                            <th>Tampilkan</th>
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
