<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Staff;
use App\Models\User;
use App\Models\homeroom_teacher;
use App\Models\Classes; // Ganti Classroom menjadi Classes
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah siswa, guru, staf, dan kelas
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        $totalHomeroomTeachers = homeroom_teacher::count();
        // $totalStaff = User::role('staff')->count(); // Menghitung jumlah user dengan role 'staff'
        $totalClasses = Classes::count(); // Ganti Classroom menjadi Classes

        // Statistik jenis kelamin siswa
        $maleStudents = Student::where('std_gender', 'male')->count();
        $femaleStudents = Student::where('std_gender', 'female')->count();

        // Kirim data ke view
        return view('staff.dashboard', compact(
            'totalStudents', 'totalTeachers', 'totalHomeroomTeachers', 'totalClasses', 
            'maleStudents', 'femaleStudents', 
        ));
    }
}
