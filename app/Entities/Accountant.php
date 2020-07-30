<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accountant extends Model
{
    protected $fillable = ['user_id','salary'];

    /**
     * @return BelongsTo
     */
    public  function user() {
        return $this->belongsTo(User::class);
    }

}
