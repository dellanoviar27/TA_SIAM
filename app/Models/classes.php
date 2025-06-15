<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class classes extends Model
{
    use HasFactory, SoftDeletes ;
    protected $table = 'classes';
    protected $primaryKey = 'cls_id';
    protected $guarded = [];

    const CREATED_AT = 'cls_created_at';
    const UPDATED_AT = 'cls_updated_at';
    const DELETED_AT = 'cls_deleted_at';

    public function students()
    {
        return $this->hasMany(Ppdb_Student::class, 'std_class_id', 'cls_id');
    }

}
