<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    // use SoftDeletes;

    protected $table = 'attendances';
    protected $primaryKey = 'att_id';

    protected $fillable = [
        'att_student_id',
        'att_class_id',
        'att_semester_id',
        'att_sick',
        'att_permission',
        'att_absence',
        'att_created_by',
        'att_updated_by',
        'att_deleted_by',
        'att_sys_note',
    ];

    protected $dates = ['deleted_at'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'att_student_id', 'std_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'att_class_id', 'cls_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'att_semester_id', 'smt_id');
    }
}
