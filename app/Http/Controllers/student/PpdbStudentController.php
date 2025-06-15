<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller; // ✅ yang benar
use App\Models\student\Ppdb_Student;
use App\Models\student\Ppdb_Parent;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;


class PpdbStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $students = Student::with('parent')->get();
            return view('student.ppdb_student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('student.ppdb_student.create', compact('classes'));
    }

    public function create_parent()
    {
        return view('student.ppdb_student.create_parent');
    }


    /**
     * Store a newly created resource in storage.
     */
            public function store (Request $request) {
            // dd ($request);

            // Validasi upload gambar (opsional tapi direkomendasikan)
            $request->validate([
                'std_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Handle upload gambar
            $picturePath = null;
            if ($request->hasFile('std_picture')) {
                $picturePath = $request->file('std_picture')->store('students', 'public');
            }

            $createPpdb_Student = Ppdb_Student::create([
            'std_nik'                => $request->std_nik,
            'std_name'               => $request->std_name,
            'std_gender'             => $request->std_gender,
            'std_birth_place'        => $request->std_birth_place,
            'std_birth_date'         => $request->std_birth_date,
            'std_child_to'           => $request->std_child_to,
            'std_number_of_siblings' => $request->std_number_of_siblings,
            'std_address'            => $request->std_address,
            'std_date_registration'  => $request->std_date_registration,
            'std_school'             => $request->std_school,
            'std_class_id'           => $request->cls_id,
            'std_parent_id'          => $request->prt_id, // pastikan data parent sudah dibuat
            'std_nisn'               => $request->std_nisn,
            'std_pictures'           => $picturePath,
            ]);

        Alert::success('Berhasil Menambahkan', 'Data Berhasil Ditambahkan');
        return redirect('/staff/student');
    }

            public function store_parent(Request $request) {
            // dd ($request);
            $createPpdb_Parent = Ppdb_Parent::create([
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
        return redirect('/staff/Ppdb_Parent');
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
