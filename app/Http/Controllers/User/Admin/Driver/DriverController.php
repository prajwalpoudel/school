<?php

namespace App\Http\Controllers\User\Admin\Driver;

use App\Http\Controllers\Controller;
use App\School\Constants\RoleConstant;
use App\Services\General\DatatableService;
use App\Services\User\Admin\Driver\DriverService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var DriverService
     */
    private $driverService;

    /**
     * DriverController constructor.
     * @param DatatableService $datatableService
     * @param Breadcrumbs $breadcrumbs
     * @param DriverService $driverService
     */
    public function __construct(
        DatatableService $datatableService,
        Breadcrumbs $breadcrumbs,
        DriverService $driverService

    )
    {
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->driverService = $driverService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.driver.index', compact('breadcrumbs'));
    }
    /**
     * @return mixed
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.driver.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'menu',
            'deleteIcon' => '',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.driver.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'drivers',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'drivers.user_id',
                    'joins' => [
                    ]
                ],
                [
                    'name' => 'user_details',
                    'first' => 'users.id',
                    'second' => 'user_details.user_id',
                    'joins' => []
                ]
            ],
            [
                'users.id as id',
                'drivers.id as driver_id',
                'first_name',
                'last_name',
                'user_details.phone',
                'email',
                'user_details.address',
                'salary',
                'licence_number'
            ]
        );


        $query->addColumn('action', function ($data) use($actionData) {
            $id = (int) $data->driver_id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        return $query->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.create');
        return view('user.admin.driver.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = array_merge(
            $request->all(),
            [
                'role_id' => RoleConstant::DRIVER_ROLE_ID,
                'password' => bcrypt('password'),
            ]
        );
        $this->driverService->store($storeData);

        return redirect()->route('admin.driver.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $driver = $this->driverService->findOrFail($id);
        $driver->load(['user.detail']);
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');


        return view('user.admin.driver.edit', compact('breadcrumbs', 'driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->driverService->update($request->all(), $id);

        return redirect()->route('admin.driver.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
