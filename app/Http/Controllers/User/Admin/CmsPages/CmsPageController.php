<?php

namespace App\Http\Controllers\User\Admin\CmsPages;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\User\Admin\CmsPages\CmsPageService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    /**
     * @var CmsPageService
     */
    private $cmsPageService;
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * CmsPageController constructor.
     * @param CmsPageService $cmsPageService
     * @param Breadcrumbs $breadcrumbs
     * @param DatatableService $datatableService
     */
    public function __construct(
        CmsPageService $cmsPageService,
        Breadcrumbs $breadcrumbs,
        DatatableService $datatableService
    )
    {
        $this->cmsPageService = $cmsPageService;
        $this->breadcrumbs = $breadcrumbs;
        $this->datatableService = $datatableService;
    }

    /**
     * @return mixed
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.cms-page.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.cms-page.show',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query =  $this->datatableService->getData(
            'cms_pages',
            [],
            [
                'id',
                'section_title',
                'title',
                'description',
            ]
        );
        $query->editColumn('description', function ($data) {
            return strip_tags($data->description);
        });
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->rawColumns(['description', 'action']);

        return $query->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.index');

        return view('user.admin.cms_pages.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.section.create');

        return view('user.admin.cms_pages.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cmsPageService->create($request->all());
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
        //
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
        //
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
