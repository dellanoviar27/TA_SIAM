<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        // dd($classes);
        return view ('admin.classes.index', compact(['classes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $createClasses = Classes::create([
            'cls_level'    =>  $request->cls_level,
            'cls_letter'    =>  $request->cls_letter,
            // 'cls_homeroom'    =>  $request->cls_homeroom
        ]);

        return redirect('/admin/classes');
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
        $Classes = Classes::findOrFail($id) -> first();
        return view ('admin.classes.edit', compact(['Classes']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $Classes, $id)
    {
        $updateClasses = Classes::findOrFail($id);
        // dd ($destroyClasses);
        $updateClasses-> cls_level = $request -> cls_level;
        $updateClasses-> cls_letter = $request -> cls_letter;
        $updateClasses-> cls_homeroom = $request -> cls_homeroom;
        $updateClasses->save();
        return redirect('/admin/classes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $Classes, $id)
    {
        $destroyClasses = Classes::findOrFail($id);
        // dd ($destroyClasses);
        $destroyClasses->delete();
        return redirect('/admin/classes');
    }
}
