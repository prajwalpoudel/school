<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
     protected $fillable = ['name', 'driver_name','driver_number'];
}
