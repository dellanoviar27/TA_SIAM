<?php

namespace App\Http\Controllers;

use App\Models\homeroom_teacher;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
Use Alert;

class HomeroomTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeroom_teacher = homeroom_teacher::all();
        $title = 'Hapus Wali Kelas';
        $text = "Wali Kelas Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view ('staff.homeroom_teacher.index', compact(['homeroom_teacher']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        $teacher = Teacher::all();
        return view ('staff.homeroom_teacher.create', compact('classes', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $homeroom_teacher = homeroom_teacher::create([
            'hrt_class_id'         =>  $request->cls_id,
            'hrt_teacher_id'       =>  $request->tch_id,
        ]);

        Alert::success('Berhasil Menambahkan', 'Wali Kelas Berhasil Ditambahkan');
        return redirect('/staff/homeroom_teacher');
    }

    /**
     * Display the specified resource.
     */
    public function show(homeroom_teacher $homeroom_teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(homeroom_teacher $homeroom_teacher, $id)
    {
        $homeroom_teacher = homeroom_teacher::findOrFail($id);
        $classes          = Classes::all();
        $teacher          = Teacher::all();
        return view ('staff.homeroom_teacher.edit', compact(['homeroom_teacher', 'classes', 'teacher']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, homeroom_teacher $homeroom_teacher, $id)
    {
        $updateHomeroom_Teacher = homeroom_teacher::findOrFail($id);
        $updateHomeroom_Teacher-> hrt_class_id   = $request -> cls_id;
        $updateHomeroom_Teacher-> hrt_teacher_id = $request -> tch_id;
        $updateHomeroom_Teacher->save();

        Alert::success('Berhasil Mengedit', 'Wali Kelas Berhasil Diedit');
        return redirect('/staff/homeroom_teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(homeroom_teacher $homeroom_teacher, $id)
    {
         $destroyHomeroom_Teacher = homeroom_teacher::findOrFail($id);
         $destroyHomeroom_Teacher->delete();

        Alert::success('Berhasil Menghapus', 'Wali Kelas Berhasil Dihapus');
        return redirect('/staff/homeroom_teacher');
    }
}
