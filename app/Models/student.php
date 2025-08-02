<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $primaryKey = 'std_id';
    protected $guarded = [];

    const CREATED_AT = 'std_created_at';
    const UPDATED_AT = 'std_updated_at';
    const DELETED_AT = 'std_deleted_at';

    protected $fillable = [
        'std_nik', 'std_user_id', 'std_gender',
        'std_birth_place', 'std_birth_date', 'std_child_to',
        'std_number_of_siblings', 'std_address', 'std_date_registration',
        'std_school','std_formal_level', 'std_formal_grade','std_class_id', 'std_parent_id', 'std_nisn', 'std_status',  'std_kk_photo'
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'std_class_id', 'cls_id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'std_schedule_id', 'sch_id');
    }

    // public function parent()
    // {
    //     return $this->belongsTo(\App\Models\student\Ppdb_Parent::class, 'std_parent_id', 'prt_id');
    // }

    public function parent()
    {
        return $this->hasOne(\App\Models\Student\Ppdb_Parent::class, 'prt_user_id', 'std_user_id');
    }

    public function classStudents()
    {
        return $this->hasMany(ClassStudent::class, 'cst_student_id', 'std_id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'grd_student_id', 'std_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'std_user_id', 'usr_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'att_student_id', 'std_id');
    }

    public function class()
    {
        return $this->classes();
    }

   public function has_completed_all_data()
    {
        return $this->parent && $this->upload_file; // sesuaikan dengan relasi dan data kamu
    }

     // Helper untuk mengambil URL file KK
    public function getKkUrlAttribute()
    {
        return $this->std_kk_photo ? asset('storage/' . $this->std_kk_photo) : null;
    }
}
