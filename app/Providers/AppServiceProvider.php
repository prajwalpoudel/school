<?php

namespace App\Providers;

use App\View\Components\Inputs\bootstrapDependentSelect;
use App\View\Components\Inputs\bootstrapSelect;
use App\View\Components\Inputs\Text;
use App\View\Components\Portlets\Base;
use App\View\Components\tables\datatable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::component('portlets.base', Base::class);
        Blade::component('inputs.text', Text::class);
        Blade::component('inputs.bootstrap-select', bootstrapSelect::class);
        Blade::component('inputs.bootstrap-dependent-select', bootstrapDependentSelect::class);
        Blade::component('tables.datatable', Datatable::class);

    }
}
