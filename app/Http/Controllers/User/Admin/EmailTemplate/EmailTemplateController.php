<?php

namespace App\Http\Controllers\User\Admin\EmailTemplate;

use App\Http\Controllers\Controller;
use App\Services\General\DatatableService;
use App\Services\General\EmailTemplateService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmailTemplateController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;
    /**
     * @var DatatableService
     */
    private $datatableService;

    /**
     * EmailTemplateController constructor.
     * @param Breadcrumbs $breadcrumbs
     * @param EmailTemplateService $emailTemplateService
     * @param DatatableService $datatableService
     */
    public function __construct(
        Breadcrumbs $breadcrumbs,
        EmailTemplateService $emailTemplateService,
        DatatableService $datatableService
    )
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->emailTemplateService = $emailTemplateService;
        $this->datatableService = $datatableService;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function list() {
        $actionData = [
            'icon' => true,
            'text' => false,
            'edit' => true,
            'editUrl' => 'admin.email_template.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.grade.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'email_templates',
            null,
            [
                'id',
                'title',
                'subject',
                'content',
                'email_from'
            ]
        );
        $query->addColumn('action', function ($data) use($actionData) {
            $id = $data->id;
            return view('general.datatable.action', compact('actionData', 'id'));
        });
        $query->editColumn('content', function ($data) {
            return strip_tags(Str::limit($data->content, 100));
        });
        $query->rawColumns(['content', 'action']);
        return $query->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.email_template.index');

        return view('user.admin.emailTemplate.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.email_template.index');

        return view('user.admin.emailTemplate.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->emailTemplateService->create($request->all());

        return redirect()->route('admin.email_template.index');
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
        $emailTemplate = $this->emailTemplateService->findOrFail($id);

        return view('user.admin.emailTemplate.edit', compact('breadcrumbs', 'emailTemplate'));
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
        $this->emailTemplateService->update($id, $request->all());

        return redirect()->route('admin.email_template.index');
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
