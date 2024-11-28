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

//admin
Route::get('/admin/ppdb', [PpdbController::Class, 'index'])->name('ppdb');

Route::get('/admin/classes', [ClassesController::Class, 'index'])->name('admin.classes');
Route::get('/admin/classes/create', [ClassesController::Class, 'create'])->name('admin.classes.create');
Route::post('/admin/classes/create', [ClassesController::Class, 'store'])->name('admin.classes.store');
Route::get('/admin/classes/{id}/edit', [ClassesController::Class, 'edit'])->name('admin.classes.edit');
Route::post('/admin/classes/{id}/edit', [ClassesController::Class, 'update'])->name('admin.classes.edit');
Route::get('/admin/classes/{id}/destroy', [ClassesController::Class, 'destroy'])->name('admin.classes.destroy');
