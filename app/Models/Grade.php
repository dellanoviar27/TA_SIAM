<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'grd_id';

    protected $fillable = [
        'grd_student_id',
        'grd_class_id',
        'grd_semester_id',
        'grd_subject_id',
        'grd_teacher_id',
        'grd_katabah',
        'grd_kaifiyat',
        'grd_adab',
        'grd_predicate',
        'grd_sick',
        'grd_permission',
        'grd_absence',
    ];

    public $timestamps = false;
}
