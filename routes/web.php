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
use App\Http\Controllers\ApproveStudentController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\StaffAccountController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\CurriculumAccountController;
use App\Http\Controllers\MadrasahHeadAccountController;
use App\Http\Controllers\TeacherAccountController;
use App\Http\Controllers\StaffReportController;
use App\Http\Controllers\Teacher\GradeController;
use App\Http\Controllers\Teacher\TeacherScheduleController;
use App\Http\Controllers\Teacher\AttendanceController;
use App\Http\Controllers\Teacher\ReportController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\student\PpdbStudentController;
use App\Http\Controllers\Student\StudentScheduleController;
use App\Http\Controllers\Student\StudentGradeController;
use App\Http\Controllers\Student\StudentReportController;
use App\Http\Controllers\Student\StudentProfileController;



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
    return '';
})->middleware('role:teacher');

Route::get('/curriculum', function () {
    return '';
})->middleware('role:curriculum');




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
// Route::middleware(['auth', 'role:staff'])->group(function () {
// Route::get('/staff', [StaffDashboardController::class, 'index'])->name('staff');

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');


// <!-- PPDB -->


Route::get('/staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');

//staff.approve_student
Route::resource('approve_student', ApproveStudentController::class);
Route::get('/staff/approve_student/{id}/detail', [ApproveStudentController::class, 'detail'])->name('staff.approve_student');
Route::get('/staff/approve_student/{id}/verification', [ApproveStudentController::class, 'verification'])->name('staff.approve_student');
Route::get('/approve-student/verification/{id}/{status}', [ApproveStudentController::class, 'verification'])->name('approve_student.verification');

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
// Route::get('/staff/schedule', [ScheduleController::class, 'index'])->name('staff.schedule');
// Route::get('/staff/schedule/create', [ScheduleController::class, 'create'])->name('staff.schedule.create');
// Route::post('/staff/schedule/create', [ScheduleController::class, 'store'])->name('staff.schedule.store');
// Route::get('/staff/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('staff.schedule.edit');
// Route::post('/staff/schedule/{id}/edit', [ScheduleController::class, 'update'])->name('staff.schedule.edit');
// Route::delete('/staff/schedule/{id}/destroy', [ScheduleController::class, 'destroy'])->name('staff.schedule.destroy');


// <!-- Data Pengguna -->
//staff.student
Route::get('/staff/student', [StudentController::class, 'index'])->name('staff.student');
Route::get('/staff/student/create', [StudentController::class, 'create'])->name('staff.student.create');
Route::post('/staff/student/create', [StudentController::class, 'store'])->name('staff.student.store');
Route::get('/staff/student/{id}/edit', [StudentController::class, 'edit'])->name('staff.student.edit');
Route::get('/staff/student/{id}/edit_parent', [StudentController::class, 'edit_parent'])->name('staff.student.edit_parent');
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

// Membuat Akun Kurikulum
Route::get('/staff/curriculum_account', [CurriculumAccountController::class, 'index'])->name('staff.curriculum_account.index');
Route::get('/staff/curriculum_account/create', [CurriculumAccountController::class, 'create'])->name('staff.curriculum_account.create');
Route::post('/staff/curriculum_account/create', [CurriculumAccountController::class, 'store'])->name('staff.curriculum_account.store');
Route::post('/staff/curriculum_account/{id}/edit', [CurriculumAccountController::class, 'update'])->name('staff.curriculum_account.edit');
Route::get('/staff/curriculum_account/{id}/edit', [CurriculumAccountController::class, 'edit'])->name('staff.curriculum_account.edit');
Route::delete('/staff/curriculum_account/{id}/destroy', [CurriculumAccountController::class, 'destroy'])->name('staff.curriculum_account.destroy');

// Membuat Akun Kepala Madrassah
Route::get('/staff/madrasah_head_account', [MadrasahHeadAccountController::class, 'index'])->name('staff.madrasah_head_account.index');
Route::get('/staff/madrasah_head_account/create', [MadrasahHeadAccountController::class, 'create'])->name('staff.madrasah_head_account.create');
Route::post('/staff/madrasah_head_account/create', [MadrasahHeadAccountController::class, 'store'])->name('staff.madrasah_head_account.store');
Route::post('/staff/madrasah_head_account/{id}/edit', [MadrasahHeadAccountController::class, 'update'])->name('staff.madrasah_head_account.edit');
Route::get('/staff/madrasah_head_account/{id}/edit', [MadrasahHeadAccountController::class, 'edit'])->name('staff.madrasah_head_account.edit');
Route::delete('/staff/madrasah_head_account/{id}/destroy', [MadrasahHeadAccountController::class, 'destroy'])->name('staff.madrasah_head_account.destroy');

//laporan nilai
Route::get('/staff/reports', [StaffReportController::class, 'index'])->name('staff.report.index');
Route::get('/staff/reports/print/{student}/{semester}', [StaffReportController::class, 'print'])->name('staff.report.print');

});


