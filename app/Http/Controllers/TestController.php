<?php

namespace App\Http\Controllers;

use App\School\Constants\MenuGroupConstant;
use App\Services\General\DatatableService;
use App\Services\General\MenuGroupService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * @var MenuGroupService
     */
    private $menuGroupService;
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * TestController constructor.
     * @param MenuGroupService $menuGroupService
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     */
    public function __construct(MenuGroupService $menuGroupService, Breadcrumbs $breadcrumbs, DatatableService $datatableService)
    {
        $this->menuGroupService = $menuGroupService;
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
    }

    public function getMenus() {
        $breadcrumbs = $this->breadcrumbs::render('admin.dashboard.create');

         return view('user.admin.dashboard', compact('breadcrumbs'));
    }

    public function test() {
        $breadcrumbs = $this->breadcrumbs::render('admin.dashboard.create');

        return view('user.admin.test', compact('breadcrumbs'));
    }

    public function testData() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'menu',
            'editIcon' => '',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'menu',
            'deleteIcon' => '',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'menu',
            'viewIcon' => '',
            'viewClass' => '',
        ];
        return $this->datatableService->getData('roles', ['name'], $actionData);
    }
}
