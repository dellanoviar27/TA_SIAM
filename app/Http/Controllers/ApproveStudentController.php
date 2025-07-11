<?php

namespace App\Http\Controllers;

use App\Models\Student;
// use App\Models\student\Ppdb_Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use Alert;

class ApproveStudentController extends Controller
{
    public function index()
    {
        $approve_student = Student::with(['classes', 'user'])->where('std_status', 'pending')->get();
        $students = Student::with('parent')->get();

        $title = 'Hapus Calon Siswa!';
        $text = 'Calon Siswa Tidak Bisa Kembali Jika Dihapus';
        confirmDelete($title, $text);

        return view('staff.approve_student.index', compact('approve_student', 'students'));
    }

    public function show($id)
    {
        $student = Student::with('user', 'parent')->findOrFail($id);
        return view('approve_student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::with('user')->findOrFail($id);
        return view('staff.approve_student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'std_status' => $request->input('std_status'),
        ]);

        return redirect()->route('approve_student.index')->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function detail($id)
    {
        $student = Ppdb_Student::with(['classes', 'parent', 'user'])->findOrFail($id);
        return view('staff.approve_student.detail', compact('student'));
    }

    public function verifikasi($id)
    {
        $student = Student::findOrFail($id);
        $student->std_status = 'diterima';
        $student->save();

        Alert::success('Verifikasi Berhasil', 'Siswa berhasil diverifikasi!');
        return redirect()->route('approve_student.index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('approve_student.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
