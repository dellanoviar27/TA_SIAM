<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class teacher extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'teachers';
    protected $primaryKey = 'tch_id';
    protected $guarded = [];

    const CREATED_AT = 'tch_created_at';
    const UPDATED_AT = 'tch_updated_at';
    const DELETED_AT = 'tch_deleted_at';
}
