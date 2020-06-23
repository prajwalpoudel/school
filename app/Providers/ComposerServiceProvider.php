<?php

namespace App\Providers;

use App\ViewComposer\AdminMenuComposer;
use App\ViewComposer\StudentMenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminMenuComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['user.admin.includes.sidebar'],
            AdminMenuComposer::class
        );

        View::composer(
            ['user.student.includes.sidebar'],
            StudentMenuComposer::class
        );
    }
}
