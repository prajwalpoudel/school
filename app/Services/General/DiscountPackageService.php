<?php
namespace App\Services\General;


use App\Entities\DiscountPackage;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiscountPackageService extends BaseService
{
    public function model()
    {
        return DiscountPackage::class;
    }

    /**
     * @param $where array|integer|Model
     * @param $data
     * @return bool|int
     */
    public function update($where, $data)
    {
        DB::beginTransaction();
        $discountPackage = $this->model->findOrFail($where);
        $discountPackage->update($data);
        $discountPackage->feeCategories()->sync($data['categories']);
        DB::commit();;


    }
}
