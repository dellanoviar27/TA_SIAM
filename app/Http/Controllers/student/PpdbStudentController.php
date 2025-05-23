<?php

namespace App\Http\Controllers\Student;

use App\Models\student\Ppdb_Student;
use App\Models\student;
use App\Models\Classes;
use App\Models\student\parented;
use Illuminate\Http\Request;
Use Alert;

class PpdbStudentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Ppdb_Student = student::all();
        return view ('student.ppdb_student.index', compact('Ppdb_Student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view ('student.ppdb_student.create', compact('classes'));
    }

    public function create_parent()
    {
        return view ('student.ppdb_student.create_parent');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $createPpdbStudent = Ppdb_Student::create([
            'std_nik'                  =>  $request->std_nik,
            'std_name'                 =>  $request->std_name,
            'std_gender'               =>  $request->std_gender,
            'std_place_of_birth'       =>  $request->std_place_of_birth,
            'std_date_of_birth'        =>  $request->std_date_of_birth,
            'std_child_to'             =>  $request->std_child_to,
            'std_number_of_siblings'   =>  $request->std_number_of_siblings,
            'std_address'              =>  $request->std_address,
            'std_date_registration'    =>  $request->std_date_registration,
            'std_school'               =>  $request->std_school,
            'std_class_id'             =>  $request->cls_id,
            'std_nisn'                 =>  $request->std_nisn,
        ]);
    }

            public function store_parent(Request $request) {
            $createparented = parented::create([
            'prt_father'               =>  $request->prt_father,
            'prt_status_father'        =>  $request->prt_status_father,
            'prt_address_father'       =>  $request->prt_address_father,
            'prt_job_father'           =>  $request->prt_job_father,
            'prt_income_father'        =>  $request->prt_income_father,
            'prt_mother'               =>  $request->prt_mother,
            'prt_status_mother'        =>  $request->prt_status_mother,
            'prt_address_mother'       =>  $request->prt_address_mother,
            'prt_job_mother'           =>  $request->prt_job_mother,
            'prt_income_mother'        =>  $request->prt_income_mother,
            'prt_guardian'             =>  $request->prt_guardian,
            'prt_address_guardian'     =>  $request->prt_address_guardian,
            'prt_job_guardian'         =>  $request->prt_job_guardian,
            'prt_income_guardian'      =>  $request->prt_income_guardian,
            'prt_parent_phone'         =>  $request->prt_parent_phone,
        ]);

        Alert::success('Berhasil Menambahkan', 'Data Berhasil Ditambahkan');
        return redirect('/student/approve_student');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ppdb_Student $ppdb_Student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ppdb_Student $ppdb_Student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ppdb_Student $ppdb_Student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ppdb_Student $ppdb_Student)
    {
        //
    }
}
