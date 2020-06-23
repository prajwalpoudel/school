<?php


namespace App\Services\General;


use App\Entities\MenuGroup;
use App\Services\BaseService;

class MenuGroupService extends BaseService
{
    /**
     * @return mixed|string
     */
    public function model()
    {
        return MenuGroup::class;
    }

    public function getMenuGroupMenus($id) {
        $menus = $this->model->where('id', $id)->with(['menus' => function ($query) {
            $query->where('parent_id', null)->with(['children.children']);
        }])->first();



        return $menus->menus;
    }
}
