<?php


namespace App\Services\General\Route;


use App\Entities\Route;
use App\Services\BaseService;

class RouteService extends BaseService
{
    public function model()
    {
        return Route::class;
    }
}
