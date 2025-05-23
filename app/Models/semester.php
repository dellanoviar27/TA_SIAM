<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class semester extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'semesters';
    protected $primaryKey = 'smt_id';
    protected $guarded = [];

    const CREATED_AT = 'smt_created_at';
    const UPDATED_AT = 'smt_updated_at';
    const DELETED_AT = 'smt_deleted_at';
}
