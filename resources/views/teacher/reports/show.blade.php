@extends('staff.master_teacher')

@section('title', 'Detail Rapor Siswa')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-1">Rapor Siswa: {{ $student->user->name }}</h4>
        <p class="mb-1"><strong>Kelas:</strong> {{ $class->cls_level }} {{ $class->cls_number }}</p>
        <p class="mb-2"><strong>Semester:</strong> {{ $semester->smt_school_year }} | {{ $semester->smt_semester }}</p>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Pengetahuan</th>
                    <th>Praktik</th>
                    <th>Sikap</th>
                    <th>Rata-rata</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($grades as $grade)
                    <tr>
                        <td>{{ $grade->subject->sbj_name ?? '-' }}</td>
                        <td>{{ $grade->grd_knowledge ?? '-' }}</td>
                        <td>{{ $grade->grd_practice ?? '-' }}</td>
                        <td>{{ $grade->grd_attitude ?? '-' }}</td>
                        <td>{{ $grade->grd_average ?? '-' }}</td>
                        <td>{{ $grade->grd_predicate ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada nilai untuk siswa ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Tabel Kehadiran Siswa --}}
        <table class="table table-bordered w-50 mt-4">
            <thead class="table-light text-center">
                <tr>
                    <th colspan="3">Rekap Kehadiran</th>
                </tr>
                <tr>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Tanpa Kehadiran</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>{{ $attendance->att_sick ?? 0 }}</td>
                    <td>{{ $attendance->att_permission ?? 0 }}</td>
                    <td>{{ $attendance->att_absence ?? 0 }}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-3 d-flex justify-content-between">
            <a href="{{ route('teacher.reports.index', ['semester_id' => $semesterId, 'class_id' => $class->cls_id]) }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('teacher.report.print', [$student->std_id, $semesterId]) }}" target="_blank" class="btn btn-success">
                Cetak Rapor
            </a>
        </div>
    </div>
</div>
@endsection
