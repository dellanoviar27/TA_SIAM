<?php

namespace App\Models\student;
use App\Models\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ppdb_Student extends Model
{
    
    use HasFactory, SoftDeletes ;
    protected $table = 'students';
    protected $primaryKey = 'std_id';
    protected $guarded = [];

    const CREATED_AT = 'std_created_at';
    const UPDATED_AT = 'std_updated_at';
    const DELETED_AT = 'std_deleted_at';

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'std_class_id', 'cls_id');
    }

    // public function parent()
    // {
    // return $this->belongsTo(Parent::class, 'std_parent_id', 'prt_id');
    // }


    public function parent()
    {
        return $this->belongsTo(Ppdb_Parent::class, 'std_parent_id', 'prt_id');
    }
}