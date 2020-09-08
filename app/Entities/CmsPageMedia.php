<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CmsPageMedia extends Model
{
    protected $fillable = [
        'media',
        'type'
    ];
}
