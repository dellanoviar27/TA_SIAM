<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'class_students';
    protected $primaryKey = 'cst_id';
    public $timestamps = true;
    const CREATED_AT = 'cst_created_at';
    const UPDATED_AT = 'cst_updated_at';
    const DELETED_AT = 'cst_deleted_at';

    protected $fillable = [
        'cst_class_id',
        'cst_semester_id',
        'cst_student_id',
        // 'cst_teacher_id',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'cst_class_id', 'cls_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'cst_semester_id', 'smt_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'cst_student_id', 'std_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'cst_teacher_id', 'tcr_id');
    }
}
