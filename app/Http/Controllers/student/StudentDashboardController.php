<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    
    public function index()
    {
        // Data yang mau ditampilkan di dashboard bisa diambil di sini
        // Contoh: hitung jumlah notifikasi, dll

        return view('student.dashboard');
    }
}
