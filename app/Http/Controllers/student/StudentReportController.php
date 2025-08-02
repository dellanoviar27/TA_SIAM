<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Semester;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;

class StudentReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = $user->student;

        if (!$student) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $semesterIds = Grade::where('grd_student_id', $student->std_id)
            ->pluck('grd_semester_id')->unique();

        $raports = [];

        foreach ($semesterIds as $semesterId) {
            $grades = Grade::where('grd_student_id', $student->std_id)
                ->where('grd_semester_id', $semesterId)
                ->with('subject')
                ->get();

            $semester = Semester::find($semesterId);

            $classId = ClassStudent::where('cst_student_id', $student->std_id)
                ->where('cst_semester_id', $semesterId)
                ->value('cst_class_id');

            $kelas = Classes::find($classId);

            $raports[] = [
                'grades' => $grades,
                'semester' => $semester,
                'classes' => $kelas,
                'student' => $student,
                'semesterId' => $semesterId,
            ];
        }

        return view('student.reports.index', compact('raports'));
    }

    public function print($studentId, $semesterId)
    {
        $student = Student::findOrFail($studentId);

        $grades = Grade::with('subject')
            ->where('grd_student_id', $student->std_id)
            ->where('grd_semester_id', $semesterId)
            ->get();

        $classId = ClassStudent::where('cst_student_id', $student->std_id)
            ->where('cst_semester_id', $semesterId)
            ->value('cst_class_id');

        $class = Classes::find($classId);

        $semester = Semester::findOrFail($semesterId);

        $attendance = [
            'sick' => Attendance::where('att_student_id', $student->std_id)
                ->where('att_semester_id', $semesterId)->sum('att_sick'),
            'permission' => Attendance::where('att_student_id', $student->std_id)
                ->where('att_semester_id', $semesterId)->sum('att_permission'),
            'absence' => Attendance::where('att_student_id', $student->std_id)
                ->where('att_semester_id', $semesterId)->sum('att_absence'),
        ];

        $pdf = Pdf::loadView('student.reports.print', [
            'student' => $student,
            'grades' => $grades,
            'classes' => $class,
            'semester' => $semester,
            'attendance' => $attendance,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('rapor_'.$student->user->name.'.pdf');
    }
}
