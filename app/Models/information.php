<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class information extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'informations';
    protected $primaryKey = 'inf_id';
    protected $guarded = [];

    const CREATED_AT = 'inf_created_at';
    const UPDATED_AT = 'inf_updated_at';
    const DELETED_AT = 'inf_deleted_at';
}
