<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class CurriculumAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('curriculum')->get();
        $title = 'Hapus Kurikulum!';
        $text = "Akun Kurikulum Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view('staff.curriculum_account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.curriculum_account.create');
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
        ]);

        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        // Tambahkan role dengan Spatie
        $user->assignRole('curriculum'); // <-- WAJIB

        Alert::success('Berhasil Menambahkan', 'Akun Kurikulum Berhasil Ditambahkan');
        return redirect('/staff/curriculum_account');

        // return redirect()->route('staff.staff_account.index')->with('success', 'Akun staff berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('staff.curriculum_account.edit', compact('user'));
    }

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
        $destroyUser = User::findOrFail($id);
        $destroyUser->delete(); 

        Alert::success('Berhasil Menghapus', 'Akun Kurikulum Berhasil Dihapus');
        return redirect('/staff/curriculum_account');
        }
}
