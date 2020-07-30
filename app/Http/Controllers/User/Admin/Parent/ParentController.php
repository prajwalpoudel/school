<?php

namespace App\Http\Controllers\User\Admin\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Services\General\DatatableService;
use App\Services\User\Admin\Parent\parentService;
use App\School\Constants\RoleConstant;

class ParentController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
     /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var parentservice
     */
    private $parentService;

    /**
     * ParentController constructor.
     * @param DatatableService $datatableService
     * @param Breadcrumbs $breadcrumbs
     */
    public function __construct(
        DatatableService $datatableService,
        Breadcrumbs $breadcrumbs,
        ParentService $parentService

    )
    {
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->parentService = $parentService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.parent.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'menu',
            'deleteIcon' => '',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.parent.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'parents',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'parents.user_id',
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
                'parents.id as parent_id',
                'first_name',
                'last_name',
                'user_details.phone',
                'email',
                'user_details.address',
            ]
        );


        $query->addColumn('action', function ($data) use($actionData) {
            $id = (int) $data->parent_id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        return $query->make();
    }
    public function index()
    {

       $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.parent.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.create');
        return view('user.admin.parent.create', compact('breadcrumbs'));
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
                'role_id' => RoleConstant::PARENT_ROLE_ID,
                'password' => bcrypt('password'),
            ]
        );
        $this->parentService->store($storeData);

        return redirect()->route('admin.parent.index');
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
        $parent = $this->parentService->findOrFail($id);
        $parent->load(['user.detail']);
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');


        return view('user.admin.parent.edit', compact('breadcrumbs', 'parent'));
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
         $this->parentService->update($request->all(), $id);

        return redirect()->route('admin.parent.index');
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
