<?php

namespace App\Http\Controllers;

use App\School\Constants\MenuGroupConstant;
use App\Services\General\DatatableService;
use App\Services\General\MenuGroupService;
use App\Services\Test\CalendarService;
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
     * @var CalendarService
     */
    private $calendarService;

    /**
     * TestController constructor.
     * @param MenuGroupService $menuGroupService
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     * @param CalendarService $calendarService
     */
    public function __construct(
        MenuGroupService $menuGroupService,
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService,
        CalendarService $calendarService
    )
    {
        $this->menuGroupService = $menuGroupService;
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
        $this->calendarService = $calendarService;
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

    public function testCalendar() {
        $this->calendarService->generate();
    }
}
