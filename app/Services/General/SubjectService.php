<?php


namespace App\Services\General;


use App\Entities\Subject;
use App\Services\BaseService;

class SubjectService extends BaseService
{
    public function model()
    {
        return Subject::class;
    }
}
