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
}
