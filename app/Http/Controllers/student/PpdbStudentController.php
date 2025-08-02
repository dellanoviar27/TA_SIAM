<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\student\Ppdb_Parent;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        ]);

        Student::create([
            'std_user_id'            => auth()->id(),
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
            'std_nisn'               => $request->std_nisn,
        ]);

        Alert::success('Berhasil Menambahkan', 'Data Berhasil Ditambahkan');
        return redirect('/student/Ppdb_Student/create_parent');
    }

    public function store_parent(Request $request)
    {
        Ppdb_Parent::create([
            'prt_user_id'            => auth()->user()->usr_id,
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

        Alert::success('Pendaftaran Berhasil', 'Berhasil Melakukan Pendaftaran');
        // return redirect()->route('student.Ppdb_Student.confirmation');

        $student = Student::where('std_user_id', auth()->id())->first();
        if ($student) {
            return redirect()->route('student.uploadForm', ['id' => $student->std_id]);
            } else {
                return redirect()->route('student.Ppdb_Student.confirmation')->with('error', 'Data siswa tidak ditemukan.');
            }
    }


    public function confirmation()
    {
        return view('student.Ppdb_Student.confirmation');
    }

    // FORM UPLOAD
    public function uploadForm($id)
    {
        $student = Student::findOrFail($id);
        return view('student.ppdb_student.upload', compact('student'));
    }

    // UPLOAD KK
    public function uploadKK(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'std_kk_photo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($request->hasFile('std_kk_photo')) {
            // Hapus file lama jika ada
            if ($student->std_kk_photo && Storage::exists($student->std_kk_photo)) {
                Storage::delete($student->std_kk_photo);
            }

            // Simpan file baru
            $path = $request->file('std_kk_photo')->store('kk', 'public');

            // Update path di database
            $student->std_kk_photo = $path;
            $student->save();

            // Alert::success('Berhasil Upload Kartu Keluarga', 'Kartu Keluarga Berhasil Diupload');
            // return redirect('/student/Ppdb_Student/upload/{id}');
            // return redirect()->back()->with('success', 'Berkas KK berhasil diupload.');
            return redirect('/student/Ppdb_Student/confirmation')->with('success');
        }

        return redirect()->back()->with('error', 'Berkas KK gagal diupload.');
    }
}
