<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class schedule extends Model
{
    use HasFactory, SoftDeletes ;
    protected $primaryKey = 'sch_id';
    protected $guarded = [];

    const CREATED_AT = 'sch_created_at';
    const UPDATED_AT = 'sch_updated_at';
    const DELETED_AT = 'sch_deleted_at';

    public function classes()
    {
    return $this->belongsTo(classes::class, 'sch_class_id', 'cls_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sch_subject_id', 'sbj_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'sch_teacher_id', 'tch_id');
    }

    public function semester()
    {
        return $this->belongsTo(semester::class, 'sch_semester_id', 'smt_id');
    }
}
