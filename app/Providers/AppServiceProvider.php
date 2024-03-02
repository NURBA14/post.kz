<?php

namespace App\Providers;

use App\Rubric;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
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
        // Прослушка запросов и привязок
        DB::listen(function ($query) {
            Log::channel("sqllogs")->info($query->sql);
            // dump($query->sql);
            // dump($query->bindings);
        });
        View::composer("layouts.footer", function ($view) {
            $view->with("rubrics", Rubric::all());
        });

    }
}
