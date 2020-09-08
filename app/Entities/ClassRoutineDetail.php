<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassRoutineDetail extends Model
{
    protected $fillable = [
      'day_id',
      'period_id',
      'subject_id',
      'teacher_id'
    ];
}
