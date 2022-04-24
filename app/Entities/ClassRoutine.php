<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassRoutine extends Model
{
    protected $fillable = ['section_id', 'name'];

    /**
     * @return HasMany
     */
    public function details() {
        return $this->hasMany(ClassRoutineDetail::class, 'routine_id', 'id');
    }
}
