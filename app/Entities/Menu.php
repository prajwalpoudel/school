<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $appends = ['active_class', 'active_parent_class'];

    public function children() {
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }

    /**
     * @return string|null
     */
    public function getActiveClassAttribute() {
        return request()->routeIs($this->route) ?  'm-menu__item--active' : null;
    }

    /**
     * @return string|null
     */
    public function getActiveParentClassAttribute() {
        if(in_array(request()->route()->getName(), explode(',', $this->related_route))) {
            return 'm-menu__item--open m-menu__item--expanded ';
        }
        else {
            return 'null';
        }
    }
}
