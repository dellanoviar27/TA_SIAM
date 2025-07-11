<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\HomeroomTeacherController;
use App\Http\Controllers\student\PpdbStudentController;
use App\Http\Controllers\ApproveStudentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\StaffAccountController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\Teacher\GradeController;
use App\Http\Controllers\TeacherAccountController;


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

// Route::middleware(['auth', 'role:student'])->group(function () {
//     Route::get('/student/dashboard', function () {
//         return view('student.dashboard');
//     })->name('student.dashboard');



// <!-- PPDB -->
//staff.approve_student
Route::get('/staff/approve_student/{id}/verifikasi', [ApproveStudentController::class, 'verifikasi'])->name('approve_student.verifikasi');
Route::get('/staff/approve_student', [ApproveStudentController::class, 'index'])->name('staff.approve_student');
// Route::get('/approve-student/{id}', [ApproveStudentController::class, 'show'])->name('approve_student.show');
Route::post('/staff/store_with_parent', [PpdbStudentController::class, 'store_with_parent'])->name('store_with_parent');


//staff.pengumuman
Route::get('/staff/information', [InformationController::class, 'index'])->name('staff.information.index');
Route::get('/staff/information/create', [InformationController::class, 'create'])->name('staff.information.create');
Route::post('/staff/information/create', [InformationController::class, 'store'])->name('staff.information.store');
Route::get('/staff/information/{id}/edit', [InformationController::class, 'edit'])->name('staff.information.edit');
Route::post('/staff/information/{id}/edit', [InformationController::class, 'update'])->name('staff.information.edit');
Route::delete('/staff/information/{id}/destroy', [InformationController::class, 'destroy'])->name('staff.information.destroy');
//

//staff.semester
Route::get('/staff/semester', [SemesterController::class, 'index'])->name('staff.semester');
Route::get('/staff/semester/create', [SemesterController::class, 'create'])->name('staff.semester.create');
Route::post('/staff/semester/create', [SemesterController::class, 'store'])->name('staff.semester.store');
Route::get('/staff/semester/{id}/edit', [SemesterController::class, 'edit'])->name('staff.semester.edit');
Route::post('/staff/semester/{id}/edit', [SemesterController::class, 'update'])->name('staff.semester.edit');
Route::delete('/staff/semester/{id}/destroy', [SemesterController::class, 'destroy'])->name('staff.semester.destroy');

// <!-- Akademik --c
//staff.classes
Route::get('/staff/classes', [ClassesController::class, 'index'])->name('staff.classes');
Route::get('/staff/classes/create', [ClassesController::class, 'create'])->name('staff.classes.create');
Route::post('/staff/classes/create', [ClassesController::class, 'store'])->name('staff.classes.store');
Route::get('/staff/classes/{id}/edit', [ClassesController::class, 'edit'])->name('staff.classes.edit');
Route::post('/staff/classes/{id}/edit', [ClassesController::class, 'update'])->name('staff.classes.edit');
Route::delete('/staff/classes/{id}/destroy', [ClassesController::class, 'destroy'])->name('staff.classes.destroy');

//staff.class_student
// Route::get('class-student', [ClassStudentController::class, 'index'])->name('class-student.index');
// Route::post('class-student', [ClassStudentController::class, 'store'])->name('class-student.store');
// Route::delete('class-student/{class_student}', [ClassStudentController::class, 'destroy'])->name('class-student.destroy');
Route::resource('staff/class-student', ClassStudentController::class)->names([
    'index' => 'class-student.index',
    'store' => 'class-student.store',
    'destroy' => 'class-student.destroy',
]);
Route::post('/staff/class-student/promote', [ClassStudentController::class, 'promote'])->name('class-student.promote');

//staff. subject
Route::get('/staff/subject', [SubjectController::class, 'index'])->name('staff.subject');
Route::get('/staff/subject/create', [SubjectController::class, 'create'])->name('staff.subject.create');
Route::post('/staff/subject/create', [SubjectController::class, 'store'])->name('staff.subject.store');
Route::get('/staff/subject/{id}/edit', [SubjectController::class, 'edit'])->name('staff.subject.edit');
Route::post('/staff/subject/{id}/edit', [SubjectController::class, 'update'])->name('staff.subject.edit');
Route::delete('/staff/subject/{id}/destroy', [SubjectController::class, 'destroy'])->name('staff.subject.destroy');

//staff.homeroom_teacher
Route::get('/staff/homeroom_teacher', [HomeroomTeacherController::class, 'index'])->name('staff.homeroom_teacher');
Route::get('/staff/homeroom_teacher/create', [HomeroomTeacherController::class, 'create'])->name('staff.homeroom_teacher.create');
Route::post('/staff/homeroom_teacher/create', [HomeroomTeacherController::class, 'store'])->name('staff.homeroom_teacher.store');
Route::get('/staff/homeroom_teacher/{id}/edit', [HomeroomTeacherController::class, 'edit'])->name('staff.homeroom_teacher.edit');
Route::post('/staff/homeroom_teacher/{id}/edit', [HomeroomTeacherController::class, 'update'])->name('staff.homeroom_teacher.edit');
Route::delete('/staff/homeroom_teacher/{id}/destroy', [HomeroomTeacherController::class, 'destroy'])->name('staff.homeroom_teacher.destroy');

