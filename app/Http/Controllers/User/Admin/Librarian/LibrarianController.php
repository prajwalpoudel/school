<?php

namespace App\Http\Controllers\User\Admin\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use App\School\Constants\RoleConstant;
use App\Services\User\Admin\Librarian\LibrarianService;
use App\Services\General\DatatableService;

class LibrarianController extends Controller
{
     /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var LibrarianService
     */
    private $librarianService;
     /**
     * @var DatatableService
     */
    private $datatableService;
     /**
     * AccountantController constructor.
     * @param Breadcrumbs $breadcrumbs
     */
    public function __construct(
        DatatableService $datatableService,
        Breadcrumbs $breadcrumbs,
        LibrarianService $librarianService

    )
    {
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->librarianService = $librarianService;

       
    }
     public function list() {
        $actionData = [
            'edit' => true,
            'editUrl' => 'admin.librarian.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => true,
            'deleteUrl' => 'admin.librarian.destroy',
            'deleteIcon' => '',
            'deleteClass' => '',
            'view' => true,
            'viewUrl' => 'admin.librarian.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'librarians',
            [
                [
                    'name' => 'users',
                    'first' => 'users.id',
                    'second' => 'librarians.user_id',
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
                'librarians.id as librarian_id',
                'first_name',
                'last_name',
                'user_details.phone',
                'email',
                'user_details.address',
                'salary'
            ]
        );


        $query->addColumn('action', function ($data) use($actionData) {
            $id = (int) $data->librarian_id;
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
         $breadcrumbs = $this->breadcrumbs::render('admin.student.index');

        return view('user.admin.librarian.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.student.create');
        return view('user.admin.librarian.create', compact('breadcrumbs'));
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
                'role_id' => RoleConstant::LIBRARIAN_ROLE_ID,
                'password' => bcrypt('password'),
            ]
        );

        $this->librarianService->store($storeData);

        return redirect()->route('admin.librarian.index');
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
        $librarian = $this->librarianService->findOrFail($id);
        $librarian->load(['user.detail']);
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');


        return view('user.admin.librarian.edit', compact('breadcrumbs', 'librarian'));
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
        $this->librarianService->update($request->all(), $id);

        return redirect()->route('admin.librarian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->librarianService->destroy($id);

        return redirect()->back()->withInput();
    }
}
