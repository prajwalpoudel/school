<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'code', 'description'];

    /**
     * @return HasMany
     */
    public function books() {
        return $this->hasMany(Book::class);
    }
}
