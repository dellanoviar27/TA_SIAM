<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\classes;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = Schedule::query();

            if ($request->semester_id) {
                $query->where('sch_semester_id', $request->semester_id);
            }

            if ($request->class_id) {
                $query->where('sch_class_id', $request->class_id);
            }

            $schedule = $query->get();
            $semesters = Semester::all();
            $classes = Classes::all();

            $title = 'Hapus Jadwal!';
            $text = "Jadwal Tidak Bisa Kembali Jika Dihapus";
            confirmDelete($title, $text);

            return view('curriculum.schedule.index', compact('schedule', 'semesters', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Subject = Subject::all();
        $classes = Classes::all();
        $teacher = Teacher::all();
        $semester = Semester::all();

        return view('curriculum.schedule.create', compact('Subject', 'classes', 'teacher', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSchedule = Schedule::create([
            'sch_day'           => $request->sch_day,
            'sch_class_id'      => $request->cls_id,
            'sch_subject_id'    => $request->sbj_id,
            'sch_teacher_id'    => $request->tch_id,
            'sch_semester_id'   => $request->smt_id,
            'sch_start_time'    => $request->sch_start_time,
            'sch_end_time'      => $request->sch_end_time,
            'sch_is_visible'    => $request->has('sch_is_visible'),
            'sch_created_by'    => auth()->id(),
        ]);

        Alert::success('Berhasil Menambahkan', 'Jadwal Berhasil Ditambahkan');
        return redirect('/staff/schedule');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(schedule $schedule, $id)
    {
        $editSchedule = Schedule::findOrFail($id);
        $classes = Classes::all();
        $Subject = Subject::all();
        $teacher = Teacher::all();
        $semester = Semester::all();

        return view('curriculum.schedule.edit', compact('editSchedule', 'classes', 'Subject', 'teacher', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schedule $schedule, $id)
    {
        $updateSchedule = Schedule::findOrFail($id);
        $updateSchedule->sch_day         = $request->sch_day;
        $updateSchedule->sch_class_id    = $request->cls_id;
        $updateSchedule->sch_subject_id  = $request->sbj_id;
        $updateSchedule->sch_teacher_id  = $request->tch_id;
        $updateSchedule->sch_semester_id = $request->smt_id;
        $updateSchedule->sch_start_time  = $request->sch_start_time;
        $updateSchedule->sch_end_time    = $request->sch_end_time;
        $updateSchedule->sch_is_visible  = $request->has('sch_is_visible');
        $updateSchedule->sch_updated_by  = auth()->id();
        $updateSchedule->save();

        Alert::success('Berhasil Mengedit', 'Jadwal Berhasil Diedit');
        return redirect('/curriculum/schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schedule $schedule, $id)
    {
        $destroySchedule = Schedule::findOrFail($id);
        $destroySchedule->delete();

        Alert::success('Berhasil Menghapus', 'Jadwal Berhasil Dihapus');
        return redirect('/curriculum/schedule');
    }
}
