<?php


namespace App\Services\User\Admin\Driver;


use App\Entities\Driver;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DriverService extends BaseService
{
    public function model()
    {
        return Driver::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['phone','address']);
        $driverData = [];

        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $user->driver()->create($driverData);
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
        $driverData = [];


        DB::beginTransaction();
        $driver = $this->findOrFail($id);
        app(UserService::class)->updateUser($userData, $userDetailData, $driver->user_id);
        $driver->update($driverData);
        DB::commit();
    }
}
