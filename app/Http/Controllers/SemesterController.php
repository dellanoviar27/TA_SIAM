<?php

namespace App\Http\Controllers;

use App\Models\semester;
use App\Models\Schedule;
use Illuminate\Http\Request;
Use Alert;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semester = Semester::all();
        $title = 'Hapus Semester!';
        $text = "Semester Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view ('staff.semester.index', compact(['semester']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('staff.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createSemester = Semester::create([
            'smt_semester'        =>  $request->smt_semester,
            'smt_school_year'     =>  $request->smt_school_year,
        ]);

        Alert::success('Berhasil Menambahkan', 'Semester Berhasil Ditambahkan');
        return redirect('/staff/semester');
    }

    /**
     * Display the specified resource.
     */
    public function show(semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(semester $semester, $id)
    {
        $Semester = Semester::findOrFail($id);
        return view ('staff.semester.edit', compact(['Semester']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, semester $semester, $id)
    {
        $updateSemester = Semester::findOrFail($id);
        $updateSemester-> smt_semester      = $request -> smt_semester;
        $updateSemester-> smt_school_year   = $request -> smt_school_year;
        $updateSemester->save();

        Alert::success('Berhasil Mengedit', 'Semester Berhasil Diedit');
        return redirect('/staff/semester');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(semester $semester, $id)
    {
        $destroySemester = Semester::findOrFail($id);
        $destroySemester->delete();

        Alert::success('Berhasil Menghapus', 'Semester Berhasil Dihapus');
        return redirect('/staff/semester');
    }
}
