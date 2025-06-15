<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('student')) {
            return redirect()->route('student.Ppdb_Student.create');
        } elseif ($user->hasRole('teacher')) {
            return redirect('/teacher');
        } elseif ($user->hasRole('staff')) {
            return redirect('/admin');
        } else {
            return abort(403, 'Unauthorized');
        }
    }
}
