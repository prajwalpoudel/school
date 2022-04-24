<?php

namespace App\Http\Controllers\User\Admin\House;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\House\HouseService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class HouseController extends Controller
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
     * @var houseService
     */
    private $houseService;


    /**
     * HouseController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService,
        houseService $houseService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
        $this->houseService = $houseService;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.house.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => false,
            'deleteIcon' => 'fa fa-trash',
            'view' => true,
            'viewUrl' => 'admin.house.edit',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'houses',
            null,
            [
                'id',
                'name',
                'house_captain_id',
                'color',
            ]
        );
        $query->editColumn('color', function ($data) {
            return '<div style="background-color: '. $data->color .'; width: 50%; height: 20px;"></span>';
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['color', 'action']);

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

        return view('user.admin.house.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');

        return view('user.admin.house.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->houseService->create($request->all());

        return redirect()->route('admin.house.index');
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
        $house = $this->houseService->findOrFail($id);
        $house->load('students');

        return view('user.admin.house.edit', compact('breadcrumbs', 'house'));
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
        $this->houseService->update($id, $request->all());

        return redirect()->route('admin.house.index');
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
