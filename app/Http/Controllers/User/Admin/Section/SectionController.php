<?php

namespace App\Http\Controllers\User\Admin\Section;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var SectionService
     */
    private $sectionService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var SectionService
     */
    private $gradeService;

    /**
     * SectionController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param SectionService $sectionService
     * @param SectionService $gradeService
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        SectionService $sectionService,
        GradeService $gradeService,
        DatatableService $datatableService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->sectionService = $sectionService;
        $this->datatableService = $datatableService;
        $this->gradeService = $gradeService;
    }

    /**
     * @return mixed
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.section.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.section.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query =  $this->datatableService->getData(
            'sections',
            null,
            [
                'id',
                'name',
                'display_name',
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
        $breadcrumbs = $this->breadcrumbs::render('admin.section.index');

        return view('user.admin.section.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.section.create');
        $grades = $this->gradeService->all();

        return view('user.admin.section.create', compact('breadcrumbs', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->sectionService->create($request->all());

        return redirect()->back();
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
        $section = $this->sectionService->findOrFail($id);
        $grades = $this->gradeService->all();

        return view('user.admin.section.edit', compact('breadcrumbs', 'section', 'grades'));
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
        $this->sectionService->update($id, $request->all());

        return redirect()->back();
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
