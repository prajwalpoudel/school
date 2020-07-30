<?php


namespace App\Services\User\Admin\Teacher;


use App\Entities\Teacher;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TeacherService extends BaseService
{
    /**
     * @var UserService
     */
    private $userService;

    public function model()
    {
        return Teacher::class;
    }

    /**
     * @param $storeData
     */
    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['phone','address']);
        $teacherData = Arr::only($storeData, ['salary']);

        $teacherDetailData = null;



        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $teacher = $user->teacher()->create($teacherData);
        if($teacherDetailData) {
            $teacher->detail()->create($teacherDetailData);
        }
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
        $teacherData = Arr::only($updateData, ['salary']);
        $teacherDetailData = null;

        DB::beginTransaction();
        $teacher = $this->findOrFail($id);
        $user = app(UserService::class)->updateUser($userData, $userDetailData, $teacher->user_id);
        $teacher->update($teacherData);
        if($teacherDetailData) {
            $teacher->detail()->update($teacherDetailData);
        }
        DB::commit();
    }
}
