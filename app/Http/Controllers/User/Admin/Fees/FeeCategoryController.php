<?php

namespace App\Http\Controllers\User\Admin\Fees;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\FeeCategoryService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeeCategoryController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var FeeCategoryService
     */
    private $feeCategoryService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * FeeCategoryController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param FeeCategoryService $feeCategoryService
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        FeeCategoryService $feeCategoryService,
        DatatableService $datatableService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->feeCategoryService = $feeCategoryService;
        $this->datatableService = $datatableService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.fee_category.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.fee_category.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'fee_categories',
            null,
            [
                'id',
                'name',
                'description',
            ]
        );
        $query->editColumn('description', function ($data){
            return strip_tags(Str::limit($data->description, 100));
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['amount', 'description', 'action']);
        return $query->make();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.fee_category.index');

        return view('user.admin.fees.feeCategory.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.fee_category.create');

        return view('user.admin.fees.feeCategory.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->feeCategoryService->create($request->all());

        return redirect()->route('admin.fee_category.index');
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
        $breadcrumbs = $this->breadcrumbs::render('admin.fee_category.create');
        $feeCategory = $this->feeCategoryService->findOrFail($id);

        return view('user.admin.fees.feeCategory.edit', compact('breadcrumbs', 'feeCategory'));
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
        $this->feeCategoryService->update($id, $request->all());

        return redirect()->route('admin.fee_category.index');
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
