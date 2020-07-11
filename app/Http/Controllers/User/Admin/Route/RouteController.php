<?php

namespace App\Http\Controllers\User\Admin\Route;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\Services\General\Route\RouteService;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;

    /**
     * @var GradeService
     */
    private $gradeService;
    /**
     * @var DatatableService
     */
    private $datatableService;

     /**
     * GradeController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param RouteService $routeService
     * @param DatatableService $datatableService
     */

    public function __construct(
        Breadcrumbs $breadcrumbs,
        RouteService $routeService,
        DatatableService $datatableService
    )
     {
        $this->breadcrumbs = $breadcrumbs;
        $this->routeService = $routeService;
        $this->datatableService = $datatableService;
    }

    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.route.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.route.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'routes',
            null,
            [
                'id',
                'vehicle',
                'route',
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

       return view('user.admin.route.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');

        return view('user.admin.route.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->routeService->create($request->all());

        return redirect()->route('admin.route.index');
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
        $route = $this->routeService->findOrFail($id);

        return view('user.admin.route.edit', compact('breadcrumbs', 'route'));
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
          $this->routeService->update($id, $request->all());

        return redirect()->route('admin.route.index');
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
