<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentProfileController extends Controller
{
    public function index()
    {
        $student = Student::with(['user', 'classes'])->where('std_user_id', Auth::id())->first();

        return view('student.profile', compact('student'));
    }
}
