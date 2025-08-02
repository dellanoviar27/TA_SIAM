<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Grade;
use App\Models\Student;
use App\Models\ClassStudent;
use App\Models\homeroom_teacher;
use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceController extends Controller
{
    // Halaman utama rekap kehadiran
    public function index(Request $request)
    {
        $teacherId = auth()->user()->teacher->tch_id;

        $semesters = Semester::orderByDesc('smt_school_year')->get();
        $semesterId = $request->semester_id ?? $semesters->first()?->smt_id;

        $classes = homeroom_teacher::where('hrt_teacher_id', $teacherId)
            ->where('hrt_semester_id', $semesterId)
            ->with('class')
            ->get()
            ->pluck('class');

        $classId = $request->class_id;
        $selectedClass = $classes->firstWhere('cls_id', $classId);

        $students = collect();
        $attendances = collect();

        if ($selectedClass) {
            $studentIds = ClassStudent::where('cst_class_id', $classId)
                ->where('cst_semester_id', $semesterId)
                ->pluck('cst_student_id');

            $students = Student::whereIn('std_id', $studentIds)->with('user')->get();

            $attendances = Attendance::whereIn('att_student_id', $studentIds)
                ->where('att_class_id', $classId)
                ->where('att_semester_id', $semesterId)
                ->get();
        }

        return view('teacher.attendance.index', compact(
            'semesters', 'semesterId', 'classes', 'classId',
            'selectedClass', 'students', 'attendances'
        ));
    }

    // Form input kehadiran siswa
    public function create(Request $request)
    {
        $semesterId = $request->semester_id;
        $classId = $request->class_id;

        if (!$semesterId || !$classId) {
            return redirect()->back()->with('error', 'Semester dan Kelas harus dipilih terlebih dahulu.');
        }

        $semester = Semester::findOrFail($semesterId);
        $selectedClass = \App\Models\Classes::findOrFail($classId);

        $studentIds = ClassStudent::where('cst_class_id', $classId)
            ->where('cst_semester_id', $semesterId)
            ->pluck('cst_student_id');

        $students = Student::whereIn('std_id', $studentIds)->with('user')->get();

        $attendances = Attendance::whereIn('att_student_id', $studentIds)
            ->where('att_class_id', $classId)
            ->where('att_semester_id', $semesterId)
            ->get();

        return view('teacher.attendance.create', [
            'class'       => $selectedClass,
            'semester'    => $semester,
            'students'    => $students,
            'attendances' => $attendances,
        ]);
    }

    public function store(Request $request)
    {
        $semesterId = $request->semester_id;
        $classId = $request->class_id;

        if (!$semesterId || !$classId) {
            return redirect()->back()->with('error', 'Semester dan Kelas wajib diisi.');
        }

        $attendances = $request->input('attendances', []);

        foreach ($attendances as $studentId => $data) {
            Attendance::updateOrCreate(
                [
                    'att_student_id'   => $studentId,
                    'att_class_id'     => $classId,
                    'att_semester_id'  => $semesterId,
                ],
                [
                    'att_sick'         => $data['sick'] ?? 0,
                    'att_permission'   => $data['permission'] ?? 0,
                    'att_absence'      => $data['absence'] ?? 0,
                ]
            );
        }

        return redirect()->route('teacher.attendance.index', [
            'semester_id' => $semesterId,
            'class_id' => $classId
        ])->with('success', 'Data kehadiran berhasil disimpan.');
    }
}
