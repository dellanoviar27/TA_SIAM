<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Rapor - {{ $student->user->name ?? '-' }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        .text-center {
            text-align: center;
        }
        .kop {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }
        .sub-kop {
            font-size: 13px;
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: middle;
        }
        .no-border td {
            border: none;
        }
        .signature {
            width: 100%;
            margin-top: 40px;
        }
        .signature td {
            text-align: center;
            vertical-align: bottom;
            height: 100px;
        }
        .info-table {
            margin: 10px 0;
            border: none;
            font-size: 12px;
        }
        .info-table td {
            border: none;
            padding: 2px 4px;
            line-height: 1.4;
        }
        .label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }
        .table-kehadiran {
            width: 50%;
            margin-bottom: 20px;
        }
        .table-kehadiran th, .table-kehadiran td {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="kop">AL-MU'MIN</div>
    <div class="sub-kop">LAPORAN HASIL BELAJAR SISWA</div>

    <table class="info-table">
        <tr>
            <td style="width: 65%;">
                <div><span class="label">Nama Madrasah</span>: AL-MU'MIN</div>
                <div><span class="label">Alamat</span>: Kp. Patrol Jl. Andir No. 51 RT 02/04 Bandung 4092</div>
                <div><span class="label">Nama Siswa</span>: {{ $student->user->name ?? '-' }}</div>
                <div><span class="label">Website</span>: www.madrasahal-muminbdg.blogspot.com</div>
            </td>
            <td style="width: 35%;">
                <div><span class="label">Kelas</span>: {{ $classes->cls_level ?? '-' }} {{ $classes->cls_number ?? '' }}</div>
                <div><span class="label">NIS</span>: {{ $student->std_nisn ?? '-' }}</div>
                <div><span class="label">Semester</span>: {{ $semester->smt_semester ?? '-' }}</div>
                <div><span class="label">Tahun Pelajaran</span>: {{ $semester->smt_school_year ?? '-' }}</div>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2" style="text-align: left;">Mata Pelajaran</th>
                <th colspan="3">Nilai</th>
                <th rowspan="2">Rata-rata</th>
                <th rowspan="2">Predikat</th>
                <th rowspan="2">KKM</th>
            </tr>
            <tr>
                <th>Pengetahuan</th>
                <th>Praktik</th>
                <th>Sikap</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grades as $index => $grade)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td style="text-align: left;">{{ $grade->subject->sbj_name ?? '-' }}</td>
                    <td>{{ $grade->grd_knowledge ?? '-' }}</td>
                    <td>{{ $grade->grd_practice ?? '-' }}</td>
                    <td>{{ $grade->grd_attitude ?? '-' }}</td>
                    <td>{{ number_format($grade->grd_average ?? 0, 2) }}</td>
                    <td>{{ $grade->grd_predicate ?? '-' }}</td>
                    <td>{{ $grade->subject->sbj_kkm ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <strong>Ketidakhadiran</strong>
    <table class="table-kehadiran">
        <thead>
            <tr>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Tanpa Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $attendance['sick'] ?? 0 }}</td>
                <td>{{ $attendance['permission'] ?? 0 }}</td>
                <td>{{ $attendance['absence'] ?? 0 }}</td>
            </tr>
        </tbody>
    </table>

    <table class="signature no-border">
        <tr>
            <td>
                Mengetahui,<br>
                Kepala Madrasah<br><br><br><br>
                (____________________)
            </td>
            <td>
                Bandung, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Wali Kelas<br><br><br><br>
                (____________________)
            </td>
        </tr>
    </table>

</body>
</html>
