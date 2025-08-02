<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\ClassStudent;
use App\Models\Student;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $teacher = optional(auth()->user()->teacher); // Memastikan relasi teacher ada

        if (!$teacher) {
            return redirect()->route('home')->with('error', 'User ini bukan guru atau tidak memiliki data guru.');
        }

        $semesters = Semester::orderByDesc('smt_school_year')->get();
        $semesterId = $request->semester_id ?? $semesters->first()->smt_id;

        $schedules = Schedule::with(['classes', 'subject'])
            ->where('sch_teacher_id', $teacher->tch_id)
            ->where('sch_semester_id', $semesterId)
            ->where('sch_is_visible', true)
            ->get();

        $scheduleId = $request->schedule_id;
        $selectedSchedule = $schedules->firstWhere('sch_id', $scheduleId);
        $students = collect();
        $grades = collect();

        if ($selectedSchedule) {
            $classId = $selectedSchedule->sch_class_id;

            $students = ClassStudent::where('cst_class_id', $classId)
                ->where('cst_semester_id', $semesterId)
                ->with('student.user')
                ->get()
                ->pluck('student');

            $grades = Grade::where('grd_class_id', $classId)
                ->where('grd_subject_id', $selectedSchedule->sch_subject_id)
                ->where('grd_semester_id', $semesterId)
                ->where('grd_teacher_id', $teacher->tch_id)
                ->get();
        }

        return view('teacher.grade.index', compact(
            'semesters', 'semesterId', 'schedules', 'scheduleId', 
            'selectedSchedule', 'students', 'grades'
        ));
    }


    public function create(Request $request)
    {
        $class = Classes::findOrFail($request->class_id);
        $subject = Subject::findOrFail($request->subject_id);
        $semester = Semester::findOrFail($request->semester_id);

        $studentIds = ClassStudent::where('cst_class_id', $class->cls_id)
            ->where('cst_semester_id', $semester->smt_id)
            ->pluck('cst_student_id');

        $students = Student::whereIn('std_id', $studentIds)->with('user')->get();

        $grades = Grade::where('grd_class_id', $class->cls_id)
            ->where('grd_subject_id', $subject->sbj_id)
            ->where('grd_semester_id', $semester->smt_id)
            ->where('grd_teacher_id', auth()->user()->teacher->tch_id)
            ->get();

        return view('teacher.grade.create', compact('class', 'subject', 'semester', 'students', 'grades'));
    }

    public function store(Request $request)
    {
        $classId = $request->class_id;
        $subjectId = $request->subject_id;
        $semesterId = $request->semester_id;
        $teacherId = auth()->user()->teacher->tch_id;

        foreach ($request->grades as $studentId => $gradeData) {
            $knowledge = $gradeData['knowledge'] ?? 0;
            $practice = $gradeData['practice'] ?? 0;
            $attitude = $gradeData['attitude'] ?? 0;

            $average = round(($knowledge + $practice + $attitude) / 3, 2);

            $predicate = match (true) {
                $average >= 90 => 'A',
                $average >= 80 => 'B',
                $average >= 70 => 'C',
                $average >= 60 => 'D',
                default => 'E',
            };

            $passed = $average >= 70;

            Grade::updateOrCreate(
                [
                    'grd_student_id'   => $studentId,
                    'grd_class_id'     => $classId,
                    'grd_semester_id'  => $semesterId,
                    'grd_subject_id'   => $subjectId,
                    'grd_teacher_id'   => $teacherId,
                ],
                [
                    'grd_knowledge'  => $knowledge,
                    'grd_practice'   => $practice,
                    'grd_attitude'   => $attitude,
                    'grd_average'    => $average,
                    'grd_predicate'  => $predicate,
                    'grd_passed'     => $passed,
                    'grd_created_by' => auth()->user()->usr_id,
                    'grd_updated_by' => auth()->user()->usr_id,
                ]
            );
        }

        return redirect()->route('teacher.grades.index')
            ->with('success', 'Nilai siswa berhasil disimpan.');
    }
}
