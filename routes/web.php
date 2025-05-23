<?php

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



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/master', function(){
    return view('staff.profile.content');
});

Route::get('/login2', function () {
    return view('auth.login2');
});

// <!-- ---------------------------------- -->
// <!-- STAFF -->
// <!-- ---------------------------------- -->
// <!-- Home -->
//staff.pengumuman

// <!-- PPDB -->
//staff.approve_student
Route::get('/staff/approve_student', [ApproveStudentController::Class, 'index'])->name('staff.approve_student');

Route::middleware(['auth', 'role:staff'])->group(function () {
Route::get('/students/pending', [StudentController::class, 'pending'])->name('students.pending');
Route::post('/students/{id}/approve', [StudentController::class, 'approve'])->name('students.approve');
Route::post('/students/{id}/reject', [StudentController::class, 'reject'])->name('students.reject');
});

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
//

// <!-- ---------------------------------- -->
// <!-- TEACHER -->
// <!-- ---------------------------------- -->


// <!-- ---------------------------------- -->
// <!-- STUDENT -->
// <!-- ---------------------------------- -->
//student.Ppdb_Student
Route::get('/student/Ppdb_Student', [PpdbStudentController::Class, 'index'])->name('student.Ppdb_Student');
Route::get('/student/Ppdb_Student/create', [PpdbStudentController::Class, 'create'])->name('student.Ppdb_Student.create');
Route::post('/student/Ppdb_Student/create', [PpdbStudentController::Class, 'store'])->name('student.Ppdb_Student.store');
Route::get('/student/Ppdb_Student/create_parent', [PpdbStudentController::Class, 'create_parent'])->name('student.Ppdb_Student.create_parent');
Route::get('/student/Ppdb_Student/create_parent', [PpdbStudentController::Class, 'store_parent'])->name('student.Ppdb_Student.create_parent');









//staff.ppdb
Route::get('/student/ppdb', [PpdbController::Class, 'index'])->name('student.ppdb');
Route::post('/student/ppdb/create', [PpdbController::Class, 'store'])->name('student.ppdbs.store');
Route::get('/student/ppdb/{id}/edit', [PpdbController::Class, 'edit'])->name('student.ppdb.edit');
Route::post('/student/ppdb/{id}/edit', [PpdbController::Class, 'update'])->name('student.ppdb.edit');
Route::delete('/student/ppdb/{id}/destroy', [PpdbController::Class, 'destroy'])->name('student.ppdb.destroy');

//staff.ppdb_approval
Route::get('/staff/ppdb_approval', [TeacherController::Class, 'index'])->name('staff.ppdb_approval');
Route::get('/staff/ppdb_approval/create', [TeacherController::Class, 'create'])->name('staff.ppdb_approval.create');
Route::post('/staff/ppdb_approval/create', [TeacherController::Class, 'store'])->name('staff.ppdb_approval.store');
Route::get('/staff/ppdb_approval/{id}/edit', [TeacherController::Class, 'edit'])->name('staff.ppdb_approval.edit');
Route::post('/staff/ppdb_approval/{id}/edit', [TeacherController::Class, 'update'])->name('staff.ppdb_approval.edit');
Route::delete('/staff/ppdb_approval/{id}/destroy', [TeacherController::Class, 'destroy'])->name('staff.ppdb_approval.destroy');
