@extends('staff.master')

@push('link')
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@section('title')
    Dashboard Staf | SIAM Al-Mu'min
@endsection

@section('content')
    <div class="row">
        <!-- Card untuk jumlah Siswa -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 zoom-in bg-primary-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-primary mb-1">Siswa</p>
                        <h5 class="fw-semibold text-primary mb-0">{{ $totalStudents }}</h5>
                    </div>
                     <div class="text-center mt-3">
                        <a href="/staff/student" class="btn btn-primary btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk jumlah Guru -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 zoom-in bg-warning-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-warning mb-1">Guru</p>
                        <h5 class="fw-semibold text-warning mb-0">{{ $totalTeachers }}</h5>
                    </div>
                    <div class="text-center mt-3">
                        <a href="/staff/teacher" class="btn btn-primary btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk jumlah Staf -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 zoom-in bg-info-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/images/svgs/icon-mailbox.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-info mb-1">Wali Kelas</p>
                        <h5 class="fw-semibold text-info mb-0">{{  $totalHomeroomTeachers }}</h5>
                    </div>
                     <div class="text-center mt-3">
                        <a href="/staff/homeroom_teacher" class="btn btn-primary btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card untuk jumlah Kelas -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 zoom-in bg-success-subtle shadow-none">
                <div class="card-body">
                    <div class="text-center">
                        <img src="../assets/images/svgs/icon-speech-bubble.svg" width="50" height="50" class="mb-3" alt="modernize-img" />
                        <p class="fw-semibold fs-3 text-success mb-1">Kelas</p>
                        <h5 class="fw-semibold text-success mb-0">{{ $totalClasses }}</h5>
                    </div>
                     <div class="text-center mt-3">
                        <a href="/staff/classes" class="btn btn-primary btn-sm">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Diagram Jenis Kelamin Siswa -->
    <div class="row">
        <div class="col-lg-6">
            <canvas id="genderChart"></canvas>
        </div>
    </div>
@endsection

@push('script')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data untuk Chart
        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(ctx, {
            type: 'pie',  // Jenis diagram
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jenis Kelamin Siswa',
                    data: [{{ $maleStudents }}, {{ $femaleStudents }}],
                    backgroundColor: ['#36a2eb', '#ff6384'],
                    borderColor: ['#ffffff', '#ffffff'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
@endpush
