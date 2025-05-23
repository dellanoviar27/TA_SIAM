<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\semester;
use Illuminate\Http\Request;
Use Alert;

class SubjectController extends Controller
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
        
        return view ('staff.subject.index', compact(['Subject']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Semester = Semester::all();
        return view ('staff.subject.create', compact('Semester'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSubject = Subject::create([
            'sbj_code'            =>  $request->sbj_code,
            'sbj_name'            =>  $request->sbj_name,
            'sbj_kkm'             =>  $request->sbj_kkm,
            'sbj_semester_id'     =>  $request->smt_id,
        ]);

        Alert::success('Berhasil Menambahkan', 'Mata Pelajaran Berhasil Ditambahkan');
        return redirect('/staff/subject');
    }

    /**
     * Display the specified resource.
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subject $subject, $id)
    {
        $Subject = Subject::findOrFail($id);
        $Semester = Semester::all();
        // dd($Semester);
        return view ('staff.subject.edit', compact(['Subject', 'Semester']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subject $subject, $id)
    {
        $updateSubject = Subject::findOrFail($id);
       
        $updateSubject-> sbj_code           = $request -> sbj_code;
        $updateSubject-> sbj_name           = $request -> sbj_name;
        $updateSubject-> sbj_kkm            = $request -> sbj_kkm;
        $updateSubject-> sbj_semester_id    = $request -> smt_id;
        $updateSubject->save();

        Alert::success('Berhasil Mengedit', 'Mata Pelajaran Berhasil Diedit');
        return redirect('/staff/subject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject, $id)
    {
        $destroySubject = Subject::findOrFail($id);
       
        $destroySubject->delete();

        Alert::success('Berhasil Menghapus', 'Mata Pelajaran Berhasil Dihapus');
        return redirect('/staff/subject');
    }
}
