@extends('staff.master_teacher')

@section('content')
<div class="card p-4">
    <h4 class="mb-4">Profil Guru</h4>
    <table class="table table-borderless w-50">
        {{-- DATA SISWA --}}
                {{-- <h5 class="mb-3">Data Guru</h5> --}}
                <dl class="row mb-4">
                    <dt class="col-sm-3">NIK</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_nik }}</dd>

                    <dt class="col-sm-3">Nama Lengkap</dt>
                    <dd class="col-sm-9">: {{ $teacher->user->name }}</dd>

                    <dt class="col-sm-3">Jenis Kelamin</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_gender }}</dd>

                    <dt class="col-sm-3">Tempat, Tanggal Lahir</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_birth_place }}, {{ \Carbon\Carbon::parse($teacher->tch_birth_date)->translatedFormat('d F Y') }}</dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_address }}</dd>

                    <dt class="col-sm-3">No. HP</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_phone }}</dd>

                    <dt class="col-sm-3">Pendidikan Terakhir</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_last_education }}</dd>

                    <dt class="col-sm-3">Pendidikan Saat Ini</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_current_education }}</dd>

                    <dt class="col-sm-3">Nama Institusi Pendidikan</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_name_institution }}</dd>

                    <dt class="col-sm-3">Tugas Utama</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_main_task }}</dd>

                    <dt class="col-sm-3">Tugas Tambahan</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_additional_task }}</dd>
                </dl>
    </table>
</div>
@endsection
