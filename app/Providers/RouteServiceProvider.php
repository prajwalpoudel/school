<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * This namespace is applied to your admin controller routes.
     *
     * In addition, it is set as the URL generator's admin namespace.
     *
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\User\Admin';

    /**
     * This namespace is applied to your student controller routes.
     *
     * In addition, it is set as the URL generator's student namespace.
     *
     * @var string
     */
    protected $studentNamespace = 'App\Http\Controllers\User\Student';

    /**
     * This namespace is applied to your parent controller routes.
     *
     * In addition, it is set as the URL generator's parent namespace.
     *
     * @var string
     */
    protected $teacherNamespace = 'App\Http\Controllers\User\Teacher';

    /**
     * This namespace is applied to your parent controller routes.
     *
     * In addition, it is set as the URL generator's parent namespace.
     *
     * @var string
     */
    protected $parentNamespace = 'App\Http\Controllers\User\Parent';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The path to the "student" route for your application.
     *
     * @var string
     */
    public const STUDENT = '/student';

    /**
     * The path to the "teacher" route for your application.
     *
     * @var string
     */
    public const TEACHER = '/teacher';

    /**
     * The path to the "parent" route for your application.
     *
     * @var string
     */
    public const PARENT = '/parent';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapStudentRoutes();

        $this->mapTeacherRoutes();

        $this->mapParentRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->prefix('admin')
            ->name('admin.')
            ->namespace($this->adminNamespace)
            ->group(function ($route) {
//                require base_path('routes/user/admin/student/student.php');
                require base_path('routes/user/admin/admin.php');
            });
    }

    protected function mapStudentRoutes()
    {
        Route::middleware('web')
            ->prefix('student')
            ->name('student.')
            ->namespace($this->studentNamespace)
            ->group(base_path('routes/user/student/student.php'));
    }

    protected function mapTeacherRoutes()
    {
        Route::middleware('web')
            ->prefix('teacher')
            ->name('teacher.')
            ->namespace($this->teacherNamespace)
            ->group(base_path('routes/user/teacher/teacher.php'));
    }

    protected function mapParentRoutes()
    {
        Route::middleware('web')
            ->prefix('parent')
            ->name('parent.')
            ->namespace($this->parentNamespace)
            ->group(base_path('routes/user/parent/parent.php'));
    }
}
