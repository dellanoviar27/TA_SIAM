<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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
       
        return view ('admin.schedule.index', compact(['schedule']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSchedule = Schedule::create([
            'sch_day'           =>  $request->sch_day,
            'sch_class_id'      =>  $request->sch_class_id,
            'sch_subject_id'    =>  $request->sch_subject_id,
            'sch_teacher_id'    =>  $request->sch_teacher_id,
            'sch_start_time'    =>  $request->sch_start_time,
            'sch_end_time'      =>  $request->sch_end_time,
        ]);

        Alert::success('Berhasil Menambahkan', 'Jadwal Berhasil Ditambahkan');
        return redirect('/admin/schedule');
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
        $Schedule = Schedule::findOrFail($id);
      
        return view ('admin.schedule.edit', compact(['schedule']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schedule $schedule, $id)
    {
        $updateSchedule = Schedule::findOrFail($id);
        $updateSchedule-> sch_day        = $request -> sch_day;
        $updateSchedule-> sch_class_id   = $request -> sch_class_id;
        $updateSchedule-> sch_subject_id = $request -> sch_subject_id;
        $updateSchedule-> sch_teacher_id = $request -> sch_teacher_id;
        $updateSchedule-> sch_start_time = $request -> sch_start_time;
        $updateSchedule-> sch_end_time   = $request -> sch_end_time;
        $updateSchedule->save();

        Alert::success('Berhasil Mengedit', 'Jadwal Berhasil Diedit');
        return redirect('/admin/shedule');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schedule $schedule, $id)
    {
        $destroySchedule = Schedule::findOrFail($id);
        // dd ($destroyClasses);
        $destroySchedule->delete();

        Alert::success('Berhasil Menghapus', 'Jadwal Berhasil Dihapus');
        return redirect('/admin/schedule');
    }
}
