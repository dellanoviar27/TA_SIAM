<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
Use Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $staff = Staff::all();
        $title = 'Hapus Staf!';
        $text = "Staf Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
       
        return view('staff.management.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
         
        $createStaff = staff::create([
            'stf_nik'              =>  $request->stf_nik,
            'stf_name'             =>  $request->stf_name,
            'stf_gender'           =>  $request->stf_gender,
            'stf_birth_place'      =>  $request->stf_birth_place,
            'stf_birth_date'       =>  $request->stf_birth_date,
            'stf_address'          =>  $request->stf_address,
            'stf_phone'            =>  $request->stf_phone,

        ]);

        Alert::success('Berhasil Menambahkan', 'Staf Berhasil Ditambahkan');
        return redirect('/staff/management');

        // $request->validate([
        //     'stf_nik'           => 'required|unique:staff,stf_nik',
        //     'stf_name'          => 'required',
        //     'stf_gender'        => 'required',
        //     'stf_birth_place'   => 'required',
        //     'stf_birth_date'    => 'required|date',
        //     'stf_address'       => 'required',
        //     'stf_phone'         => 'required',
        //     'email'             => 'nullable|email|unique:users,email',
        //     'password'          => 'nullable|min:6',
        // ]);

        // Buat user jika email dan password diisi
        // $user = null;
        // if ($request->filled('email') && $request->filled('password')) {
        //     $user = User::create([
        //         'name' => $request->stf_name,
        //         'email' => $request->email,
        //         'password' => Hash::make($request->password),
        //     ]);
        //     $user->assignRole('staff');
        // }

        // Simpan staff
        // $staff = Staff::create([
        //     'stf_nik'           => $request->stf_nik,
        //     'stf_user_id'       => $user ? $user->usr_id : null,
        //     'stf_name'          => $request->stf_name,
        //     'stf_gender'        => $request->stf_gender,
        //     'stf_birth_place'   => $request->stf_birth_place,
        //     'stf_birth_date'    => $request->stf_birth_date,
        //     'stf_address'       => $request->stf_address,
        //     'stf_phone'         => $request->stf_phone,
        //     'stf_created_by'    => Auth::id(),
        // ]);

        // return redirect()->route('staff.index')->with('success', 'Data staff berhasil ditambahkan.');
    }

    public function detail($id)
     {
         $users = User::all();
         $staff = staff::findOrFail($id);
 
         return view('staff.management.detail',compact(['staff','users']));
         
     }


    /**
     * Display the specified resource.
     */
    public function show(staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(staff $staff, $id)
    {
        $Staff = staff::findOrFail($id);
        return view('staff.management.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, staff $staff, $id)
    {
        $updateStaff = staff::findOrFail($id);
        $updateStaff-> stf_nik          = $request -> stf_nik;
        $updateStaff-> stf_name         = $request -> stf_name;
        $updateStaff-> stf_gender       = $request -> stf_gender;
        $updateStaff-> stf_birth_place  = $request -> stf_birth_place;
        $updateStaff-> stf_birth_date   = $request -> stf_birth_date;
        $updateStaff-> stf_address      = $request -> stf_address;
        $updateStaff-> stf_phone        = $request -> stf_phone;
        $updateStaff->save();

        Alert::success('Berhasil Mengedit', 'Staf Berhasil Diedit');
        return redirect('/staff/management');
        
    //     $request->validate([
    //     'stf_nik'           => 'required|unique:staff,stf_nik,' . $staff->id,
    //     'stf_name'          => 'required',
    //     'stf_gender'        => 'required',
    //     'stf_birth_place'   => 'required',
    //     'stf_birth_date'    => 'required|date',
    //     'stf_address'       => 'required',
    //     'stf_phone'         => 'required',
    // ]);

    //     $staff->update([
    //         'stf_nik'           => $request->stf_nik,
    //         'stf_name'          => $request->stf_name,
    //         'stf_gender'        => $request->stf_gender,
    //         'stf_birth_place'   => $request->stf_birth_place,
    //         'stf_birth_date'    => $request->stf_birth_date,
    //         'stf_address'       => $request->stf_address,
    //         'stf_phone'         => $request->stf_phone,
    //         'stf_updated_by'    => Auth::id(),
    //     ]);

    //     return redirect()->route('staff.index')->with('success', 'Data staff berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(staff $staff, $id)
    {
        $destroyStaff = staff::findOrFail($id);
        $destroyStaff->delete();

        Alert::success('Berhasil Menghapus', 'Staf Berhasil Dihapus');
        return redirect('/staff/management');
        
        // $staff->update([
        // 'stf_deleted_by' => Auth::id(),
        // ]);
        // $staff->delete();

        // return redirect()->route('staff.index')->with('success', 'Data staff berhasil dihapus.');
        // }
    }
}