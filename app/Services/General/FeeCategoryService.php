<?php


namespace App\Services\General;


use App\Entities\FeeCategory;
use App\Services\BaseService;

class FeeCategoryService extends BaseService
{
    public function model()
    {
        return FeeCategory::class;
    }

    /**
     * @return mixed
     */
    public function getFeeCategoryWithFee()
    {
        return $this->query()->with('fees')->get();
    }
}
