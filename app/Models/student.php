<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'students';
    protected $primaryKey = 'std_id';
    protected $guarded = [];

    const CREATED_AT = 'std_created_at';
    const UPDATED_AT = 'std_updated_at';
    const DELETED_AT = 'std_deleted_at';

    protected $fillable = [
        'std_nik',
        'std_user_id',
        'std_name',
        'std_gender',
        'std_birth_place',
        'std_birth_date',
        'std_child_to',
        'std_number_of_siblings',
        'std_address',
        'std_date_registration',
        'std_school',
        'std_class_id',
        'std_parent_id',
        'std_nisn',
        'std_pictures',
        'std_status',
        'std_ppdb_notes',
        'std_re-registration',
        'std_registration_notes'
    ];

     public function classes()
    {
        return $this->belongsTo(Classes::class, 'std_class_id', 'cls_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'std_schedule_id', 'sch_id');
    }

     public function parent()
    {
    return $this->belongsTo(Parent::class, 'std_parent_id', 'prt_id');
    }
}
