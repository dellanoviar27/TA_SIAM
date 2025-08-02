<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\homeroom_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Semester;

class TeacherScheduleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (!$user->teacher) {
            return redirect()->back()->withErrors(['Akun ini belum terdaftar sebagai guru.']);
        }

        $teacher = $user->teacher;

        $semesterId = $request->semester_id;

        // Ambil semua semester untuk dropdown
        $semesters = Semester::orderByDesc('smt_school_year')->get();

        if (!$semesterId && $semesters->count()) {
            $semesterId = $semesters->first()->smt_id;
        }

        // Ambil semua jadwal mengajar guru ini (bukan hanya wali kelas)
        $schedules = Schedule::with(['classes', 'subject'])
            ->where('sch_teacher_id', $teacher->tch_id)
            ->where('sch_semester_id', $semesterId)
            ->where('sch_is_visible', true)
            ->get();

        // Cek apakah guru juga wali kelas pada semester ini
        $isWaliKelas = homeroom_teacher::where('hrt_teacher_id', $teacher->tch_id)
            ->where('hrt_semester_id', $semesterId)
            ->exists();

        return view('teacher.schedule.index', compact(
            'schedules',
            'semesters',
            'semesterId',
            'isWaliKelas'
        ));
    }
}
