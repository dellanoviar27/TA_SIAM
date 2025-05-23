<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
Use Alert;



class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        $title = 'Hapus Kelas!';
        $text = "Kelas Tidak Bisa Kembali Jika Dihapus";
        confirmDelete($title, $text);
        return view ('staff.classes.index', compact(['classes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('staff.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $createClasses = Classes::create([
            'cls_level'         =>  $request->cls_level,
            'cls_number'        =>  $request->cls_number,
            'cls_general_level' =>  $request->cls_general_level,
        ]);

        Alert::success('Berhasil Menambahkan', 'Kelas Berhasil Ditambahkan');
        return redirect('/staff/classes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $Classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $Classes, $id)
    {
        $Classes = Classes::findOrFail($id);
        return view ('staff.classes.edit', compact(['Classes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $Classes, $id)
    {
        $updateClasses = Classes::findOrFail($id);
        $updateClasses-> cls_level          = $request -> cls_level;
        $updateClasses-> cls_number         = $request -> cls_number;
        $updateClasses-> cls_general_level  = $request -> cls_general_level;
        $updateClasses->save();

        Alert::success('Berhasil Mengedit', 'Kelas Berhasil Diedit');
        return redirect('/staff/classes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $Classes, $id)
    {
        $destroyClasses = Classes::findOrFail($id);
        $destroyClasses->delete();

        Alert::success('Berhasil Menghapus', 'Kelas Berhasil Dihapus');
        return redirect('/staff/classes');
    }
}
