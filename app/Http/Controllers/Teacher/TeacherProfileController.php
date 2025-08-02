<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;

class TeacherProfileController extends Controller
{
    public function index()
    {
        $teacher = Teacher::with('user')->where('tch_user_id', Auth::id())->first();

        return view('teacher.profile', compact('teacher'));
    }
}
