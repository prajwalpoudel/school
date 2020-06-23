<?php


namespace App\Services\General;


use App\Entities\Installment;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InstallmentService extends BaseService
{
    public function model()
    {
        return Installment::class;
    }

    /**
     * @param $insertData
     * @return Collection|Model|null
     */
    public function create($insertData)
    {
        DB::beginTransaction();
        $installment = $this->model->create($insertData);
        $installment->refresh();
        if(isset($data['categories']))
        {
            $installment->feeCategories()->sync($insertData['categories']);
        }
        else {
            $installment->feeCategories()->sync([]);
        }
        DB::commit();

        return ;
    }

    /**
     * @param array|Model|int $where
     * @param $data
     * @return bool|int|void
     */
    public function update($where, $data)
    {
        DB::beginTransaction();
        $installment = $this->model->findOrFail($where);
        $installment->update($data);
        if(isset($data['categories']))
        {
            $installment->feeCategories()->sync($data['categories']);
        }
        else {
            $installment->feeCategories()->sync([]);
        }
        DB::commit();

        return;
    }
}
