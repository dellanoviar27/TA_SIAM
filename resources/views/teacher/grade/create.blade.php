@extends('staff.master_teacher')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endpush

@section('title', 'Input Nilai Siswa')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">Input Nilai Siswa</h4>

        <div class="mb-3">
            <strong>Kelas:</strong> {{ $class->cls_level }} {{ $class->cls_number }}<br>
            <strong>Mata Pelajaran:</strong> {{ $subject->sbj_name }}<br>
            <strong>Semester:</strong> {{ $semester->smt_school_year }} | {{ $semester->smt_semester }}
        </div>

        <form action="{{ route('teacher.grades.store') }}" method="POST">
            @csrf
            <input type="hidden" name="class_id" value="{{ $class->cls_id }}">
            <input type="hidden" name="subject_id" value="{{ $subject->sbj_id }}">
            <input type="hidden" name="semester_id" value="{{ $semester->smt_id }}">

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Nilai Pengetahuan</th>
                            <th>Nilai Praktik</th>
                            <th>Nilai Sikap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $i => $student)
                            @php
                                $grade = $grades->firstWhere('grd_student_id', $student->std_id);
                            @endphp
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $student->user->name ?? '-' }}</td>

                                <td>
                                    <input type="number" name="grades[{{ $student->std_id }}][knowledge]"
                                        value="{{ $grade->grd_knowledge ?? '' }}" class="form-control"
                                        min="0" max="100" step="0.1" required>
                                </td>
                                <td>
                                    <input type="number" name="grades[{{ $student->std_id }}][practice]"
                                        value="{{ $grade->grd_practice ?? '' }}" class="form-control"
                                        min="0" max="100" step="0.1" required>
                                </td>
                                <td>
                                    <input type="number" name="grades[{{ $student->std_id }}][attitude]"
                                        value="{{ $grade->grd_attitude ?? '' }}" class="form-control"
                                        min="0" max="100" step="0.1" required>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-success">💾 Simpan Nilai</button>
            </div>
        </form>
    </div>
</div>
@endsection
