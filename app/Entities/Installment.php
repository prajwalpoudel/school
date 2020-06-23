<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    /**
     * @return BelongsToMany
     */
    public function feeCategories() {
        return $this->belongsToMany(FeeCategory::class, 'installment_fee_category', 'installment_id', 'fee_category_id');
    }
}
