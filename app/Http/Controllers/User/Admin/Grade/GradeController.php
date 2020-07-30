<?php

namespace App\Http\Controllers\User\Admin\Grade;

use App\Entities\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\General\GradeRequest;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class GradeController extends Controller
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
     * @param GradeService $gradeService
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        GradeService $gradeService,
        DatatableService $datatableService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->gradeService = $gradeService;
        $this->datatableService = $datatableService;
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
            'editUrl' => 'admin.grade.edit',
            'editIcon' => 'fa fa-edit',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.grade.destroy',
            'deleteIcon' => 'fa fa-trash',
            'view' => true,
            'viewUrl' => 'admin.grade.show',
            'viewIcon' => 'fa fa-eye',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getDataByEloquent(
            Grade::class,
            ['sections', 'students'],
            [
                'id',
                'grades.name as name',
                'display_name'
            ]
        );
        $query->addColumn('no_of_sections', function ($data) {
            return $data->sections->count();
        });
        $query->addColumn('no_of_students', function ($data) {
            return $data->students->count();
        });
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

        return view('user.admin.grade.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');

        return view('user.admin.grade.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        $this->gradeService->create($request->all());

        return redirect()->route('admin.grade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');
        $grade = $this->gradeService->query()->numberOfSections()->numberOfStudents()->findOrFail($id)->load(['sections' => function($query) {
            return $query->numberOfStudents();
        }, 'subjects']);

        return view('user.admin.grade.details.detail', compact('grade', 'breadcrumbs'));
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
        $grade = $this->gradeService->findOrFail($id);

        return view('user.admin.grade.edit', compact('breadcrumbs', 'grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, $id)
    {
        $this->gradeService->update($id, $request->all());

        return redirect()->route('admin.grade.index');
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
