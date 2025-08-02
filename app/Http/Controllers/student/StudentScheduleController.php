<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Semester;
use App\Models\Schedule;
use App\Models\ClassStudent;

class StudentScheduleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;

        $semesters = Semester::all();
        $semesterId = $request->semester_id ?? ($semesters->first()->smt_id ?? null);

        // Cari data class_student berdasarkan student login dan semester aktif
        $classStudent = ClassStudent::where('cst_student_id', $student->std_id)
            ->where('cst_semester_id', $semesterId)
            ->first();

        $schedules = [];

        if ($classStudent) {
            // Ambil jadwal berdasarkan kelas yang terdaftar di class_students
            $schedules = Schedule::where('sch_class_id', $classStudent->cst_class_id)
                ->where('sch_semester_id', $semesterId)
                ->where('sch_is_visible', true)
                ->get();
        }

        return view('student.schedule.index', compact('schedules', 'semesters', 'semesterId'));
    }
}