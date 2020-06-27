<?php


namespace App\Services\General\Canteen;

use App\Entities\Canteen;
use App\Services\BaseService;

class CanteenService extends BaseService
{
    public function model()
    {
        return Canteen::class;
    }
}
