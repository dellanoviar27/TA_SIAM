@extends('staff.master_student')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    SIAM Al-Mu'min | Pendaftaran Berhasil
@endsection

@section('content')
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <p class="card-subtitle mb-3">
                    
                </p>
                <div class="table-responsive">
                    <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
                        <h3 class="text-success mb-3">Pendaftaran Berhasil!</h3>
                            <p class="mb-3">Terima kasih telah mengisi data pendaftaran siswa baru di <strong>Madrasah Diniyah Takmiliyah Al-Mu'min</strong>.</p>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <p class="mb-4">Langkah selanjutnya, silakan datang ke madrasah untuk proses <strong>verifikasi data</strong> dan <strong>pembayaran administrasi</strong>.</p>

                            <p class="text-muted mb-4">Jangan lupa membawa dokumen pendukung seperti:
                                <ul class="text-start d-inline-block">
                                    <li>Fotokopi Kartu Keluarga</li>
                                    {{-- <li>Fotokopi Akta Kelahiran</li>
                                    <li>Foto diri 3x4 (2 lembar)</li> --}}
                                </ul>
                            </p>
                            {{-- <a href="/student/dashboard" class="btn btn-primary">Kembali ke Beranda</a> --}}
                    </table>
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

    <script src="{{ asset('assets/js/datatable/datatable-advanced.init.js') }}"></script>
@endpush