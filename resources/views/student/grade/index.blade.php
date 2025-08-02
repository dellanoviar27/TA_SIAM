@extends('staff.master_student')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    Nilai | SIAM Al-Mu'min
@endsection

@section('content')
<div class="datatables">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Nilai</h4>

                <form method="GET" class="row mb-4">
                    <div class="col-md-4">
                        <select name="semester_id" class="form-select" onchange="this.form.submit()">
                            @foreach ($semesters as $smt)
                                <option value="{{ $smt->smt_id }}" {{ $smt->smt_id == $semesterId ? 'selected' : '' }}>
                                    {{ $smt->smt_school_year }} | {{ $smt->smt_semester }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if (count($grades))
                    <div class="table-responsive">
                        <table id="file_export" class="table table-bordered table-striped display nowrap w-100">
                             <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Semester</th> --}}
                                    <th>Mata Pelajaran</th>
                                    <th>Pengetahuan</th>
                                    <th>Praktik</th>
                                    <th>Sikap</th>
                                    <th>Rata-rata</th>
                                    <th>Predikat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $no => $grade)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        {{-- <td>{{ $grade->semester->smt_name ?? '-' }} ({{ $grade->semester->smt_year ?? '' }})</td> --}}
                                        <td>{{ $grade->subject->sbj_name ?? '-' }}</td>
                                        <td>{{ $grade->grd_knowledge }}</td>
                                        <td>{{ $grade->grd_practice }}</td>
                                        <td>{{ $grade->grd_attitude }}</td>
                                        <td>{{ number_format($grade->grd_average, 2) }}</td>
                                        <td>{{ $grade->grd_predicate }}</td>
                                        <td>{{ $grade->grd_passed ? 'Tuntas' : 'Tidak Tuntas' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                 <tr>
                                    <th>No</th>
                                    {{-- <th>Semester</th> --}}
                                    <th>Mata Pelajaran</th>
                                    <th>Pengetahuan</th>
                                    <th>Praktik</th>
                                    <th>Sikap</th>
                                    <th>Rata-rata</th>
                                    <th>Predikat</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mt-3">
                        Nilai belum tersedia untuk semester ini atau belum dipublikasi oleh staff.
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('script')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script> --}}
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#file_export').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                responsive: true
            });
        });
    </script>
@endpush
