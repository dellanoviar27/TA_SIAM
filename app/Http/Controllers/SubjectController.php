<?php

namespace App\Http\Controllers;

use App\Models\Subject;
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
        // return view('users.index', compact('users'));
        return view ('admin.subject.index', compact(['Subject']));
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
        $createSubject = Subject::create([
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
        return view ('admin.subject.edit', compact(['Subject']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subject $subject, $id)
    {
        $updateSubject = Subject::findOrFail($id);
       
        $updateSubject-> sbj_name_subject   = $request -> sbj_name_subject;
        $updateSubject-> sbj_code           = $request -> sbj_code;
        $updateSubject-> sbj_kkm            = $request -> sbj_kkm;
        $updateSubject-> sbj_semester       = $request -> sbj_semester;
        $updateSubject->save();

        Alert::success('Berhasil Mengedit', 'Mata Pelajaran Berhasil Diedit');
        return redirect('/admin/subject');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject, $id)
    {
        $destroySubject = Subject::findOrFail($id);
       
        $destroySubject->delete();

        Alert::success('Berhasil Menghapus', 'Mata Pelajaran Berhasil Dihapus');
        return redirect('/admin/subject');
    }
}
