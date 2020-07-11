<?php


namespace App\Services\General\Vehicle;

use App\Entities\Vehicle;
use App\Services\BaseService;

class VehicleService extends BaseService
{
    public function model()
    {
        return Vehicle::class;
    }
}
