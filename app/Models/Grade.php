<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    // use SoftDeletes;

    protected $table = 'grades';
    protected $primaryKey = 'grd_id';

    protected $fillable = [
        'grd_student_id',
        'grd_class_id',
        'grd_semester_id',
        'grd_subject_id',
        'grd_teacher_id',
        'grd_knowledge',
        'grd_practice',
        'grd_attitude',
        'grd_average',
        'grd_predicate',
        'grd_passed',
        'grd_sick',
        'grd_permission',
        'grd_absence',
        'grd_created_by',
        'grd_updated_by',
        'grd_deleted_by',
        'grd_sys_note',
    ];

    protected $dates = ['grd_deleted_at'];

    // RELASI
    public function student()
    {
        return $this->belongsTo(Student::class, 'grd_student_id', 'std_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'grd_class_id', 'cls_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'grd_semester_id', 'smt_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'grd_subject_id', 'sbj_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'grd_teacher_id', 'tch_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'grd_created_by', 'usr_id');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'grd_updated_by', 'usr_id');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'grd_deleted_by', 'usr_id');
    }
}
