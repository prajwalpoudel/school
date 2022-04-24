<?php


namespace App\Services\General;


use App\Entities\Day;
use App\Services\BaseService;

class DayService extends BaseService
{
    public function model()
    {
        return Day::class;
    }
}
