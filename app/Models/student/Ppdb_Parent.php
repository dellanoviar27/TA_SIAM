<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ppdb_Parent extends Model
{

    use HasFactory, SoftDeletes ;
    protected $table = 'parents';
    protected $primaryKey = 'prt_id';
    protected $guarded = [];

    const CREATED_AT = 'prt_created_at';
    const UPDATED_AT = 'prt_updated_at';
    const DELETED_AT = 'prt_deleted_at';

    // public function student()
    // {
    //     return $this->belongsTo(Student::class, 'student_id');
    // }

    protected $fillable = [
        'prt_father',
        'prt_status_father',
        'prt_address_father',
        'prt_job_father',
        'prt_income_father',
        'prt_mother',
        'prt_status_mother',
        'prt_address_mother',
        'prt_job_mother',
        'prt_income_mother',
        'prt_guardian',
        'prt_address_guardian',
        'prt_job_guardian',
        'prt_income_guardian',
        'prt_parent_phone'
    ];

    public function students()
    {
    return $this->hasMany(Student::class, 'std_parent_id', 'prt_id');
    }
}