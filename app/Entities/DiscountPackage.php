<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DiscountPackage extends Model
{
    protected $fillable  = [
        'name',
        'description',
        'is_percent',
        'amount'
    ];
    protected $appends = ['amount_show'];

    /**
     * @return BelongsToMany
     */
    public function feeCategories() {
        return $this->belongsToMany(FeeCategory::class, 'discount_package_fee_category', 'discount_package_id', 'fee_category_id');
    }

    public function getAmountShowAttribute() {
        if($this->is_percent) {
            return $this->amount . ' % ';
        }
        return  ' Nrs '. $this->amount;
    }
}
