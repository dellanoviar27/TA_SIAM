<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\classes;
use App\Models\Teacher;
use App\Models\semester;
use Illuminate\Http\Request;
Use Alert;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedule = Schedule::all();
        
        $title = 'Hapus Jadwal!';
        $text = "Jadwal Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
       
        return view ('staff.schedule.index', compact(['schedule']));
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
        // dd($semester);
        return view ('staff.schedule.create', compact('Subject', 'classes', 'teacher', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSchedule = Schedule::create([
            'sch_day'           =>  $request->sch_day,
            'sch_class_id'      =>  $request->cls_id,
            'sch_subject_id'    =>  $request->sbj_id,
            'sch_teacher_id'    =>  $request->tch_id,
            'sch_semester_id'   =>  $request->smt_id,
            'sch_start_time'    =>  $request->sch_start_time,
            'sch_end_time'      =>  $request->sch_end_time,

        ]);

        Alert::success('Berhasil Menambahkan', 'Jadwal Berhasil Ditambahkan');
        return redirect('/staff/schedule');
    }

    /**
     * Display the specified resource.
     */
    public function show(schedule $schedule)
    {
        //
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
        return view ('staff.schedule.edit', compact(['editSchedule', 'classes', 'Subject', 'teacher', 'semester']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schedule $schedule, $id)
    {
        $updateSchedule = Schedule::findOrFail($id);
        $updateSchedule-> sch_day         = $request -> sch_day;
        $updateSchedule-> sch_class_id    = $request -> cls_id;
        $updateSchedule-> sch_subject_id  = $request -> sbj_id;
        $updateSchedule-> sch_teacher_id  = $request -> tch_id;
        $updateSchedule-> sch_semester_id = $request -> smt_id;
        $updateSchedule-> sch_start_time  = $request -> sch_start_time;
        $updateSchedule-> sch_end_time    = $request -> sch_end_time;
        $updateSchedule->save();

        Alert::success('Berhasil Mengedit', 'Jadwal Berhasil Diedit');
        return redirect('/staff/schedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schedule $schedule, $id)
    {
        $destroySchedule = Schedule::findOrFail($id);
        $destroySchedule->delete();

        Alert::success('Berhasil Menghapus', 'Jadwal Berhasil Dihapus');
        return redirect('/staff/schedule');
    }
}
