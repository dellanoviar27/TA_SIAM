<?php

namespace App\Http\Controllers\Student;

use App\Models\Semester;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentGradeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $student = $user->student;

        if (!$student) {
            abort(403, 'Data siswa tidak ditemukan.');
        }

        $semesters = Semester::all();
        $semesterId = $request->semester_id ?? ($semesters->first()->smt_id ?? null);

        // Ambil nilai milik siswa ini dan sesuai semester (jika dipilih)
        $gradesQuery = Grade::with(['subject', 'semester'])
            ->where('grd_student_id', $student->std_id);

        if ($semesterId) {
            $gradesQuery->where('grd_semester_id', $semesterId);
        }

        $grades = $gradesQuery->orderByDesc('grd_semester_id')->get();

        return view('student.grade.index', compact('grades', 'semesters', 'semesterId'));
    }
}
