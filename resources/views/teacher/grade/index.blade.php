@extends('staff.master_teacher')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
     Data Nilai | SIAM Al-Mu'min
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <div class="mb-5 position-relative">
                <h4 class="card-title mb-0"> Data Nilai</h4>

                @if ($selectedSchedule)
                    <a href="{{ route('teacher.grades.create', [
                        'semester_id' => $semesterId,
                        'class_id' => $selectedSchedule->classes->cls_id,
                        'subject_id' => $selectedSchedule->subject->sbj_id
                    ]) }}" class="btn btn-primary position-absolute top-0 end-0">
                        Input Nilai
                    </a>
                @endif
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
                    {{-- <label for="schedule_id" class="form-label">Jadwal Mengajar</label> --}}
                    <select name="schedule_id" id="schedule_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Pilih Jadwal --</option>
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->sch_id }}" {{ $scheduleId == $schedule->sch_id ? 'selected' : '' }}>
                                Kelas {{ $schedule->classes->cls_level }} {{ $schedule->classes->cls_number }} - {{ $schedule->subject->sbj_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>

            {{-- TABLE --}}
            {{-- @if ($selectedSchedule)
             <div class="mb-3">
                <strong>Kelas:</strong> {{ $selectedSchedule->classes->cls_level }} {{ $selectedSchedule->classes->cls_number }} |
                <strong>Mata Pelajaran:</strong> {{ $selectedSchedule->subject->sbj_name }}
            </div> --}}
            <div class="table-responsive">
                <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                      <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Nilai Praktik</th>
                                <th>Nilai Sikap</th>
                                <th>Rata-rata</th>
                                <th>Predikat</th>
                                {{-- <th>Predikat</th>
                                <th>Lulus</th> --}}
                            </tr>
                        </thead>
                      <tbody>
                            @forelse ($students as $i => $student)
                                @php
                                    $grade = $grades->firstWhere('grd_student_id', $student->std_id);
                                @endphp
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $grade->student->user->name ?? '-'  }}</td>
                                    <td>{{ $grade->grd_knowledge ?? '-' }}</td>
                                    <td>{{ $grade->grd_practice ?? '-' }}</td>
                                    <td>{{ $grade->grd_attitude ?? '-' }}</td>
                                    <td>{{ $grade->grd_average ?? '-' }}</td>
                                    <td>{{ $grade->grd_predicate ?? '-' }}</td>
                                    {{-- <td>{!! isset($grade->grd_passed) ? ($grade->grd_passed ? '✅' : '❌') : '-' !!}</td> --}}
                                </tr>
                            @empty
                                {{-- <tr>
                                    <td colspan="8" class="text-center">Belum ada nilai untuk kelas ini.</td>
                                </tr> --}}
                            @endforelse
                        </tbody>
                    <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Nilai Pengetahuan</th>
                                <th>Nilai Praktik</th>
                                <th>Nilai Sikap</th>
                                <th>Rata-rata</th>
                                <th>Predikat</th>
                                {{-- <th>Aksi</th>
                                <th>Lulus</th> --}}
                            </tr>
                        </tfoot>
                </table>
            </div>
             {{-- @endif --}}
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
