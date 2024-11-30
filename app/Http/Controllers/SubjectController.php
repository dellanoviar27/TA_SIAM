<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
Use Alert;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::all();
        return view ('admin.subject.index', compact(['subject']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject)
    {
        //
    }
}
