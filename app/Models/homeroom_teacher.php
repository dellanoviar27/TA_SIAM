<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class homeroom_teacher extends Model
{
    use HasFactory, SoftDeletes ;
    protected $primaryKey = 'hrt_id';
    protected $guarded = [];

    const CREATED_AT = 'hrt_created_at';
    const UPDATED_AT = 'hrt_updated_at';
    const DELETED_AT = 'hrt_deleted_at';

    public function class()
    {
    return $this->belongsTo(classes::class, 'hrt_class_id', 'cls_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'hrt_teacher_id', 'tch_id');
    }
}
