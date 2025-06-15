<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\HomeroomTeacherController;
use App\Http\Controllers\student\PpdbStudentController;
use App\Http\Controllers\ApproveStudentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\StaffAccountController;
use App\Http\Controllers\StaffDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin', function () {
    return '<h1>Ini halaman admin</h2>';
})->middleware('role:staff');

Route::get('/teacher', function () {
    return '<h1>Ini halaman guru</h1>';
})->middleware('role:teacher');




// <!-- ---------------------------------- -->
// <!-- WEB PROFILE -->
// <!-- ---------------------------------- -->
//webprofile
Route::get('/webprofile', function() {
    return view('webprofile');
})->name('webprofile');

// <!-- ---------------------------------- -->
// <!-- STAFF -->
// <!-- ---------------------------------- -->

// <!-- Home -->
//staff.dashboard
Route::middleware(['auth', 'role:staff'])->group(function () {
Route::get('/staff', [StaffDashboardController::class, 'index'])->name('staff');


// <!-- PPDB -->
//staff.approve_student
Route::get('/staff/approve_student', [ApproveStudentController::Class, 'index'])->name('staff.approve_student');
Route::post('/staff/store_with_parent', [PpdbStudentController::class, 'store_with_parent'])->name('store_with_parent');


//staff.pengumuman
Route::get('/staff/information', [InformationController::Class, 'index'])->name('staff.information.index');
Route::get('/staff/information/create', [InformationController::Class, 'create'])->name('staff.information.create');
Route::post('/staff/information/create', [InformationController::Class, 'store'])->name('staff.information.store');
Route::get('/staff/information/{id}/edit', [InformationController::Class, 'edit'])->name('staff.information.edit');
Route::post('/staff/information/{id}/edit', [InformationController::Class, 'update'])->name('staff.information.edit');
Route::delete('/staff/information/{id}/destroy', [InformationController::Class, 'destroy'])->name('staff.information.destroy');
//

//staff.semester
Route::get('/staff/semester', [SemesterController::Class, 'index'])->name('staff.semester');
Route::get('/staff/semester/create', [SemesterController::Class, 'create'])->name('staff.semester.create');
Route::post('/staff/semester/create', [SemesterController::Class, 'store'])->name('staff.semester.store');
Route::get('/staff/semester/{id}/edit', [SemesterController::Class, 'edit'])->name('staff.semester.edit');
Route::post('/staff/semester/{id}/edit', [SemesterController::Class, 'update'])->name('staff.semester.edit');
Route::delete('/staff/semester/{id}/destroy', [SemesterController::Class, 'destroy'])->name('staff.semester.destroy');

// <!-- Akademik -->
//staff.classes
Route::get('/staff/classes', [ClassesController::Class, 'index'])->name('staff.classes');
Route::get('/staff/classes/create', [ClassesController::Class, 'create'])->name('staff.classes.create');
Route::post('/staff/classes/create', [ClassesController::Class, 'store'])->name('staff.classes.store');
Route::get('/staff/classes/{id}/edit', [ClassesController::Class, 'edit'])->name('staff.classes.edit');
Route::post('/staff/classes/{id}/edit', [ClassesController::Class, 'update'])->name('staff.classes.edit');
Route::delete('/staff/classes/{id}/destroy', [ClassesController::Class, 'destroy'])->name('staff.classes.destroy');

//staff. subject
Route::get('/staff/subject', [SubjectController::Class, 'index'])->name('staff.subject');
Route::get('/staff/subject/create', [SubjectController::Class, 'create'])->name('staff.subject.create');
Route::post('/staff/subject/create', [SubjectController::Class, 'store'])->name('staff.subject.store');
Route::get('/staff/subject/{id}/edit', [SubjectController::Class, 'edit'])->name('staff.subject.edit');
Route::post('/staff/subject/{id}/edit', [SubjectController::Class, 'update'])->name('staff.subject.edit');
Route::delete('/staff/subject/{id}/destroy', [SubjectController::Class, 'destroy'])->name('staff.subject.destroy');

//staff.homeroom_teacher
Route::get('/staff/homeroom_teacher', [HomeroomTeacherController::Class, 'index'])->name('staff.homeroom_teacher');
Route::get('/staff/homeroom_teacher/create', [HomeroomTeacherController::Class, 'create'])->name('staff.homeroom_teacher.create');
Route::post('/staff/homeroom_teacher/create', [HomeroomTeacherController::Class, 'store'])->name('staff.homeroom_teacher.store');
Route::get('/staff/homeroom_teacher/{id}/edit', [HomeroomTeacherController::Class, 'edit'])->name('staff.homeroom_teacher.edit');
Route::post('/staff/homeroom_teacher/{id}/edit', [HomeroomTeacherController::Class, 'update'])->name('staff.homeroom_teacher.edit');
Route::delete('/staff/homeroom_teacher/{id}/destroy', [HomeroomTeacherController::Class, 'destroy'])->name('staff.homeroom_teacher.destroy');

//staff. schedule
Route::get('/staff/schedule', [ScheduleController::Class, 'index'])->name('staff.schedule');
Route::get('/staff/schedule/create', [ScheduleController::Class, 'create'])->name('staff.schedule.create');
Route::post('/staff/schedule/create', [ScheduleController::Class, 'store'])->name('staff.schedule.store');
Route::get('/staff/schedule/{id}/edit', [ScheduleController::Class, 'edit'])->name('staff.schedule.edit');
Route::post('/staff/schedule/{id}/edit', [ScheduleController::Class, 'update'])->name('staff.schedule.edit');
Route::delete('/staff/schedule/{id}/destroy', [ScheduleController::Class, 'destroy'])->name('staff.schedule.destroy');
//


// <!-- Data Pengguna -->
//staff.student
Route::get('/staff/student', [StudentController::Class, 'index'])->name('staff.student');
Route::get('/staff/student/create', [StudentController::Class, 'create'])->name('staff.student.create');
Route::post('/staff/student/create', [StudentController::Class, 'store'])->name('staff.student.store');
Route::get('/staff/student/{id}/edit', [StudentController::Class, 'edit'])->name('staff.student.edit');
Route::post('/staff/student/{id}/edit', [StudentController::Class, 'update'])->name('staff.student.edit');
Route::delete('/staff/student/{id}/destroy', [StudentController::Class, 'destroy'])->name('staff.student.destroy');
Route::get('/staff/student/{id}/detail', [StudentController::Class, 'detail'])->name('staff.student');

//staff. teacher
Route::get('/staff/teacher', [TeacherController::Class, 'index'])->name('staff.teacher');
Route::get('/staff/teacher/create', [TeacherController::Class, 'create'])->name('staff.teacher.create');
Route::post('/staff/teacher/create', [TeacherController::Class, 'store'])->name('staff.teacher.store');
Route::get('/staff/teacher/{id}/edit', [TeacherController::Class, 'edit'])->name('staff.teacher.edit');
Route::post('/staff/teacher/{id}/edit', [TeacherController::Class, 'update'])->name('staff.teacher.edit');
Route::delete('/staff/teacher/{id}/destroy', [TeacherController::Class, 'destroy'])->name('staff.teacher.destroy');
Route::get('/staff/teacher/{id}/detail', [TeacherController::Class, 'detail'])->name('staff.teacher');


// <!-- Laporan -->
//staff.
Route::get('/staff/staff_account', [StaffAccountController::class, 'index'])->name('staff.staff_account.index');
Route::get('/staff/staff_account/create', [StaffAccountController::class, 'create'])->name('staff.staff_account.create');
Route::post('/staff/staff_account/create', [StaffAccountController::class, 'store'])->name('staff.staff_account.store');
Route::delete('/staff/teacher/{id}/destroy', [StaffAccountController::Class, 'destroy'])->name('staff.staff_account.destroy');


//staff akun staff
Route::get('/staff/management', [StaffController::Class, 'index'])->name('staff.management.index');
Route::get('/staff/management/create', [StaffController::Class, 'create'])->name('staff.management.create');
Route::post('/staff/management/create', [StaffController::Class, 'store'])->name('staff.management.store');
Route::get('/staff/management/{id}/edit', [StaffController::Class, 'edit'])->name('staff.management.edit');
Route::post('/staff/management/{id}/edit', [StaffController::Class, 'update'])->name('staff.management.edit');
Route::delete('/staff/management/{id}/destroy', [StaffController::Class, 'destroy'])->name('staff.management.destroy');
Route::get('/staff/management/{id}/detail', [StaffController::Class, 'detail'])->name('staff.management');
});


