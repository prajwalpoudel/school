<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','salary'];
    public $appends = ['full_name'];

    /**
     * @return BelongsTo
     */
    public  function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed
     */
    public function getFullNameAttribute() {
        return $this->user->full_name;
    }

}
