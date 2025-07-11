<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Student;

class Ppdb_Parent extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'parents';
    protected $primaryKey = 'prt_id';

    const CREATED_AT = 'prt_created_at';
    const UPDATED_AT = 'prt_updated_at';
    const DELETED_AT = 'prt_deleted_at';

    protected $fillable = [
        'prt_user_id',
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

    /**
     * Relasi ke data siswa berdasarkan prt_id di kolom std_parent_id
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'std_parent_id', 'prt_id');
    }

    /**
     * Relasi ke tabel users (akun siswa yang terhubung dengan orang tua)
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'prt_user_id', 'usr_id');
    }
}
