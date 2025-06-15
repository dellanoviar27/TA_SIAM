<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
Use Alert;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();
        $title = 'Hapus Guru!';
        $text = "Guru Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        // return view('users.index', compact('users'));
        return view ('staff.teacher.index', compact(['teacher']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('staff.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $createTeacher = Teacher::create([
            'tch_nik'               =>  $request->tch_nik,
            'tch_name'              =>  $request->tch_name,
            'tch_gender'            =>  $request->tch_gender,
            'tch_birth_place'       =>  $request->tch_birth_place,
            'tch_birth_date'        =>  $request->tch_birth_date,
            'tch_address'           =>  $request->tch_address,
            'tch_phone'             =>  $request->tch_phone,
            'tch_address'           =>  $request->tch_address,
            'tch_last_education'    =>  $request->tch_last_education,
            'tch_current_education' =>  $request->tch_current_education,
            'tch_name_institution'  =>  $request->tch_name_institution,
            'tch_main_task'         =>  $request->tch_main_task,
            'tch_additional_task'   =>  $request->tch_additional_task,
            'tch_pictures'          =>  $request->tch_pictures,
        ]);

        Alert::success('Berhasil Menambahkan', 'Guru Berhasil Ditambahkan');
        return redirect('/staff/teacher');
    }

    /**
     * Display the specified resource.
     */

     public function detail($id)
     {
         $users = User::all();
         $teacher = Teacher::findOrFail($id);
 
         return view('staff.teacher.detail',compact(['teacher','users']));
         
     }

      /**
     * Show the form for editing the specified resource.
     */

    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(teacher $teacher, $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view ('staff.teacher.edit', compact(['teacher']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, teacher $teacher, $id)
    {
        $updateTeacher = Teacher::findOrFail($id);
        // dd ($destroyClasses);

        $updateTeacher-> tch_nik               = $request -> tch_nik;
        $updateTeacher-> tch_name              = $request -> tch_name;
        $updateTeacher-> tch_gender            = $request -> tch_gender;
        $updateTeacher-> tch_birth_place       = $request -> tch_birth_place;
        $updateTeacher-> tch_birth_date        = $request -> tch_birth_date;
        $updateTeacher-> tch_address           = $request -> tch_address;
        $updateTeacher-> tch_phone             = $request -> tch_phone;
        $updateTeacher-> tch_last_education    = $request -> tch_last_education;
        $updateTeacher-> tch_current_education = $request -> tch_current_education;
        $updateTeacher-> tch_name_institution  = $request -> tch_name_institution;
        $updateTeacher-> tch_main_task         = $request -> tch_main_task;
        $updateTeacher-> tch_additional_task   = $request -> tch_additional_task;
        $updateTeacher-> tch_pictures          = $request -> tch_pictures;
      
        $updateTeacher->save();

        Alert::success('Berhasil Mengedit', 'Guru Berhasil Diedit');
        return redirect('/staff/teacher');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(teacher $teacher, $id)
    {
        $destroyTeacher = Teacher::findOrFail($id);
        $destroyTeacher->delete();

        Alert::success('Berhasil Menghapus', 'Guru Berhasil Dihapus');
        return redirect('/staff/teacher');
    }
}
