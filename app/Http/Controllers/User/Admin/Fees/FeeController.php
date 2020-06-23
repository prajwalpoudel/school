<?php

namespace App\Http\Controllers\User\Admin\Fees;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\FeeCategoryService;
use App\Services\General\FeeService;
use App\Services\General\GradeService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var FeeService
     */
    private $feeService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var GradeService
     */
    private $gradeService;
    /**
     * @var FeeCategoryService
     */
    private $feeCategoryService;

    /**
     * FeeController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param FeeService $feeService
     * @param DatatableService $datatableService
     * @param GradeService $gradeService
     * @param FeeCategoryService $feeCategoryService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        FeeService $feeService,
        DatatableService $datatableService,
        GradeService $gradeService,
        FeeCategoryService $feeCategoryService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->feeService = $feeService;
        $this->datatableService = $datatableService;
        $this->gradeService = $gradeService;
        $this->feeCategoryService = $feeCategoryService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.fee.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.fee.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'fees',
            [
                [
                    'name' => 'fee_categories',
                    'first' => 'fee_categories.id',
                    'second' => 'fees.category_id',
                    'joins' => []
                ],
                [
                    'name' => 'grades',
                    'first' => 'grades.id',
                    'second' => 'fees.grade_id',
                    'joins' => []
                ],
            ],
            [
                'fees.id as id',
                'amount',
                'grades.display_name as grade_name',
                'fee_categories.name as category_name'
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
        $breadcrumbs = $this->breadcrumbs::render('admin.fee.index');

        return view('user.admin.fees.fee.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.fee.create');
        $grades = $this->gradeService->all();
        $categories = $this->feeCategoryService->all();

        return view('user.admin.fees.fee.create', compact('breadcrumbs', 'grades', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->feeService->create($request->all());

        return redirect()->route('admin.fee.index');
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
        $breadcrumbs = $this->breadcrumbs::render('admin.fee.create');
        $grades = $this->gradeService->all();
        $categories = $this->feeCategoryService->all();
        $fee = $this->feeService->findOrFail($id);

        return view('user.admin.fees.fee.edit', compact('breadcrumbs', 'fee', 'grades', 'categories'));
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
        $this->feeService->update($id, $request->all());

        return redirect()->route('admin.fee.index');
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
