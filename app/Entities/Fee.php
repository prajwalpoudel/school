<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    protected $fillable = ['amount', 'grade_id', 'category_id'];
    use SoftDeletes;
}
