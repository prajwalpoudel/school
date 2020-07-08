<?php


namespace App\Services\User;


use App\Entities\User;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    public function model()
    {
        return User::class;
    }

    /**
     * @param $userData
     * @param null $userDetailData
     * @return mixed
     */
    public function store($userData, $userDetailData=null) {
        $user = $this->model->create($userData);
        if($userDetailData) {
            $user->detail()->create($userDetailData);
        }

        return $user;
    }

    /**
     * @param array|Model|int $userData
     * @param null $userDetailData
     * @return bool|int
     */
    public function updateUser($userData, $userDetailData=null, $id) {
        $user = $this->model->findOrFail($id);
        $user->update($userData);

        if($userDetailData) {
            $user->detail()->update($userDetailData);
        }

        return $user;
    }
}
