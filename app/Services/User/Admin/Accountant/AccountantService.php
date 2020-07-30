<?php


namespace App\Services\User\Admin\Accountant;


use App\Entities\Accountant;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AccountantService extends BaseService
{
    public function model()
    {
        return Accountant::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['phone','address']);
        $accountantData = Arr::only($storeData, ['salary']);

        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $user->accountant()->create($accountantData);
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
        $accountantData = Arr::only($updateData, ['salary']);

        DB::beginTransaction();
        $accountant = $this->findOrFail($id);
        app(UserService::class)->updateUser($userData, $userDetailData, $accountant->user_id);
        $accountant->update($accountantData);
        DB::commit();
    }
}
