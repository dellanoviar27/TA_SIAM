@extends('staff.master_teacher')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    Jadwal Mengajar | SIAM Al-Mu'min
@endsection

@section('content')
<div class="datatables">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Jadwal Mengajar</h4>

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

                @if (count($schedules))
                    <div class="table-responsive">
                        <table id="file_export" class="table table-bordered table-striped display nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schedules as $i => $item)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $item->sch_day }}</td>
                                    <td>{{ $item->classes->cls_level }} {{ $item->classes->cls_number }}</td>
                                    <td>{{ $item->subject->sbj_name }}</td>
                                    <td>{{ $item->sch_start_time }} - {{ $item->sch_end_time }}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        <tfoot>
                             <tr>
                                    <th>No</th>
                                    <th>Hari</th>
                                    <th>Kelas</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Jam</th>
                                </tr>
                        </tfoot>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info mt-3">
                       Tidak ada jadwal tersedia
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
