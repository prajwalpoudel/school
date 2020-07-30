<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    protected $fillable = ['amount', 'grade_id', 'category_id'];
    use SoftDeletes;

    /**
     * @return BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function category()
    {
        return $this->belongsTo(FeeCategory::class);
    }
}
