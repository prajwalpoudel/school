<?php


namespace App\Services\User\Admin\Routine;


use App\Entities\ClassRoutine;
use App\Services\BaseService;
use Illuminate\Support\Arr;

class ClassRoutineService extends BaseService
{
    public function model()
    {
        return ClassRoutine::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $routineData = Arr::only($storeData, ['section_id', 'name']);
        $routineDetailData = $storeData['workingDays'];
        $routine = $this->model->updateOrCreate(['section_id' => $routineData['section_id']], $routineData);
        if($routineDetailData) {
            foreach ($routineDetailData as $data) {
                $routine->details()->updateOrCreate(['day_id' => $data['id'], 'routine_id' => $routine->id],['day_id' => $data['id']]);
            }
        }
        return;
    }
}
