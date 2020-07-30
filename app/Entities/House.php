<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class House extends Model
{
	
	

    protected $fillable = ['name', 'house_captain_id','color'];

    /**
     * @return HasMany
     */
    public function students() {

        return $this->hasMany(Student::class, 'house_id', 'id');
    }

    public function captain() {
    	return $this->belongsTo(Student::class, 'id', 'house_captain_id');
    }

}
