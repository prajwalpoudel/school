<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuGroup extends Model
{
    /**
     * @return HasMany
     */
    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
