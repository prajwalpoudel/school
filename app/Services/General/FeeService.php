<?php


namespace App\Services\General;


use App\Entities\Fee;
use App\Services\BaseService;

class FeeService extends BaseService
{
    public function model()
    {
        return Fee::class;
    }
}
