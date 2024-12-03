<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
Use Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $Subject = Subject::all();
        
        $title = 'Hapus Pelajaran!';
        $text = "Mata Pelajaran Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        // return view('users.index', compact('users'));
        return view ('admin.subject.index', compact(['subject']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createClasses = Classes::create([
            'sbj_name_subject'    =>  $request->sbj_name_subject,
            'sbj_code'            =>  $request->sbj_code,
            'sbj_kkm'             =>  $request->sbj_kkm,
            'sbj_semester'        =>  $request->sbj_semester,
        ]);

        Alert::success('Berhasil Menambahkan', 'Mata Pelajaran Berhasil Ditambahkan');
        return redirect('/admin/subject');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //
    }
}
