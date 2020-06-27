<?php

namespace App\Http\Controllers\User\Admin\Canteen;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\Canteen\CanteenService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class CanteenController extends Controller
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
     * @var CanteenService
     */
    private $canteenService;

    /**
     * GradeController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService,
        CanteenService $canteenService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
        $this->canteenService = $canteenService;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.canteen.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.canteen.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'canteens',
            null,
            [
                'id',
                'name',
                'price',
            ]
        );
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
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

        return view('user.admin.canteen.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');

        return view('user.admin.canteen.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canteenService->create($request->all());

        return redirect()->route('admin.canteen.index');
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
        $canteen = $this->canteenService->findOrFail($id);

        return view('user.admin.canteen.edit', compact('breadcrumbs', 'canteen'));
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
        $this->canteenService->update($id, $request->all());

        return redirect()->route('admin.canteen.index');

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
