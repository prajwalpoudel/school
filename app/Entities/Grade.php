<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'display_name'];

    /**
     * @return HasMany
     */
    public function sections() {
        return $this->hasMany(Section::class);
    }
}
