<?php

namespace App\Http\Controllers\User\Admin\Calendar;

use App\Http\Controllers\Controller;
use App\Services\General\Calendar\GroupService;
use App\Services\General\DatatableService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class GroupController extends Controller
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
     * @var GroupService
     */
    private $groupService;

    /**
     * GroupController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     * @param GroupService $groupService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService,
        GroupService $groupService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
        $this->groupService = $groupService;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.calendar.group.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.calendar.group.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'calendar_groups',
            null,
            [
                'id',
                'title',
                'color_code'
            ]
        );
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->editColumn('color_code', function ($data) use($actionData) {
            return '<div style="background-color: '. $data->color_code .'; width: 50%; height: 20px;"></span>';
        });
        $query->rawColumns(['color_code', 'action']);

        return $query->make();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.index');

        return view('user.admin.calendar.group.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');

        return view('user.admin.calendar.group.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->groupService->create($request->all());

        return redirect()->route('admin.calendar.group.index');
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
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');
        $group = $this->groupService->findOrFail($id);

        return view('user.admin.calendar.group.edit', compact('breadcrumbs', 'group'));
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
        $this->groupService->update($id, $request->all());

        return redirect()->route('admin.calendar.group.index');
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
