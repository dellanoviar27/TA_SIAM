<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Student;
use App\Models\ClassStudent;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $semesters = Semester::all();
        $classes = Classes::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $students = collect();
        $grades = [];

        if ($request->filled(['semester_id', 'class_id', 'subject_id', 'teacher_id'])) {
            // Ambil siswa yang ada di kelas dan semester tersebut
            $studentIds = ClassStudent::where('cst_class_id', $request->class_id)
                ->where('cst_semester_id', $request->semester_id)
                ->pluck('cst_student_id');

            $students = Student::whereIn('std_id', $studentIds)->get();

            // Ambil nilai yang sudah ada
            $grades = Grade::where('grd_class_id', $request->class_id)
                ->where('grd_semester_id', $request->semester_id)
                ->where('grd_subject_id', $request->subject_id)
                ->where('grd_teacher_id', $request->teacher_id)
                ->get()
                ->keyBy('grd_student_id');
        }

        return view('teacher.grades.index', compact(
            'semesters',
            'classes',
            'teachers',
            'subjects',
            'students',
            'grades'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grades' => 'required|array',
            'class_id' => 'required|numeric',
            'semester_id' => 'required|numeric',
            'subject_id' => 'required|numeric',
            'teacher_id' => 'required|numeric',
        ]);

        foreach ($request->grades as $studentId => $data) {
            Grade::updateOrCreate(
                [
                    'grd_student_id' => $studentId,
                    'grd_class_id' => $request->class_id,
                    'grd_semester_id' => $request->semester_id,
                    'grd_subject_id' => $request->subject_id,
                    'grd_teacher_id' => $request->teacher_id,
                ],
                [
                    'grd_katabah' => $data['katabah'] ?? null,
                    'grd_kaifiyat' => $data['kaifiyat'] ?? null,
                    'grd_adab' => $data['adab'] ?? null,
                    'grd_predicate' => $data['predicate'] ?? null,
                    'grd_sick' => $data['sick'] ?? null,
                    'grd_permission' => $data['permission'] ?? null,
                    'grd_absence' => $data['absence'] ?? null,
                ]
            );
        }

        return redirect()->route('teacher.grades.index', [
            'semester_id' => $request->semester_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'teacher_id' => $request->teacher_id,
        ])->with('success', 'Nilai berhasil disimpan.');
    }
}
