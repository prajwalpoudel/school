<?php


namespace App\Services\User\Admin\Student;


use App\Entities\Student;
use App\Services\BaseService;
use App\Services\User\UserService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StudentService extends BaseService
{
    /**
     * @var UserService
     */
    private $userService;

    public function model()
    {
        return Student::class;
    }

    public function store($storeData) {
        $userData = Arr::only($storeData, ['first_name', 'last_name', 'email', 'role_id', 'password']);
        $userDetailData = Arr::only($storeData, ['address']);
        $studentData = Arr::only($storeData, ['section_id', 'house_id']);
        $studentDetailData = null;

        DB::beginTransaction();
        $user = app(UserService::class)->store($userData, $userDetailData);
        $student = $user->student()->create($studentData);
        if($studentDetailData) {
            $student->detail()->create($studentDetailData);
        }
        DB::commit();
    }
}
