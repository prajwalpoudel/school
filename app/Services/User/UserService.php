<?php


namespace App\Services\User;


use App\Entities\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function model()
    {
        return User::class;
    }

    public function store($userData, $userDetailData=null) {
        $user = $this->model->create($userData);
        if($userDetailData) {
            $user->detail()->create($userDetailData);
        }

        return $user;
    }
}
