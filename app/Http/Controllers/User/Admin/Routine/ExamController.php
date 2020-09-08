<?php

namespace App\Http\Controllers\User\Admin\Routine;

use App\Http\Controllers\Controller;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExamController extends Controller
{
    /**
     * @var Breadcrumbs
     */
    private $breadcrumbs;

    /**
     * GradeController constructor.
     * @param Breadcrumbs $breadcrumbs
     */
    public function __construct(Breadcrumbs $breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * @return Factory|View
     */
    public function index() {
        $breadcrumbs = $this->breadcrumbs::render('admin.section.index');

        return view('user.admin.routine.exam.index', compact('breadcrumbs'));
    }
}
