<?php

namespace App\Http\Controllers\User\Admin\Subject;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use App\Services\General\SubjectService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
     * @var GradeService
     */
    private $gradeService;
    /**
     * @var SubjectService
     */
    private $subjectService;

    /**
     * SubjectController constructor.
     * @param SubjectService $subjectService
     * @param DatatableService $datatableService
     * @param GradeService $gradeService
     * @param Breadcrumbs $breadcrumbs
     */
    public function __construct(
        SubjectService $subjectService,
        DatatableService $datatableService,
        GradeService $gradeService,
        Breadcrumbs $breadcrumbs
    )
    {
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->gradeService = $gradeService;
        $this->subjectService = $subjectService;
    }

    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.subject.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.subject.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query =  $this->datatableService->getData(
            'subjects',
            [
                [
                    'name' => 'grades',
                    'first' => 'subjects.grade_id',
                    'second' => 'grades.id',
                    'joins' => []
                ]
            ],
            [
                'subjects.id',
                'subjects.name',
                'grades.display_name as grade',
                'author',
                'publication',
                'edition',
                'price'
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
        $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.subject.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.create');
        $grades = $this->gradeService->select(['id', 'display_name']);

        return view('user.admin.subject.create', compact('breadcrumbs', 'grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->subjectService->create($request->all());

        return redirect()->route('admin.subject.index');
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
        $subject = $this->subjectService->findOrFail($id);
        $grades = $this->gradeService->all();

        return view('user.admin.subject.edit', compact('breadcrumbs', 'subject', 'grades'));
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
        $this->subjectService->update($id, $request->all());

        return redirect()->route('admin.subject.index');
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
