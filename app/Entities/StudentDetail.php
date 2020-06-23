<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDetail extends Model
{
    protected $fillable = ['roll', 'year_started', 'prev_school'];

    use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public  function student() {
        return $this->belongsTo(Student::class);
    }
}
