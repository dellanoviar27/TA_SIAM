<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\student\Ppdb_Student;
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
        // Ambil semua siswa dengan relasi kelas
        $approve_student = Student::with('classes')->where('std_status', 'pending')->get();
        $students = Ppdb_Student::with('parent')->get();

        $title = 'Hapus Calon Siswa!';
        $text = 'Calon Siswa Tidak Bisa Kembali Jika Dihapus';
        confirmDelete($title, $text);

        return view('staff.approve_student.index', compact('approve_student', 'students'));
        // return view('staff.approve_student.index', compact('approve_student'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('classes')->findOrFail($id);
        return view('staff.approve_student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('staff.approve_student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'std_status' => $request->input('std_status'),
            'std_ppdb_notes' => $request->input('std_ppdb_notes'),
        ]);

        return redirect()->route('approve_student.index')->with('success', 'Data siswa berhasil diverifikasi.');
    }

    public function detail($id)
    {
        $student = Ppdb_Student::with('classes', 'parent')->findOrFail($id);
        return view('staff.approve_student.detail', compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('approve_student.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