// <!-- ---------------------------------- -->
// <!-- TEACHER -->
// <!-- ---------------------------------- -->


// <!-- ---------------------------------- -->
// <!-- STUDENT -->
// <!-- ---------------------------------- -->
//student.dashboard
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');



//student.ppdb_student - Data Diri
Route::middleware(['auth', 'role:student'])->group(function () {
Route::get('/student/Ppdb_Student/create', [PpdbStudentController::Class, 'create'])->name('student.Ppdb_Student.create');
Route::post('/student/Ppdb_Student/create', [PpdbStudentController::Class, 'store'])->name('student.Ppdb_Student.store');
Route::resource('approve_student', ApproveStudentController::class);
Route::get('/staff/approve_student/{id}/detail', [ApproveStudentController::Class, 'detail'])->name('staff.approve_student');

//student.ppdb_parent - Data Orangtua
Route::post('/staff/ppdb_parent', [PpdbStudentController::class, 'store_parent'])->name('ppdb_parent.store');
Route::get('/student/Ppdb_Student/create_parent', [PpdbStudentController::Class, 'create_parent'])->name('student.Ppdb_Student.create_parent');
Route::post('/student/Ppdb_Student/create_parent', [PpdbStudentController::Class, 'store_parent'])->name('student.Ppdb_Student.create_parent');
});
});
