<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
Use Alert;

class StaffAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('staff')->get();
        $title = 'Hapus Staf!';
        $text = "Staf Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view('staff.staff_account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.staff_account.create');
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
        $user->assignRole('staff'); // <-- WAJIB

        Alert::success('Berhasil Menambahkan', 'Staf Berhasil Ditambahkan');
        return redirect('/staff/staff_account');

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
        return view('staff.staff_account.edit', compact('user'));
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

        Alert::success('Berhasil Menghapus', 'Staf Berhasil Dihapus');
        return redirect('/staff/staff_account');
        }
}
