<?php

namespace App\Http\Controllers\User\Admin\Section;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use App\Services\User\Admin\Teacher\TeacherService;
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
     * @var TeacherService
     */
    private $teacherService;

    /**
     * SectionController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param SectionService $sectionService
     * @param GradeService $gradeService
     * @param TeacherService $teacherService
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        SectionService $sectionService,
        GradeService $gradeService,
        TeacherService $teacherService,
        DatatableService $datatableService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->sectionService = $sectionService;
        $this->datatableService = $datatableService;
        $this->gradeService = $gradeService;
        $this->teacherService = $teacherService;
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
            [
                [
                    'name' => 'teachers',
                    'first' => 'sections.teacher_id',
                    'second' => 'teachers.id',
                    'joins' => [
                        [
                            'name' => 'users as t_user',
                            'first' => 'teachers.user_id',
                            'second' => 't_user.id',
                            'joins' => []
                        ]
                    ]
                ],
                [
                    'name' => 'students as sr',
                    'first' => 'sections.captain_id',
                    'second' => 'sr.id',
                    'joins' => [
                        [
                            'name' => 'users as sr_user',
                            'first' => 'sr.user_id',
                            'second' => 'sr_user.id',
                            'joins' => []
                        ]
                    ]
                ],
                [
                    'name' => 'students as vsr',
                    'first' => 'sections.vice_captain_id',
                    'second' => 'vsr.id',
                    'joins' => [
                        [
                            'name' => 'users as vsr_user',
                            'first' => 'vsr.user_id',
                            'second' => 'vsr_user.id',
                            'joins' => []
                        ]
                    ]
                ]
            ],
            [
                'sections.id',
                'sections.name',
                't_user.first_name as section_teacher_first_name',
                't_user.last_name as section_teacher_last_name',
                'sr_user.first_name as section_representative_first_name',
                'sr_user.last_name as section_representative_last_name',
                'vsr_user.first_name as section_vice_representative_first_name',
                'vsr_user.last_name as section_vice_representative_last_name',
            ]
        );
        $query->addColumn('section_teacher_name', function ($data) {
            return ($data->section_teacher_first_name || $data->section_teacher_last_name) ? '<b>'.($data->section_teacher_first_name.' '.$data->section_teacher_last_name).'</b>' : 'Not Assigned';
        });
        $query->addColumn('section_representative_name', function ($data) {
            return ($data->section_representative_first_name || $data->section_representative_last_name) ? '<b>'.($data->section_representative_first_name.' '.$data->section_representative_last_name).'</b>' : 'Not Assigned';
        });
        $query->addColumn('section_vice_representative_name', function ($data) {
            return ($data->section_vice_representative_first_name || $data->section_vice_representative_last_name) ? '<b>'.($data->section_vice_representative_first_name.' '.$data->section_vice_representative_last_name).'</b>' : 'Not Assigned';
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['section_teacher_name', 'section_representative_name', 'section_vice_representative_name', 'action']);

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
        $teachers = $this->teacherService->all();

        return view('user.admin.section.create', compact('breadcrumbs', 'grades', 'teachers'));
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

        return redirect()->route('admin.section.index');
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
        $section->load('students');
        $grades = $this->gradeService->all();
        $teachers = $this->teacherService->all();

        return view('user.admin.section.edit', compact('breadcrumbs', 'section', 'grades', 'teachers'));
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

        return redirect()->route('admin.section.index');

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
