<?php


namespace App\Services\General;


use App\Entities\Menu;
use App\Services\BaseService;

class MenuService extends BaseService
{
    public function model()
    {
        return Menu::class;
    }
}
