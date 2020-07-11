<?php

namespace App\Http\Controllers\User\Admin\Student;

use App\Entities\Grade;
use App\Entities\Section;
use App\Http\Controllers\Controller;
use App\School\Constants\RoleConstant;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use App\Services\User\Admin\Student\StudentService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class StudentController extends Controller
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
     * @var SectionService
     */
    private $sectionService;
    /**
     * @var StudentService
     */
    private $studentService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * StudentController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param StudentService $studentService
     * @param DatatableService $datatableService
     * @param GradeService $gradeService
     * @param SectionService $sectionService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        StudentService $studentService,
        DatatableService $datatableService,
        GradeService $gradeService,
        SectionService $sectionService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->gradeService = $gradeService;
        $this->sectionService = $sectionService;
        $this->studentService = $studentService;
        $this->datatableService = $datatableService;
    }

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

    return view('user.admin.student.index', compact('breadcrumbs'));
}

public function list() {
    $actionData = [
        'edit' => true,
        'editUrl' => 'admin.student.edit',
        'editIcon' => '',
        'editClass' => '',
        'delete' => true,
        'deleteUrl' => 'menu',
        'deleteIcon' => '',
        'deleteClass' => '',
        'view' => true,
        'viewUrl' => 'admin.student.edit',
        'viewIcon' => '',
        'viewClass' => '',
    ];

    $query = $this->datatableService->getData(
        'students',
        [
            [
                'name' => 'users',
                'first' => 'users.id',
                'second' => 'students.user_id',
                'joins' => [
                    [
                        'name' => 'user_details',
                        'first' => 'users.id',
                        'second' => 'user_details.user_id',
                        'joins' => []
                    ]
                ]
            ],
            [
                'name' => 'student_details',
                'first' => 'students.id',
                'second' => 'student_details.student_id',
                'joins' => []
            ],
            [
                'name' => 'sections',
                'first' => 'students.section_id',
                'second' => 'sections.id',
                'joins' => [
                    [
                        'name' => 'grades',
                        'first' => 'sections.grade_id',
                        'second' => 'grades.id',
                        'joins' => []
                    ]
                ]
            ]
        ],
        [
            'users.id as id',
            'students.id as student_id',
            'first_name',
            'last_name',
            'email',
            'roll',
            'sections.name as section',
            'grades.display_name as grade',
            'user_details.address'
        ]
    );

    $query->addColumn('action', function ($data) use($actionData) {
        $id = (int) $data->student_id;
        return view('general.datatable.action', compact('actionData', 'id'));
    });
    return $query->make();
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
    $sections = $this->sectionService->select(['id', 'grade_id', 'display_name']);

    return view('user.admin.student.create', compact('breadcrumbs', 'grades', 'sections'));
}

/**
 * Store a newly created resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $storeData = array_merge(
        $request->all(),
        [
            'role_id' => RoleConstant::STUDENT_ROLE_ID,
            'password' => bcrypt('password'),
            'section_id' => (int) $request->section_id
        ]
    );
    $this->studentService->store($storeData);

    return redirect()->back();
}

/**
 * Display the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $student = $this->studentService->findOrFail($id);
    $student->load(['user.detail']);
    $breadcrumbs = $this->breadcrumbs::render('admin.student.edit');
    $grades = $this->gradeService->select(['id', 'display_name']);
    $sections = $this->sectionService->select(['id', 'grade_id', 'display_name']);

    return view('user.admin.student.edit', compact('breadcrumbs', 'student', 'grades', 'sections'));
}

/**
 * Update the specified resource in storage.
 *
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
}
}
