<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
Use Alert;

class TeacherAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('teacher')->get();
        $title = 'Hapus Data Guru!';
        $text = "Data Guru Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view('staff.teacher_account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.teacher_account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',

            'tch_nik' => 'required|string|unique:teachers,tch_nik',
            'tch_gender' => 'required',
            'tch_birth_place' => 'required',
            'tch_birth_date' => 'required|date',
            'tch_address' => 'required|string',
            'tch_phone' => 'required|string|max:20',
            'tch_last_education' => 'required|string',
            'tch_current_education' => 'required|string',
            'tch_name_institution' => 'required|string',
            'tch_main_task' => 'required|string',
            'tch_additional_task' => 'required|string',
        ]);

        // Simpan user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Simpan teacher
        Teacher::create([
            'tch_user_id'           => $user->usr_id,
            'tch_nik'               => $request->tch_nik,
            'tch_gender'            => $request->tch_gender,
            'tch_birth_place'       => $request->tch_birth_place,
            'tch_birth_date'        => $request->tch_birth_date,
            'tch_address'           => $request->tch_address,
            'tch_phone'             => $request->tch_phone,
            'tch_last_education'    => $request->tch_last_education,
            'tch_current_education' => $request->tch_current_education,
            'tch_name_institution'  => $request->tch_name_institution,
            'tch_main_task'         => $request->tch_main_task,
            'tch_additional_task'   => $request->tch_additional_task,
            'tch_created_by'        => auth()->id(),
            'tch_created_at'        => now(),
        ]);

        // Tambahkan role dengan Spatie
        $user->assignRole('teacher'); // <-- WAJIB

        Alert::success('Berhasil Menambahkan', 'Guru Berhasil Ditambahkan');
        return redirect('/staff/teacher_account');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('teacher')->findOrFail($id);
        $teacher = $user->teacher;

        return view('staff.teacher_account.detail', compact('user', 'teacher'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    
    // public function edit(string $id)
    // {
    //     $user = User::with('teacher')->findOrFail($id);
    //     $teacher = $user->teacher;

    //     return view('staff.teacher_account.detail', compact('user', 'teacher'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destroyUser = User::with('teacher')->findOrFail($id);
        $destroyUser->delete(); 

        Alert::success('Berhasil Menghapus', 'Guru Berhasil Dihapus');
        return redirect('/staff/teacher_account');
        }
}
