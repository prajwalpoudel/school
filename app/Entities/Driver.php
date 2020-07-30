<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'salary', 'licence_number'];

    /**
     * @return BelongsTo
     */
    public  function user() {
        return $this->belongsTo(User::class);
    }
}
