<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student\Ppdb_Parent;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PpdbStudentController extends Controller
{
    public function index()
    {
        $students = Student::with('parent')->get();
        return view('student.ppdb_student.index', compact('students'));
    }

    public function create()
    {
        $user = auth()->user();
        return view('student.Ppdb_Student.create', compact('user'));
    }

    public function create_parent()
    {
        $user = auth()->user();
        return view('student.ppdb_student.create_parent', compact('user'));
    }

    public function store(Request $request)
    {

        $request->validate([
        'std_nik'                => 'required|numeric|unique:students,std_nik',
        'std_gender'             => 'required',
        'std_birth_place'        => 'required',
        'std_birth_date'         => 'required|date',
        'std_child_to'           => 'required|numeric',
        'std_number_of_siblings' => 'required|numeric',
        'std_address'            => 'required|string',
        'std_school'             => 'required|string',
        'std_formal_level'       => 'required|string',
        'std_formal_grade'       => 'nullable|numeric',
        'std_nisn'               => 'required|numeric',
        // 'prt_id'                 => 'nullable|exists:ppdb_parents,id',
    ]);

    $createStudent = Student::create([
        'std_user_id'            => auth()->id(), // otomatis dari login
        'std_nik'                => $request->std_nik,
        'std_gender'             => $request->std_gender,
        'std_birth_place'        => $request->std_birth_place,
        'std_birth_date'         => $request->std_birth_date,
        'std_child_to'           => $request->std_child_to,
        'std_number_of_siblings' => $request->std_number_of_siblings,
        'std_address'            => $request->std_address,
        'std_date_registration'  => now()->toDateString(),
        'std_school'             => $request->std_school,
        'std_formal_level'       => $request->std_formal_level,
        'std_formal_grade'       => $request->std_formal_grade,
        // 'std_parent_id'          => $request->prt_id,
        'std_nisn'               => $request->std_nisn,
    ]);

        Alert::success('Berhasil Menambahkan', 'Data Berhasil Ditambahkan');
        return redirect('/student/Ppdb_Student/create_parent');
    }

    public function store_parent(Request $request)
    {
        //  dd(auth()->user());
        $createPpdb_Parent = Ppdb_Parent::create([
            'prt_user_id'            => auth()->user()->usr_id, // ← SOLUSI
            // 'prt_user_id'            => auth()->id(), // otomatis dari login
            'prt_father'            => $request->prt_father,
            'prt_status_father'     => $request->prt_status_father,
            'prt_address_father'    => $request->prt_address_father,
            'prt_job_father'        => $request->prt_job_father,
            'prt_income_father'     => $request->prt_income_father,
            'prt_mother'            => $request->prt_mother,
            'prt_status_mother'     => $request->prt_status_mother,
            'prt_address_mother'    => $request->prt_address_mother,
            'prt_job_mother'        => $request->prt_job_mother,
            'prt_income_mother'     => $request->prt_income_mother,
            'prt_guardian'          => $request->prt_guardian,
            'prt_address_guardian'  => $request->prt_address_guardian,
            'prt_job_guardian'      => $request->prt_job_guardian,
            'prt_income_guardian'   => $request->prt_income_guardian,
            'prt_parent_phone'      => $request->prt_parent_phone,
        ]);

        Alert::success('Berhasil Menambahkan', 'Data Berhasil Ditambahkan');
        return redirect('/staff/Ppdb_Parent');
    }

    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(Request $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}
