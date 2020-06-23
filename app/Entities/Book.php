<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'publication', 'edition', 'author', 'price', 'bar_code', 'position', 'category_id'];

    /**
     * @return BelongsTo
     */
    public function category() {
        return $this->belongsTo(BookCategory::class);
    }

    /**
     * @return HasOne
     */
    public function issued() {
        return $this->hasOne(IssuedBook::class)->where('issued_status', true);
    }

    /**
     * @return HasMany
     */
    public function returned() {
        return $this->hasMany(IssuedBook::class)->where('issued_status', false);
    }
}
