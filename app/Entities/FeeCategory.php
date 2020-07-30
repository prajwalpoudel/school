<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeeCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    /**
     * @return HasMany
     */
    public function fees()
    {
        return $this->hasMany(Fee::class, 'category_id', 'id');
    }

    /**
     * @return HasManyThrough
     */
    public function grades()
    {
        return $this->hasManyThrough(
            Grade::class,
            Fee::class,
            'category_id',
            'id',
            'id',
            'grade_id'

        );
    }

    /**
     * @return BelongsToMany
     */
    public function discountPackages()
    {
        return $this->belongsToMany(DiscountPackage::class, 'discount_package_fee_category', 'fee_category_id', 'discount_package_id');
    }

    /**
     * @return BelongsToMany
     */
    public function installments()
    {
        return $this->belongsToMany(Installment::class, 'installment_fee_category', 'fee_category_id', 'installment_id');
    }
}
