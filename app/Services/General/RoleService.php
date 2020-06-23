<?php


namespace App\Services\General;


use App\Entities\Role;
use App\Services\BaseService;

class RoleService extends BaseService
{
    public function model()
    {
        return Role::class;
    }

}
