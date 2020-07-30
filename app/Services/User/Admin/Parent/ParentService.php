<?php


namespace App\Services\User\Admin\Parent;

use App\Entities\Guardian;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ParentService extends BaseService
{
    public function model()
    {
        return Guardian::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['phone','address']);
        $parentData = [];

        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $user->guardian()->create($parentData);
        DB::commit();
    }

    /**
     * @param array|\Illuminate\Database\Eloquent\Model|int $updateData
     * @param $id
     * @return bool|int|void
     */
    public function update($updateData, $id)
    {
       $userData = Arr::only($updateData, ['first_name', 'last_name', 'email']);
        $userDetailData = Arr::only($updateData, ['phone','address']);
        $parentData = [];

        DB::beginTransaction();
        $parent = $this->findOrFail($id);
        app(UserService::class)->updateUser($userData, $userDetailData, $parent->user_id);
        $parent->update($parentData);
        DB::commit();
    }
}
