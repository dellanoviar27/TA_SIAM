@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | Pembagian Kelas
@endsection

@section('content')
<div class="datatables">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Pembagian Kelas Siswa</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Filter --}}
            <form method="GET">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label>Tahun Ajaran</label>
                        <select name="semester_id" class="form-control" onchange="this.form.submit()">
                            <option value="">Pilih Tahun Ajaran</option>
                            @foreach($semesters as $smt)
                                <option value="{{ $smt->smt_id }}" {{ $selectedSemester == $smt->smt_id ? 'selected' : '' }}>
                                    {{-- {{ $smt->smt_semester }}  --}}
                                    {{ $smt->smt_school_year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Kelas</label>
                        <select name="class_id" class="form-control" onchange="this.form.submit()">
                            <option value="">Pilih Kelas</option>
                            @foreach($classes as $cls)
                                <option value="{{ $cls->cls_id }}" {{ $selectedClass == $cls->cls_id ? 'selected' : '' }}>
                                    {{ $cls->cls_level }} {{ $cls->cls_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            {{-- Form Tambah ke Kelas --}}
            @if($selectedSemester && $selectedClass)
                <form method="POST" action="{{ route('class-student.store') }}">
                    @csrf
                    <input type="hidden" name="semester_id" value="{{ $selectedSemester }}">
                    <input type="hidden" name="class_id" value="{{ $selectedClass }}">

                    <h5>Pilih Siswa yang Belum Masuk Kelas</h5>
                    <div class="mb-3">
                        @if($students->count())
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="checkAll">
                                <label class="form-check-label fw-bold">Pilih Semua</label>
                            </div>
                            <div class="row">
                                @foreach($students as $student)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="student_ids[]" value="{{ $student->std_id }}">
                                            <label class="form-check-label">{{ $student->user->name ?? '-'  }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Tambahkan ke Kelas</button>
                        @else
                            <p class="text-muted">Semua siswa sudah dibagikan ke kelas untuk semester ini.</p>
                        @endif
                    </div>
                </form>

                {{-- Form Kenaikan Kelas --}}
                {{-- <hr>
                <h5>Kenaikan Kelas</h5>
                <form method="POST" action="{{ route('class-student.promote') }}">
                    @csrf
                    <input type="hidden" name="old_semester_id" value="{{ $selectedSemester }}">
                    <input type="hidden" name="old_class_id" value="{{ $selectedClass }}">

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label>Pindah Tahun Ajaran</label>
                            <select name="new_semester_id" class="form-control" required>
                                <option value="">Pilih Tahun Ajaran</option>
                                @foreach($semesters as $s)
                                    @if($s->smt_id != $selectedSemester)
                                        <option value="{{ $s->smt_id }}">{{ $s->smt_semester }} {{ $s->smt_school_year }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Naik ke Kelas</label>
                            <select name="new_class_id" class="form-control" required>
                                <option value="">Pilih Kelas Baru</option>
                                @foreach($classes as $c)
                                    <option value="{{ $c->cls_id }}">{{ $c->cls_level }} {{ $c->cls_number }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Naikkan Seluruh Siswa</button>
                </form> --}}

                {{-- Tabel Siswa di Kelas --}}
                <hr>
                <h5>Daftar Siswa di Kelas Ini</h5>
                <div class="table-responsive">
                    <table class="table w-100 table-bordered" id="file_export">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($studentsInClass as $i => $s)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $s->student->user->name ?? '-' }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('class-student.destroy', $s->cst_id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus siswa dari kelas?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">Belum ada siswa dalam kelas ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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

    <script>
        document.getElementById('checkAll')?.addEventListener('change', function (e) {
            document.querySelectorAll('input[name="student_ids[]"]').forEach(cb => cb.checked = e.target.checked);
        });
    </script>
@endpush