// <!-- ---------------------------------- -->
// <!-- TEACHER -->
// <!-- ---------------------------------- -->
// Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');

     //profile guru
    Route::get('/teacher/profile', [TeacherProfileController::class, 'index'])->name('teacher.profile');

     //jadwal mengajar guru dan wali kelas
    Route::get('/teacher/schedule', [TeacherScheduleController::class, 'index'])->name('teacher.schedule.index');

    Route::get('/teacher/grade', [GradeController::class, 'index'])->name('teacher.grades.index');
    Route::get('/teacher/grade/create', [GradeController::class, 'create'])->name('teacher.grades.create');
    Route::post('/teacher/grade/store', [GradeController::class, 'store'])->name('teacher.grades.store');

    Route::get('/teacher/attendance', [AttendanceController::class, 'index'])->name('teacher.attendance.index');
    Route::get('/teacher/attendance/create', [AttendanceController::class, 'create'])->name('teacher.attendance.create');
    Route::post('/teacher/attendance/store', [AttendanceController::class, 'store'])->name('teacher.attendance.store');
    Route::get('/teacher/attendance/{id}/edit', [AttendanceController::class, 'edit'])->name('teacher.attendance.edit');
    Route::put('/teacher/attendance/{id}/update', [AttendanceController::class, 'update'])->name('teacher.attendance.update');


    Route::get('/teacher/reports', [ReportController::class, 'index'])->name('teacher.reports.index');
    Route::get('/teacher/reports/{studentId}', [ReportController::class, 'show'])->name('teacher.reports.show');
    Route::get('/teacher/reports/print/{student}/{semester}', [ReportController::class, 'print'])->name('teacher.report.print');

});



// <!-- ---------------------------------- -->
// <!-- STUDENT -->
// <!-- ---------------------------------- -->
//student.dashboard
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('/student/dashboard');
    })->name('student.dashboard');

    //kalau mau dirubah alurnya di app/HTTP/Controllers/Auth/Aunthenticade

//student.ppdb_student - Data Diri
Route::middleware(['auth', 'role:student'])->group(function () {
    //profile siswa
    Route::get('/student/profile', [StudentProfileController::class, 'index'])->name('student.profile');

Route::get('/student/Ppdb_Student/create', [PpdbStudentController::class, 'create'])->name('student.Ppdb_Student.create');
Route::post('/student/Ppdb_Student/create', [PpdbStudentController::class, 'store'])->name('student.Ppdb_Student.store');


//student.ppdb_parent - Data Orangtua
Route::post('/staff/ppdb_parent', [PpdbStudentController::class, 'store_parent'])->name('ppdb_parent.store');
Route::get('/student/Ppdb_Student/create_parent', [PpdbStudentController::class, 'create_parent'])->name('student.Ppdb_Student.create_parent');
Route::post('/student/Ppdb_Student/create_parent', [PpdbStudentController::class, 'store_parent'])->name('student.Ppdb_Student.create_parent');

// Menampilkan form upload KK
Route::get('/student/Ppdb_Student/upload/{id}', [PpdbStudentController::class, 'uploadForm'])->name('student.uploadForm');
Route::post('/student/Ppdb_Student/upload/{id}', [PpdbStudentController::class, 'uploadKK'])->name('student.uploadKK');


Route::get('/student/Ppdb_Student/confirmation', [PpdbStudentController::class, 'confirmation'])->name('student.Ppdb_Student.confirmation');

    //siswa melihat jadwal pelajaran 
    Route::get('/student/schedule', [StudentScheduleController::class, 'index'])->name('student.schedule.index');

    Route::get('/student/grades', [StudentGradeController::class, 'index'])->name('student.grade.index');

    Route::get('/student/reports', [StudentReportController::class, 'index'])->name('student.reports.index');
    Route::get('/student/reports/print/{student}/{semester}', [StudentReportController::class, 'print'])->name('student.report.print');

});
});

// <!-- ---------------------------------- -->
// <!-- CURRICULUM -->
// <!-- ---------------------------------- -->
//curriculum.dashboard
Route::middleware(['auth', 'role:curriculum'])->group(function () {
    Route::get('/curriculum/dashboard', function () {
        return view('/curriculum/dashboard');
    })->name('curriculum.dashboard');

    //curriculum. schedule
    Route::get('/curriculum/schedule', [ScheduleController::class, 'index'])->name('curriculum.schedule');
    Route::get('/curriculum/schedule/create', [ScheduleController::class, 'create'])->name('curriculum.schedule.create');
    Route::post('/curriculum/schedule/create', [ScheduleController::class, 'store'])->name('curriculum.schedule.store');
    Route::get('/curriculum/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('curriculum.schedule.edit');
    Route::post('/curriculum/schedule/{id}/edit', [ScheduleController::class, 'update'])->name('curriculum.schedule.edit');
    Route::delete('/curriculum/schedule/{id}/destroy', [ScheduleController::class, 'destroy'])->name('curriculum.schedule.destroy');
});

// <!-- ---------------------------------- -->
// <!-- MADRASAH HEAD -->
// <!-- ---------------------------------- -->
//curriculum.dashboard
Route::middleware(['auth', 'role:madrasah_head'])->group(function () {
    Route::get('/madrasah_head/dashboard', function () {
        return view('/madrasah_head/dashboard');
    })->name('madrasah_head.dashboard');
    
});




