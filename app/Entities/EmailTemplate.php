<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    protected $fillable = ['title', 'slug', 'subject', 'email_from', 'content'];
}
