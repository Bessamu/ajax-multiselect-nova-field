<?php

namespace Bessamu\AjaxMultiselectNovaField;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('ajax-multiselect', __DIR__.'/../dist/js/field.js');
            Nova::style('ajax-multiselect', __DIR__.'/../dist/css/field.css');
        });

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
