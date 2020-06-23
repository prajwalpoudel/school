<?php


namespace App\Services\General;


use App\Entities\Section;
use App\Services\BaseService;

class SectionService extends BaseService
{
    public function model()
    {
        return Section::class;;
    }
}
