<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function index()
    {
        // Data yang mau ditampilkan di dashboard bisa diambil di sini
        // Contoh: hitung jumlah notifikasi, dll

        return view('staff.dashboard');
    }
}
