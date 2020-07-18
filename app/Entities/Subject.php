<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    protected $fillable = ['name', 'author', 'publication', 'edition', 'price', 'grade_id'];

    /**
     * @return BelongsTo
     */
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}
