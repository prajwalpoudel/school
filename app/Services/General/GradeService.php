<?php


namespace App\Services\General;


use App\Entities\Grade;
use App\Services\BaseService;

class GradeService extends BaseService
{
    public function model()
    {
        return Grade::class;
    }
}
