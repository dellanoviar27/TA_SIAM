@extends('staff.master_student')

@section('content')
<div class="card p-4">
    <h4>Profil Siswa</h4>
    <p><strong>Nama:</strong> {{ $student->user->name }}</p>
    <p><strong>NIK:</strong> {{ $student->std_nik }}</p>
    <p><strong>Tempat, Tanggal Lahir:</strong> {{ $student->std_birth_place }}, {{ $student->std_birth_date }}</p>
    <p><strong>Alamat:</strong> {{ $student->std_address }}</p>
    <p><strong>Kelas:</strong> {{ $student->classes->cls_name ?? '-' }}</p>
</div>
@endsection
