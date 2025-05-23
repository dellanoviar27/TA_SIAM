<?php

namespace App\Models\student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class parented extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'parents';
    protected $primaryKey = 'prt_id';
    protected $guarded = [];

    const CREATED_AT = 'prt_created_at';
    const UPDATED_AT = 'prt_updated_at';
    const DELETED_AT = 'prt_deleted_at';
}
