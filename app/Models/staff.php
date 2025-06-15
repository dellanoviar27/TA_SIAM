<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory, SoftDeletes ;

    protected $table = 'staff';
    protected $primaryKey = 'stf_id';
    protected $guarded = [];

    const CREATED_AT = 'stf_created_at';
    const UPDATED_AT = 'stf_updated_at';
    const DELETED_AT = 'stf_deleted_at';

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'stf_user_id', 'usr_id');
    }
}
