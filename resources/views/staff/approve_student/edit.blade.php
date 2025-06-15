@extends('staff.master')

@section('title', 'Verifikasi Siswa Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Verifikasi Calon Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('approve_student.update', $student->std_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" class="form-control" value="{{ $student->std_name }}" readonly>
            </div>

            <div class="mb-3">
                <label>Status Verifikasi</label>
                <select name="std_status" class="form-control" required>
                    <option value="pending" {{ $student->std_status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diterima" {{ $student->std_status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ $student->std_status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Catatan Verifikasi (Opsional)</label>
                <textarea name="std_ppdb_notes" class="form-control">{{ $student->std_ppdb_notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan Verifikasi</button>
        </form>
    </div>
</div>
@endsection
