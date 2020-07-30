<?php

namespace App\Http\Controllers\User\Admin\Library;

use App\Entities\Book;
use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Services\General\DatatableService;
use App\Services\General\Library\CategoryService;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Str;

class BookController extends Controller
{
    /**
     * @var BookService
     */
    private $bookService;
    /**
     * @var DatatableService
     */
    private $datatableService;
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * BookController constructor.
     * @param BookService $bookService
     * @param DatatableService $datatableService
     * @param Breadcrumbs $breadcrumbs
     * @param CategoryService $categoryService
     */
    public function __construct(
        BookService $bookService,
        DatatableService $datatableService,
        Breadcrumbs $breadcrumbs,
        CategoryService $categoryService
    )
    {
        $this->bookService = $bookService;
        $this->datatableService = $datatableService;
        $this->breadcrumbs = $breadcrumbs;
        $this->categoryService = $categoryService;
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
            'editUrl' => 'admin.library.book.edit',
            'editIcon' => '',
            'editClass' => '',
            'delete' => false,
            'view' => true,
            'viewUrl' => 'admin.library.book.edit',
            'viewIcon' => '',
            'viewClass' => '',
        ];

        $query = $this->datatableService->getData(
            'books',
            [
                [
                    'name' => 'book_categories',
                    'first' => 'book_categories.id',
                    'second' => 'books.category_id',
                    'joins' => []
                ],
            ],
            [
                'books.id as id',
                'books.name as name',
                'book_categories.name as category',
                'books.code as code',
                'publication',
                'edition',
                'author',
                'price'
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
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.index');

        return view('user.admin.library.book.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = $this->breadcrumbs::render('admin.grade.create');
        $categories = $this->categoryService->all();

        return view('user.admin.library.book.create', compact('breadcrumbs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $noOfBooks = $request->no_of_books;
        $categoryCode = $this->categoryService->findOrFail($request->category_id)->code;
        for ($i=1; $i<=$noOfBooks; $i++) {
            $code = $this->generateUniqueCode($categoryCode);
            $storeData = array_merge(
                $request->all(),
                [
                    'code' => $code,
                ]
            );
            $this->bookService->create($storeData);
        }

        return redirect()->route('admin.library.book.index');
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
        $book = $this->bookService->findOrFail($id);
        $categories = $this->categoryService->all();


        return view('user.admin.library.book.edit', compact('breadcrumbs', 'book', 'categories'));
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
        $this->bookService->update($id, $request->all());

        return redirect()->route('admin.library.book.index');
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

    /**
     * @param $categoryCode
     * @return string
     * @throws \Exception
     */
    public function generateUniqueCode($categoryCode) {
        $code = $categoryCode.'-'.random_int(1000,9999).'-'.random_int(1000,9999);
        $validator = Validator::make(['code' => $code], ['code'=>'unique:books,code']);
        if($validator->fails()) {
            $this->generateUniqueCode($categoryCode);
        }

        return $code;
    }
}
