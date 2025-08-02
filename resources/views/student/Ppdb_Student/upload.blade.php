@extends('staff.master_student')

@section('title')
    Upload Berkas | SIAM Al-Mu'min
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Upload Berkas Persyaratan Pendaftaran</h4>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Validasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tampilkan preview jika sudah upload --}}
        @if ($student->std_kk_photo)
            <div class="mb-3">
                <label class="form-label">Preview Kartu Keluarga:</label><br>
                @php
                    $kkPath = Storage::url($student->std_kk_photo);
                    $isImage = str_ends_with($student->std_kk_photo, '.jpg') ||
                               str_ends_with($student->std_kk_photo, '.jpeg') ||
                               str_ends_with($student->std_kk_photo, '.png');
                    $isPdf = str_ends_with($student->std_kk_photo, '.pdf');
                @endphp

                @if ($isImage)
                    <img src="{{ $kkPath }}" alt="KK" class="img-fluid rounded border" width="300">
                @elseif ($isPdf)
                    <a href="{{ $kkPath }}" target="_blank" class="btn btn-sm btn-secondary">
                        Lihat Berkas KK (PDF)
                    </a>
                @else
                    <span class="text-danger">Format file tidak dikenali.</span>
                @endif
            </div>
        @endif

        {{-- Form Upload --}}
       <form method="POST" action="{{ route('student.uploadKK', $student->std_id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="std_kk_photo" class="form-label">Upload Kartu Keluarga (JPG, PNG, atau PDF)</label>
                <input type="file" class="form-control" name="std_kk_photo" id="std_kk_photo" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection
