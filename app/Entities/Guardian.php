<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guardian extends Model
{
    public $table = 'parents';
    protected $fillable = ['user_id'];


     public  function students() {
        return $this->belongsToMany(Student::class,'parent_students','parent_id','student_id');
    }

    public  function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
