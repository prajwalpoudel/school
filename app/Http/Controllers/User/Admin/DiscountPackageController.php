<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\DiscountPackageService;
use App\Services\General\FeeCategoryService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DiscountPackageController extends Controller
{
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var DiscountPackageService
     */
    private $discountPackageService;
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var FeeCategoryService
     */
    private $feeCategoryService;

    /**
     * DiscountPackageController constructor.
     * @param DatatableService $datatableService
     * @param DiscountPackageService $discountPackageService
     * @param Breadcrumbs $breadcrumbs
     * @param FeeCategoryService $feeCategoryService
     */
    public function __construct(
        DatatableService $datatableService,
        DiscountPackageService $discountPackageService,
        Breadcrumbs $breadcrumbs,
        FeeCategoryService $feeCategoryService
    )
    {
        $this->datatableService = $datatableService;
        $this->discountPackageService = $discountPackageService;
        $this->breadcrumbs = $breadcrumbs;
        $this->feeCategoryService = $feeCategoryService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list()
    {
        $actionData = [
            'icon' => true,
            'text' => false,
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.discount_package.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.grade.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'discount_packages',
            [
                [
                    'name' => 'discount_package_fee_category',
                    'first' => 'discount_packages.id',
                    'second' => 'discount_package_fee_category.discount_package_id',
                    'joins' => [
                        [
                            'name' => 'fee_categories',
                            'first' => 'discount_package_fee_category.fee_category_id',
                            'second' => 'fee_categories.id',
                            'joins' => []
                        ]
                    ]
                ]
            ],
            [
                'discount_packages.id as id',
                'discount_packages.name as name',
                'discount_packages.description as description',
                'amount',
                'is_percent',
                DB::raw('group_concat(fee_categories.name) as fee_category'),
            ],
            'discount_packages.id'
        );
        $query->editColumn('fee_category', function ($data) {
            $returnData = '<ul>';
            foreach (explode(',', $data->fee_category) as $category) {
                $returnData .= '<li>' . $category . '</li>';
            }
            $returnData .= '</ul>';

            return $returnData;
        });
        $query->editColumn('amount', function ($data) {
            if ($data->is_percent) {
                return $data->amount . ' % ';
            }
            return ' Nrs ' . $data->amount;
        });
        $query->editColumn('description', function ($data) {
            return strip_tags(Str::limit($data->description, 100));
        });
        $query->addColumn('action', function ($data) use ($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['fee_category', 'amount', 'description', 'action']);
        return $query->make();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.discount_package.index');

        return view('user.admin.discountPackage.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.discount_package.create');
        $feeCategories = $this->feeCategoryService->all();

        return view('user.admin.discountPackage.create', compact('breadcrumbs', 'feeCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->discountPackageService->create($request->all());

        return redirect()->route('admin.discount_package.index');
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
        $breadcrumbs = $this->breadcrumbs::render('admin.discount_package.create');
        $discountPackage = $this->discountPackageService->findOrFail($id);
        $feeCategories = $this->feeCategoryService->all();

        return view('user.admin.discountPackage.edit', compact('breadcrumbs', 'discountPackage', 'feeCategories'));
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
        $this->discountPackageService->update($id, $request->all());

        return redirect()->route('admin.discount_package.index');
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
