<?php

namespace App\Http\Controllers\Curriculum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurriculumDashboard extends Controller
{
    public function index()
    {
        // Data yang mau ditampilkan di dashboard bisa diambil di sini
        // Contoh: hitung jumlah notifikasi, dll

        return view('curriculum.dashboard');
    }
}