//staff. schedule
Route::get('/staff/schedule', [ScheduleController::class, 'index'])->name('staff.schedule');
Route::get('/staff/schedule/create', [ScheduleController::class, 'create'])->name('staff.schedule.create');
Route::post('/staff/schedule/create', [ScheduleController::class, 'store'])->name('staff.schedule.store');
Route::get('/staff/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('staff.schedule.edit');
Route::post('/staff/schedule/{id}/edit', [ScheduleController::class, 'update'])->name('staff.schedule.edit');
Route::delete('/staff/schedule/{id}/destroy', [ScheduleController::class, 'destroy'])->name('staff.schedule.destroy');


// <!-- Data Pengguna -->
//staff.student
Route::get('/staff/student', [StudentController::class, 'index'])->name('staff.student');
Route::get('/staff/student/create', [StudentController::class, 'create'])->name('staff.student.create');
Route::post('/staff/student/create', [StudentController::class, 'store'])->name('staff.student.store');
Route::get('/staff/student/{id}/edit', [StudentController::class, 'edit'])->name('staff.student.edit');
Route::post('/staff/student/{id}/edit', [StudentController::class, 'update'])->name('staff.student.edit');
Route::delete('/staff/student/{id}/destroy', [StudentController::class, 'destroy'])->name('staff.student.destroy');
Route::get('/staff/student/{id}/detail', [StudentController::class, 'detail'])->name('staff.student');

//staff. teacher
Route::get('/staff/teacher', [TeacherController::class, 'index'])->name('staff.teacher');
Route::get('/staff/teacher/create', [TeacherController::class, 'create'])->name('staff.teacher.create');
Route::post('/staff/teacher/create', [TeacherController::class, 'store'])->name('staff.teacher.store');
Route::get('/staff/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('staff.teacher.edit');
Route::post('/staff/teacher/{id}/edit', [TeacherController::class, 'update'])->name('staff.teacher.edit');
Route::delete('/staff/teacher/{id}/destroy', [TeacherController::class, 'destroy'])->name('staff.teacher.destroy');
Route::get('/staff/teacher/{id}/detail', [TeacherController::class, 'detail'])->name('staff.teacher');

//staff.teacher_accout
Route::get('/staff/teacher_account', [TeacherAccountController::class, 'index'])->name('staff.teacher_account.index');
Route::get('/staff/teacher_account/create', [TeacherAccountController::class, 'create'])->name('staff.teacher_account.create');
Route::post('/staff/teacher_account/create', [TeacherAccountController::class, 'store'])->name('staff.teacher_account.store');
Route::post('/staff/teacher_account/{id}/edit', [TeacherAccountController::class, 'update'])->name('staff.teacher_account.edit');
Route::get('/staff/teacher_account/{id}/edit', [TeacherAccountController::class, 'edit'])->name('staff.teacher_account.edit');
Route::delete('/staff/teacher/{id}/destroy', [TeacherAccountController::class, 'destroy'])->name('staff.teacher_account.destroy');
Route::get('/staff/teacher_account/{id}/detail', [TeacherAccountController::class, 'show'])->name('staff.teacher_account.show');

//staff.
Route::get('/staff/staff_account', [StaffAccountController::class, 'index'])->name('staff.staff_account.index');
Route::get('/staff/staff_account/create', [StaffAccountController::class, 'create'])->name('staff.staff_account.create');
Route::post('/staff/staff_account/create', [StaffAccountController::class, 'store'])->name('staff.staff_account.store');
Route::post('/staff/staff_account/{id}/edit', [StaffAccountController::class, 'update'])->name('staff.staff_account.edit');
Route::get('/staff/staff_account/{id}/edit', [StaffAccountController::class, 'edit'])->name('staff.staff_account.edit');
Route::delete('/staff/staff_account/{id}/destroy', [StaffAccountController::class, 'destroy'])->name('staff.staff_account.destroy');
});


// <!-- ---------------------------------- -->
// <!-- TEACHER -->
// <!-- ---------------------------------- -->
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/grade', [GradeController::class, 'index'])->name('grades.index');
    Route::post('/grade', [GradeController::class, 'store'])->name('grades.store');
});



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
Route::get('/student/Ppdb_Student/create', [PpdbStudentController::class, 'create'])->name('student.Ppdb_Student.create');
Route::post('/student/Ppdb_Student/create', [PpdbStudentController::class, 'store'])->name('student.Ppdb_Student.store');

Route::resource('approve_student', ApproveStudentController::class);
Route::get('/staff/approve_student/{id}/detail', [ApproveStudentController::class, 'detail'])->name('staff.approve_student');
Route::get('/staff/approve_student/{id}/verification', [ApproveStudentController::class, 'verification'])->name('staff.approve_student');
Route::get('/approve-student/verification/{id}/{status}', [ApproveStudentController::class, 'verification'])->name('approve_student.verification');

//student.ppdb_parent - Data Orangtua
Route::post('/staff/ppdb_parent', [PpdbStudentController::class, 'store_parent'])->name('ppdb_parent.store');
Route::get('/student/Ppdb_Student/create_parent', [PpdbStudentController::class, 'create_parent'])->name('student.Ppdb_Student.create_parent');
Route::post('/student/Ppdb_Student/create_parent', [PpdbStudentController::class, 'store_parent'])->name('student.Ppdb_Student.create_parent');
});

});
