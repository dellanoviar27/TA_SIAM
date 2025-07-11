@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | Input Nilai Siswa
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <div class="mb-5 position-relative">
                <h4 class="card-title mb-0">Input Nilai Siswa</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- FILTER --}}
            <form method="GET" action="{{ route('teacher.grades.index') }}" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="semester_id" class="form-control" required>
                        <option value="">Pilih Semester</option>
                        @foreach($semesters as $smt)
                            <option value="{{ $smt->smt_id }}" {{ request('semester_id') == $smt->smt_id ? 'selected' : '' }}>
                                {{ $smt->smt_semester }} ({{ $smt->smt_school_year }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="class_id" class="form-control" required>
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $cls)
                            <option value="{{ $cls->cls_id }}" {{ request('class_id') == $cls->cls_id ? 'selected' : '' }}>
                                 {{ $cls->cls_level }} {{ $cls->cls_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="subject_id" class="form-control" required>
                        <option value="">Pilih Mapel</option>
                        @foreach($subjects as $sbj)
                            <option value="{{ $sbj->sbj_id }}" {{ request('subject_id') == $sbj->sbj_id ? 'selected' : '' }}>
                                {{ $sbj->sbj_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="teacher_id" class="form-control" required>
                        <option value="">Pilih Guru</option>
                        @foreach($teachers as $tch)
                            <option value="{{ $tch->tch_id }}" {{ request('teacher_id') == $tch->tch_id ? 'selected' : '' }}>
                                {{ $tch->tch_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Tampilkan</button>
                </div>
            </form>

            {{-- TABEL NILAI --}}
            @if($students->isNotEmpty())
            <form method="POST" action="{{ route('teacher.grades.store') }}">
                @csrf
                <input type="hidden" name="class_id" value="{{ request('class_id') }}">
                <input type="hidden" name="semester_id" value="{{ request('semester_id') }}">
                <input type="hidden" name="subject_id" value="{{ request('subject_id') }}">
                <input type="hidden" name="teacher_id" value="{{ request('teacher_id') }}">

                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <thead class="table-secondary">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Katabah</th>
                                <th>Kaifiyat</th>
                                <th>Adab</th>
                                <th>Predikat</th>
                                <th>Rata-rata</th>
                                <th>KKM</th>
                                <th>Status</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                                @php
                                    $grade = $grades[$student->std_id] ?? null;
                                    $katabah = $grade->grd_katabah ?? '';
                                    $kaifiyat = $grade->grd_kaifiyat ?? '';
                                    $adab = $grade->grd_adab ?? '';
                                    $predicate = $grade->grd_predicate ?? '';
                                    $avg = ($katabah && $kaifiyat && $adab) ? number_format(($katabah + $kaifiyat + $adab)/3, 2) : '-';
                                    $kkm = $subjects->firstWhere('sbj_id', request('subject_id'))->sbj_kkm ?? '-';
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $student->std_name }}</td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][katabah]" value="{{ $katabah }}" class="form-control"></td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][kaifiyat]" value="{{ $kaifiyat }}" class="form-control"></td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][adab]" value="{{ $adab }}" class="form-control"></td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][predicate]" value="{{ $predicate }}" class="form-control"></td>
                                    <td>{{ $avg }}</td>
                                    <td>{{ $kkm }}</td>
                                    <td>
                                        @if(is_numeric($avg) && $kkm != '-')
                                            @if($avg < $kkm)
                                                <span class="text-danger">Belum Tuntas</span>
                                            @else
                                                <span class="text-success">Tuntas</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][sick]" value="{{ $grade->grd_sick ?? '' }}" class="form-control"></td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][permission]" value="{{ $grade->grd_permission ?? '' }}" class="form-control"></td>
                                    <td><input type="text" name="grades[{{ $student->std_id }}][absence]" value="{{ $grade->grd_absence ?? '' }}" class="form-control"></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Katabah</th>
                                <th>Kaifiyat</th>
                                <th>Adab</th>
                                <th>Predikat</th>
                                <th>Rata-rata</th>
                                <th>KKM</th>
                                <th>Status</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alpa</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <button class="btn btn-success mt-3" type="submit">Simpan Nilai</button>
            </form>
            @endif

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
