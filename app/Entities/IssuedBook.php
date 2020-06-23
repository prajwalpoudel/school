<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedBook extends Model
{
    protected $fillable = ['book_id', 'issuable_id', 'issuable_type'];

    /**
     * Morph Relation
     */
    public function issuable() {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function book() {
        return $this->belongsTo(Book::class);
    }

}
