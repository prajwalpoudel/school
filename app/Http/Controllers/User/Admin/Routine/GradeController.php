<?php

namespace App\Http\Controllers\User\Admin\Routine;

use App\Http\Controllers\Controller;
use App\Services\General\DayService;
use App\Services\General\GradeService;
use App\Services\General\SectionService;
use App\Services\General\SubjectService;
use App\Services\User\Admin\Routine\ClassRoutineService;
use App\Services\User\Admin\Teacher\TeacherService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @var SectionService
     */
    private $sectionService;
    /**
     * @var SubjectService
     */
    private $subjectService;
    /**
     * @var TeacherService
     */
    private $teacherService;
    /**
     * @var ClassRoutineService
     */
    private $classRoutineService;
    /**
     * @var DayService
     */
    private $dayService;

    /**
     * GradeController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param GradeService $gradeService
     * @param SectionService $sectionService
     * @param SubjectService $subjectService
     * @param TeacherService $teacherService
     * @param ClassRoutineService $classRoutineService
     * @param DayService $dayService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        GradeService $gradeService,
        SectionService $sectionService,
        SubjectService $subjectService,
        TeacherService $teacherService,
        ClassRoutineService $classRoutineService,
        DayService $dayService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->gradeService = $gradeService;
        $this->sectionService = $sectionService;
        $this->subjectService = $subjectService;
        $this->teacherService = $teacherService;
        $this->classRoutineService = $classRoutineService;
        $this->dayService = $dayService;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.section.index');
        $grades = $this->gradeService->all();
        $sections = $this->sectionService->all();
        $subjects = $this->subjectService->all();
        $teachers = $this->teacherService->all();
        $days = $this->dayService->all();

        return view('user.admin.routine.class.index', compact('breadcrumbs', 'grades', 'sections', 'subjects', 'teachers', 'days'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $this->classRoutineService->store($request->all());

        return response()->json(['message' => 'Successfully Created Routine']);
    }
}
