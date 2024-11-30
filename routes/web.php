<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ClassesController;


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
    return view('admin.profile.content');
});

Route::get('/login2', function () {
    return view('auth.login2');
});


//admin.ppdb
Route::get('/admin/ppdb', [PpdbController::Class, 'index'])->name('ppdb');

//admin. classes
Route::get('/admin/classes', [ClassesController::Class, 'index'])->name('admin.classes');
Route::get('/admin/classes/create', [ClassesController::Class, 'create'])->name('admin.classes.create');
Route::post('/admin/classes/create', [ClassesController::Class, 'store'])->name('admin.classes.store');
Route::get('/admin/classes/{id}/edit', [ClassesController::Class, 'edit'])->name('admin.classes.edit');
Route::post('/admin/classes/{id}/edit', [ClassesController::Class, 'update'])->name('admin.classes.edit');
Route::delete('/admin/classes/{id}/destroy', [ClassesController::Class, 'destroy'])->name('admin.classes.destroy');

//admin. subject
Route::get('/admin/subject', [SubjectController::Class, 'index'])->name('admin.subject');
Route::get('/admin/subject/create', [SubjectController::Class, 'create'])->name('admin.subject.create');
Route::post('/admin/subject/create', [SubjectController::Class, 'store'])->name('admin.subject.store');
Route::get('/admin/subject/{id}/edit', [SubjectController::Class, 'edit'])->name('admin.subject.edit');
Route::post('/admin/subject/{id}/edit', [SubjectController::Class, 'update'])->name('admin.subject.edit');
Route::delete('/admin/subject/{id}/destroy', [SubjectController::Class, 'destroy'])->name('admin.subject.destroy');