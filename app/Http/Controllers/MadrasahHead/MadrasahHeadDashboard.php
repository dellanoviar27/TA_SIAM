<?php

namespace App\Http\Controllers\MadrasahHead;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MadrasahHeadDashboard extends Controller
{
    public function index()
    {
        // Data yang mau ditampilkan di dashboard bisa diambil di sini
        // Contoh: hitung jumlah notifikasi, dll

        return view('madrasah_head.dashboard');
    }
}
