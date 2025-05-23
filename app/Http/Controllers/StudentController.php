<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\classes;
use Illuminate\Http\Request;
Use Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $student = Student::all();
        $title = 'Hapus Siswa!';
        $text = "Siswa Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        // return view('users.index', compact('users'));
        return view ('staff.student.index', compact(['student']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view ('staff.student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createStudent = Student::create([
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
            'std_father'               =>  $request->std_father,
            'std_status_father'        =>  $request->std_status_father,
            'std_address_father'       =>  $request->std_address_father,
            'std_work_father'          =>  $request->std_work_father,
            'std_income_father'        =>  $request->std_income_father,
            'std_mother'               =>  $request->std_mother,
            'std_status_mother'        =>  $request->std_status_mother,
            'std_address_mother'       =>  $request->std_status_mother,
            'std_work_mother'          =>  $request->std_work_mother,
            'std_income_mother'        =>  $request->std_income_mother,
            'std_guardian'             =>  $request->std_guardian,
            'std_address_guardian'     =>  $request->std_address_guardian,
            'std_work_guardian'        =>  $request->std_work_guardian,
            'std_income_guardian'      =>  $request->std_income_guardian,
            'std_parent_phone'         =>  $request->std_parent_phonen,
            'std_pictures'             =>  $request->std_pictures,
           
        ]);

        Alert::success('Berhasil Menambahkan', 'Siswa Berhasil Ditambahkan');
        return redirect('/staff/student');
    }

    /**
     * Display the specified resource.
     */

    public function detail($id)
    {
         $users = User::all();
         $student = Student::findOrFail($id);
 
         return view('staff.student.detail',compact(['student','users']));
         
     }

       /**
     * Show the form for editing the specified resource.
     */

    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student, $id)
    {
        $editStudent = Student::findOrFail($id);
        $classes = Classes::all();
        return view ('staff.student.edit', compact(['editStudent', 'classes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student, $id)
    {
        $updateStudent = Student::findOrFail($id);
        $updateStudent-> std_nik                  =  $request->std_nik;
        $updateStudent-> std_name                 =  $request->std_name;
        $updateStudent-> std_gender               =  $request->std_gender;
        $updateStudent-> std_place_of_birth       =  $request->std_place_of_birth;
        $updateStudent-> std_date_of_birth        =  $request->std_date_of_birth;
        $updateStudent-> std_child_to             =  $request->std_child_to;
        $updateStudent-> std_number_of_siblings   =  $request->std_number_of_siblings;
        $updateStudent-> std_address              =  $request->std_address;
        $updateStudent-> std_date_registration    =  $request->std_date_registration;
        $updateStudent-> std_school               =  $request->std_school;
        $updateStudent-> std_class_id             =  $request->cls_id;
        $updateStudent-> std_nisn                 =  $request->std_nisn;
        $updateStudent-> std_father               =  $request->std_father;
        $updateStudent-> std_status_father        =  $request->std_status_father;
        $updateStudent-> std_address_father       =  $request->std_address_father;
        $updateStudent-> std_work_father          =  $request->std_work_father;
        $updateStudent-> std_income_father        =  $request->std_income_father;
        $updateStudent-> std_mother               =  $request->std_mother;
        $updateStudent-> std_status_mother        =  $request->std_status_mother;
        $updateStudent-> std_address_mother       =  $request->std_status_mother;
        $updateStudent-> std_work_mother          =  $request->std_work_mother;
        $updateStudent-> std_income_mother        =  $request->std_income_mother;
        $updateStudent-> std_guardian             =  $request->std_guardian;    
        $updateStudent-> std_work_guardian        =  $request->std_work_guardian;
        $updateStudent-> std_income_guardian      =  $request->std_income_guardian;
        $updateStudent-> std_parent_phone         =  $request->std_parent_phonen;
        $updateStudent-> std_pictures             =  $request->std_pictures;

        $updateStudent->save();

        Alert::success('Berhasil Mengedit', 'siswa Berhasil Diedit');
        return redirect('/staff/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student, $id)
    {
        $destroyStudent = Student::findOrFail($id);
        $destroyStudent->delete();

        Alert::success('Berhasil Menghapus', 'Siswa Berhasil Dihapus');
        return redirect('/staff/student');
    }

    public function pending()
    {
    $students = Student::where('status', 'pending')->get();
    return view('students.pending', compact('students'));
    }

    public function approve($id)
    {
    $student = Student::findOrFail($id);
    $student->status = 'approved';
    $student->save();

    return redirect()->back()->with('success', 'Student approved successfully!');
    }

public function reject($id)
    {
    $student = Student::findOrFail($id);
    $student->status = 'rejected';
    $student->save();

    return redirect()->back()->with('error', 'Student rejected.');
    }
}