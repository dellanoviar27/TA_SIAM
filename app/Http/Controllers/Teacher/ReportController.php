<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\Schedule;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Classes;
use App\Models\ClassStudent;
use App\Models\homeroom_teacher;
use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    // Tampilkan halaman index rekap rapor
    public function index(Request $request)
    {
        $teacherId = auth()->user()->teacher->tch_id;

        // Ambil semua semester untuk dropdown
        $semesters = Semester::orderByDesc('smt_school_year')->get();
        $semesterId = $request->semester_id ?? $semesters->first()?->smt_id;

        // Ambil semua kelas yang diampu guru sebagai wali kelas pada semester tersebut
        $classes = homeroom_teacher::where('hrt_teacher_id', $teacherId)
            ->where('hrt_semester_id', $semesterId)
            ->with('class') // pastikan ambil data class
            ->get()
            ->pluck('class');

        $classId = $request->class_id;
        $selectedClass = $classes->firstWhere('cls_id', $classId);

        $students = collect();

        if ($selectedClass) {
            // Ambil semua siswa di kelas tersebut pada semester terpilih
            $studentIds = ClassStudent::where('cst_class_id', $classId)
                ->where('cst_semester_id', $semesterId)
                ->pluck('cst_student_id');

            // Ambil data siswa beserta relasi user dan grades-nya
            $students = Student::whereIn('std_id', $studentIds)
                ->with(['user', 'grades' => function ($query) use ($semesterId) {
                    $query->where('grd_semester_id', $semesterId);
                }])
                ->get();
        }

        return view('teacher.reports.index', compact(
            'semesters', 'semesterId',
            'classes', 'classId',
            'selectedClass', 'students'
        ));
    }

    // Tampilkan detail nilai & kehadiran per siswa
    public function show($studentId, Request $request)
    {
        $semesterId = $request->semester_id;
        $classId = $request->class_id;

        // Validasi: semester dan kelas wajib ada
        if (!$semesterId || !$classId) {
            abort(404, 'Data semester atau kelas tidak ditemukan.');
        }

        // Ambil data siswa beserta user
        $student = Student::with('user')->findOrFail($studentId);

        // Ambil nilai-nilai berdasarkan semester & kelas
        $grades = Grade::with('subject')
            ->where('grd_student_id', $studentId)
            ->where('grd_class_id', $classId)
            ->where('grd_semester_id', $semesterId)
            ->get();

        // Ambil semester & kelas
        $semester = Semester::findOrFail($semesterId);
        $class = \App\Models\Classes::findOrFail($classId); // Pastikan model 'Classes' benar

        // Ambil data kehadiran dari tabel attendance
        $attendance = \App\Models\Attendance::where('att_student_id', $studentId)
            ->where('att_semester_id', $semesterId)
            ->first();

        // Inject data ke setiap grade (agar bisa ditampilkan per baris)
        foreach ($grades as $grade) {
            $grade->att_sick = $attendance->att_sick ?? 0;
            $grade->att_permission = $attendance->att_permission ?? 0;
            $grade->att_absence = $attendance->att_absence ?? 0;
        }

        return view('teacher.reports.show', compact(
            'student',
            'grades',
            'semester',
            'class',
            'semesterId',
            'attendance' // ini penting
        ));
    }

   public function print(Student $student, $semester)
    {
        $grades = Grade::where('grd_student_id', $student->std_id)
            ->where('grd_semester_id', $semester)
            ->with('subject')
            ->get();

        // Ambil ID kelas siswa dari class_student berdasarkan semester
        $classId = ClassStudent::where('cst_student_id', $student->std_id)
                    ->where('cst_semester_id', $semester)
                    ->value('cst_class_id');

        // Ambil data kelas
        $class = Classes::find($classId);

        // Ambil semester
        $semesterData = Semester::findOrFail($semester);

        // Ambil rekap kehadiran dari tabel attendance
        $attendance = [
            'sick' => Attendance::where('att_student_id', $student->std_id)
                                ->where('att_semester_id', $semester)
                                ->sum('att_sick'),
            'permission' => Attendance::where('att_student_id', $student->std_id)
                                    ->where('att_semester_id', $semester)
                                    ->sum('att_permission'),
            'absence' => Attendance::where('att_student_id', $student->std_id)
                                ->where('att_semester_id', $semester)
                                ->sum('att_absence'),
        ];

        $pdf = Pdf::loadView('teacher.reports.print', [
            'student'     => $student,
            'grades'      => $grades,
            'classes'     => $class,
            'semester'    => $semesterData,
            'attendance'  => $attendance,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('rapor_'.$student->user->name.'.pdf');
    }
}
