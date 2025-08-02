@extends('staff.master_teacher')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('title', 'Input Kehadiran Siswa')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Input Kehadiran Siswa</h4>

        <div class="mb-3">
            <strong>Kelas:</strong> {{ $class->cls_level }} {{ $class->cls_number }}<br>
            <strong>Semester:</strong> {{ $semester->smt_school_year }} | {{ $semester->smt_semester }}
        </div>

        <form action="{{ route('teacher.attendance.store') }}" method="POST">
            @csrf
            <input type="hidden" name="class_id" value="{{ $class->cls_id }}">
            <input type="hidden" name="semester_id" value="{{ $semester->smt_id }}">

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Alpha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $i => $student)
                            @php
                                $attendance = $attendances->firstWhere('att_student_id', $student->std_id);
                            @endphp
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $student->user->name ?? '-' }}</td>
                                <td>
                                    <input type="number" name="attendances[{{ $student->std_id }}][sick]" 
                                           value="{{ $attendance->att_sick ?? 0 }}" class="form-control" />
                                </td>
                                <td>
                                    <input type="number" name="attendances[{{ $student->std_id }}][permission]" 
                                           value="{{ $attendance->att_permission ?? 0 }}" class="form-control" />
                                </td>
                                <td>
                                    <input type="number" name="attendances[{{ $student->std_id }}][absence]" 
                                           value="{{ $attendance->att_absence ?? 0 }}" class="form-control" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">Simpan Kehadiran</button>
            </div>
        </form>
    </div>
</div>
@endsection
