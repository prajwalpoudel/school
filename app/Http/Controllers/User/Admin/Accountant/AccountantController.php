<?php

namespace App\Http\Controllers\User\Admin\Accountant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Services\User\Admin\Accountant\AccountantService;
use App\School\Constants\RoleConstant;
use App\Services\General\DatatableService;


class AccountantController extends Controller
{
     /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
     /**
     * @var AccountantService

     */
    private $accountantService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * AccountantController constructor.
     * @param DatatableService $datatableService
     * @param Breadcrumbs $breadcrumbs
     * @param AccountantService $accountantService
     */
    public function __construct(
        DatatableService $datatableService,
        Breadcrumbs $breadcrumbs,
        AccountantService $accountantService
    )
    {
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->accountantService = $accountantService;

    }

    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.accountant.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'menu',
            'deleteIcon' => 'fa fa-trash',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.accountant.edit',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'accountants',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'accountants.user_id',
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
                'accountants.id as accountant_id',
                'first_name',
                'last_name',
                'user_details.phone',
                'email',
                'user_details.address',
                'salary'
            ]
        );


        $query->addColumn('action', function ($data) use($actionData) {
            $id = (int) $data->accountant_id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        return $query->make();
    }

    public function index()
    {
       $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.accountant.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.create');
        return view('user.admin.accountant.create', compact('breadcrumbs'));
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
                'role_id' => RoleConstant::ACCOUNTANT_ROLE_ID,
                'password' => bcrypt('password'),
            ]
        );
        $this->accountantService->store($storeData);

        return redirect()->route('admin.accountant.index');
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
        $accountant = $this->accountantService->findOrFail($id);
        $accountant->load(['user.detail']);
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');


        return view('user.admin.accountant.edit', compact('breadcrumbs', 'accountant'));
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
        $this->accountantService->update($request->all(), $id);

        return redirect()->route('admin.accountant.index');
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
