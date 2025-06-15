<?php

namespace App\Http\Controllers;

use App\Models\information;
use Illuminate\Http\Request;
Use Alert;


class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $information = Information::all();
        $title = 'Hapus Pengumuman!';
        $text = "Pengumuman Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
       
        return view('staff.information.index', compact('information'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view ('staff.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $createInformation = Information::create([
            'inf_title'         =>  $request->inf_title,
            'inf_content'       =>  $request->inf_content,
        ]);

        Alert::success('Berhasil Menambahkan', 'Pengumuman Berhasil Ditambahkan');
        return redirect('/staff/information');
    }

    /**
     * Display the specified resource.
     */
    public function show(information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(information $information, $id)
    {
        $Information = Information::findOrFail($id);
        return view ('staff.information.edit', compact(['information']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, information $information, $id)
    {
        $updateInformation = Information::findOrFail($id);
        $updateInformation-> inf_title          = $request -> inf_title;
        $updateInformation-> inf_content        = $request -> inf_content;
        $updateInformation->save();

        Alert::success('Berhasil Mengedit', 'Pengumuman Berhasil Diedit');
        return redirect('/staff/information');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(information $information, $id)
    {
        $destroyInformation = Information::findOrFail($id);
        $destroyInformation->delete();

        Alert::success('Berhasil Menghapus', 'Pengumuman Berhasil Dihapus');
        return redirect('/staff/information');
    }
}
