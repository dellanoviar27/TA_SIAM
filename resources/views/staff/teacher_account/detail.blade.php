@extends('staff.master_student')

@section('title')
    Detail Guru | SIAM Al-Mu'min
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h4 class="card-title mb-0">Detail Data Guru</h4>
            </div>
            <div class="card-body">
                
                {{-- DATA SISWA --}}
                <h5 class="mb-3">Data Guru</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">NIK</dt>
                    <dd class="col-sm-9">: {{ $teacher->tch_nik }}</dd>

                    <dt class="col-sm-3">Nama Lengkap</dt>
                    <dd class="col-sm-9">: {{ $user->name }}</dd>

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


                {{-- TOMBOL KEMBALI --}}
                <div class="text-end">
                    <a href="{{ route('staff.teacher_account.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
