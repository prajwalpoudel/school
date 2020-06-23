<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'display_name', 'grade_id'];

    /**
     * @return BelongsTo
     */
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
}
