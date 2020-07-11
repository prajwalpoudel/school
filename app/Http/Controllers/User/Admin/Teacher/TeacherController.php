<?php

namespace App\Http\Controllers\User\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\School\Constants\RoleConstant;
use App\Services\General\DatatableService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use App\Services\User\Admin\Student\StudentService;
use App\Services\User\Admin\Teacher\TeacherService;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

class TeacherController extends Controller
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
     * @var TeacherService
     */
    private $teacherService;

    /**
     * StudentController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     * @param TeacherService $teacherService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService,
        TeacherService $teacherService

    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
        $this->teacherService = $teacherService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.teacher.index', compact('breadcrumbs'));
    }

    /**
     * @return mixed
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.teacher.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'menu',
            'deleteIcon' => '',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.teacher.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'teachers',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'teachers.user_id',
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
                'teachers.id as teacher_id',
                'first_name',
                'last_name',
                'email',
                'user_details.address'
            ]
        );

        $query->addColumn('action', function ($data) use($actionData) {
            $id = (int) $data->teacher_id;
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
        return view('user.admin.teacher.create', compact('breadcrumbs'));
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
                'role_id' => RoleConstant::TEACHER_ROLE_ID,
                'password' => bcrypt('password'),
            ]
        );
        $this->teacherService->store($storeData);

        return redirect()->route('admin.teacher.index');

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
        $teacher = $this->teacherService->findOrFail($id);
        $teacher->load(['user.detail']);
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');


        return view('user.admin.teacher.edit', compact('breadcrumbs', 'teacher'));
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
        $this->teacherService->update($request->all(), $id);

        return redirect()->route('admin.teacher.index');

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
