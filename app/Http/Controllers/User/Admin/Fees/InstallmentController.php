<?php

namespace App\Http\Controllers\User\Admin\Fees;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\FeeCategoryService;
use App\Services\General\InstallmentService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InstallmentController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var InstallmentService
     */
    private $installmentService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var FeeCategoryService
     */
    private $feeCategoryService;

    /**
     * InstallmentController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param InstallmentService $installmentService
     * @param DatatableService $datatableService
     * @param FeeCategoryService $feeCategoryService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        InstallmentService $installmentService,
        DatatableService $datatableService,
        FeeCategoryService $feeCategoryService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->installmentService = $installmentService;
        $this->datatableService = $datatableService;
        $this->feeCategoryService = $feeCategoryService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.installment.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.installment.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'installments',
            [
                [
                    'name' => 'installment_fee_category',
                    'first' => 'installments.id',
                    'second' => 'installment_fee_category.installment_id',
                    'joins' => [
                        [
                            'name' => 'fee_categories',
                            'first' => 'installment_fee_category.fee_category_id',
                            'second' => 'fee_categories.id',
                            'joins' => []
                        ]
                    ]
                ]

            ],
            [
                'installments.id as id',
                'installments.name as name',
                'status',
                DB::raw('group_concat(fee_categories.name) as fee_category'),
            ],
            'installments.id'
        );


        $query->editColumn('fee_category', function ($data) {
            if($data->fee_category) {
                $returnData = '<ul>';
                foreach (explode(',', $data->fee_category) as $category) {
                    $returnData .= '<li>' . $category . '</li>';
                }
                $returnData .= '</ul>';

                return $returnData;
            }
            return '';
        });
        $query->editColumn('status', function ($data) {
            $name = 'published_status';
            $checked = false;
            $disabled = false;
            if($data->status == 1) {
                $checked = true;
                $disabled = true;
                return view('general.datatable.switch', compact('name', 'disabled', 'checked'));
            }
            return view('general.datatable.switch', compact('name', 'disabled', 'checked'));
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['status', 'action', 'fee_category']);

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

        return view('user.admin.installment.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');
        $feeCategories = $this->feeCategoryService->all();

        return view('user.admin.installment.create', compact('breadcrumbs', 'feeCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->installmentService->create($request->all());

        return redirect()->route('admin.installment.index');
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
        $feeCategories = $this->feeCategoryService->all();
        $installment = $this->installmentService->findOrFail($id);

        return view('user.admin.installment.edit', compact('breadcrumbs', 'installment', 'feeCategories'));
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
        $this->installmentService->update($id, $request->all());

        return redirect()->route('admin.installment.index');
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
