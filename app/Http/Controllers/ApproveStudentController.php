<?php

namespace App\Http\Controllers;

use App\Models\approve_student;
use App\Models\student\Ppdb_Student;
use App\Models\student;
use App\Models\Classes;
use Illuminate\Http\Request;
Use Alert;

class ApproveStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approve_student = Ppdb_Student::with('classes') -> get();
        dd($approve_student);
        $title = 'Hapus Calon Siswa !';
        $text = "Calon Siswa Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        // dd($approve_student); 
        return view ('staff.approve_student.index', compact(['approve_student']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(approve_student $approve_student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(approve_student $approve_student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, approve_student $approve_student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(approve_student $approve_student)
    {
        //
    }
}
