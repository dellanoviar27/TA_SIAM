<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class StudentController extends Controller
{
    public function index()
    {
        $student = Student::with(['classes', 'user'])->where('std_status', 'diterima')->get();
        confirmDelete('Hapus Siswa!', 'Siswa Tidak Bisa Kembali Jika Dihapus');
        return view('staff.student.index', compact('student'));
    }

    public function create()
    {
        $classes = Classes::all();
        $user = User::all();
        return view('staff.student.create', compact('classes', 'user'));
    }

    public function store(Request $request)
    {
        $createStudent = Student::create([
            'std_nik'                => $request->std_nik,
            'std_user_id'            => auth()->user()->usr_id,
            'std_gender'             => $request->std_gender,
            'std_birth_place'        => $request->std_birth_place,
            'std_birth_date'         => $request->std_birth_date,
            'std_child_to'           => $request->std_child_to,
            'std_number_of_siblings' => $request->std_number_of_siblings,
            'std_address'            => $request->std_address,
            'std_date_registration'  => $request->std_date_registration,
            'std_school'             => $request->std_school,
            'std_formal_level'       => $request->std_formal_level,
            'std_formal_grade'       => $request->std_formal_grade,
            'std_class_id'           => $request->cls_id,
            'std_nisn'               => $request->std_nisn,
            'std_status'             => 'diterima',
        ]);

        Alert::success('Berhasil Menambahkan', 'Siswa Berhasil Ditambahkan');
        return redirect('/staff/student');
    }

    public function detail($id)
    {
        $student = Student::with(['user', 'classes'])->findOrFail($id);
        return view('staff.student.detail', compact('student'));
    }

    public function show(Student $student)
    {
        //
    }

    public function edit($id)
    {
        $editStudent = Student::findOrFail($id);
        $classes = Classes::all();
        return view('staff.student.edit', compact('editStudent', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update([
            'std_nik'                => $request->std_nik,
            'std_gender'             => $request->std_gender,
            'std_birth_place'        => $request->std_birth_place,
            'std_birth_date'         => $request->std_birth_date,
            'std_child_to'           => $request->std_child_to,
            'std_number_of_siblings' => $request->std_number_of_siblings,
            'std_address'            => $request->std_address,
            'std_date_registration'  => $request->std_date_registration,
            'std_school'             => $request->std_school,
            'std_formal_level'       => $request->std_formal_level,
            'std_formal_grade'       => $request->std_formal_grade,
            'std_class_id'           => $request->cls_id,
            'std_nisn'               => $request->std_nisn,
        ]);

        Alert::success('Berhasil Mengedit', 'Siswa Berhasil Diedit');
        return redirect('/staff/student');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        Alert::success('Berhasil Menghapus', 'Siswa Berhasil Dihapus');
        return redirect('/staff/student');
    }

    public function pending()
    {
        $students = Student::where('std_status', 'pending')->get();
        return view('students.pending', compact('students'));
    }

    public function approve($id)
    {
        $student = Student::findOrFail($id);
        $student->std_status = 'diterima';
        $student->save();

        return redirect()->back()->with('success', 'Siswa berhasil diverifikasi!');
    }
}
