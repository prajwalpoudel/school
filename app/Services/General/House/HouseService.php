<?php


namespace App\Services\General\House;

use App\Entities\House;
use App\Services\BaseService;

class HouseService extends BaseService
{
    public function model()
    {
        return House::class;
    }
}
