<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use App\Models\Semester;
use App\Models\Grade;
use App\Models\ClassStudent;
use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class StaffReportController extends Controller
{
    public function index(Request $request)
    {
        $semesters = Semester::all();
        $classes = Classes::all();

        $semesterId = $request->get('semester_id');
        $classId = $request->get('class_id');

        $raports = [];

        if ($semesterId && $classId) {
            $students = Student::whereHas('classStudents', function ($query) use ($semesterId, $classId) {
                $query->where('cst_semester_id', $semesterId)
                      ->where('cst_class_id', $classId);
            })->with('user')->get();

            foreach ($students as $student) {
                $classStudent = ClassStudent::where('cst_student_id', $student->std_id)
                                            ->where('cst_semester_id', $semesterId)
                                            ->first();

                if ($classStudent) {
                    $raports[] = [
                        'student' => $student,
                        'classes' => Classes::find($classStudent->cst_class_id),
                        'semester' => Semester::find($semesterId),
                        'semesterId' => $semesterId,
                    ];
                }
            }
        }

        return view('staff.reports.index', compact(
            'raports', 'semesters', 'classes',
            'semesterId', 'classId'
        ));
    }

    public function print(Student $student, $semesterId)
    {
        $grades = Grade::where('grd_student_id', $student->std_id)
                       ->where('grd_semester_id', $semesterId)
                       ->with('subject')
                       ->get();

        $classId = ClassStudent::where('cst_student_id', $student->std_id)
                               ->where('cst_semester_id', $semesterId)
                               ->value('cst_class_id');

        $class = Classes::find($classId);
        $semester = Semester::findOrFail($semesterId);

        $attendance = [
            'sick' => Attendance::where('att_student_id', $student->std_id)
                                ->where('att_semester_id', $semesterId)
                                ->sum('att_sick'),
            'permission' => Attendance::where('att_student_id', $student->std_id)
                                      ->where('att_semester_id', $semesterId)
                                      ->sum('att_permission'),
            'absence' => Attendance::where('att_student_id', $student->std_id)
                                   ->where('att_semester_id', $semesterId)
                                   ->sum('att_absence'),
        ];

        $pdf = Pdf::loadView('staff.reports.print', [
            'student' => $student,
            'grades' => $grades,
            'classes' => $class,
            'semester' => $semester,
            'attendance' => $attendance,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('rapor_' . $student->user->name . '.pdf');
    }
}
