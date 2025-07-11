@extends('staff.master_student')

@section('title')
    Detail Pendaftaran Siswa
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="px-4 py-3 border-bottom">
                <h4 class="card-title mb-0">Detail Data Calon Siswa</h4>
            </div>
            <div class="card-body">
                
                {{-- DATA SISWA --}}
                <h5 class="mb-3">Data Siswa</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">NIK</dt>
                    <dd class="col-sm-9">: {{ $student->std_nik }}</dd>

                    <dt class="col-sm-3">Nama Lengkap</dt>
                    <dd class="col-sm-9">: {{ $student->user->name ?? '-' }}</dd>

                    <dt class="col-sm-3">Jenis Kelamin</dt>
                    <dd class="col-sm-9">: {{ $student->std_gender }}</dd>

                    <dt class="col-sm-3">Tempat, Tanggal Lahir</dt>
                    <dd class="col-sm-9">: {{ $student->std_birth_place }}, {{ $student->std_birth_date }}</dd>

                    <dt class="col-sm-3">Anak Ke</dt>
                    <dd class="col-sm-9">: {{ $student->std_child_to }}</dd>

                    <dt class="col-sm-3">Jumlah Saudara</dt>
                    <dd class="col-sm-9">: {{ $student->std_number_of_siblings }}</dd>

                    <dt class="col-sm-3">Alamat</dt>
                    <dd class="col-sm-9">: {{ $student->std_address }}</dd>

                    <dt class="col-sm-3">Nama Sekolah</dt>
                    <dd class="col-sm-9">: {{ $student->std_school }}</dd>

                    <dt class="col-sm-3">Tingkatan Sekolah</dt>
                    <dd class="col-sm-9">: {{ $student->std_formal_level }}</dd>

                    @if ($student->std_formal_grade)
                        <dt class="col-sm-3">Kelas Sekolah</dt>
                        <dd class="col-sm-9">: {{ $student->std_formal_grade }}</dd>
                    @endif

                    <dt class="col-sm-3">NISN</dt>
                    <dd class="col-sm-9">: {{ $student->std_nisn }}</dd>
                </dl>

                {{-- DATA AYAH --}}
                <h5 class="mb-3">Data Ayah</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">Nama Ayah</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_father ?? '-' }}</dd>

                    <dt class="col-sm-3">Status Ayah</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_status_father ?? '-' }}</dd>

                    <dt class="col-sm-3">Alamat Ayah</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_address_father ?? '-' }}</dd>

                    <dt class="col-sm-3">Pekerjaan Ayah</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_job_father ?? '-' }}</dd>

                    <dt class="col-sm-3">Penghasilan Ayah</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_income_father ?? '-' }}</dd>
                </dl>

                {{-- DATA IBU --}}
                <h5 class="mb-3">Data Ibu</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">Nama Ibu</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_mother ?? '-' }}</dd>

                    <dt class="col-sm-3">Status Ibu</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_status_mother ?? '-' }}</dd>

                    <dt class="col-sm-3">Alamat Ibu</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_address_mother ?? '-' }}</dd>

                    <dt class="col-sm-3">Pekerjaan Ibu</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_job_mother ?? '-' }}</dd>

                    <dt class="col-sm-3">Penghasilan Ibu</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_income_mother ?? '-' }}</dd>
                </dl>

                {{-- DATA WALI --}}
                <h5 class="mb-3">Data Wali</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">Nama Wali</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_guardian ?? '-' }}</dd>

                    <dt class="col-sm-3">Alamat Wali</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_address_guardian ?? '-' }}</dd>

                    <dt class="col-sm-3">Pekerjaan Wali</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_job_guardian ?? '-' }}</dd>

                    <dt class="col-sm-3">Penghasilan Wali</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_income_guardian ?? '-' }}</dd>
                </dl>

                {{-- KONTAK --}}
                <h5 class="mb-3">Kontak</h5>
                <dl class="row mb-4">
                    <dt class="col-sm-3">No. HP Orangtua / Wali</dt>
                    <dd class="col-sm-9">: {{ $student->parent->prt_parent_phone ?? '-' }}</dd>
                </dl>

                {{-- TOMBOL KEMBALI --}}
                <div class="text-end">
                    <a href="{{ route('approve_student.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
