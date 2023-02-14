<?php

namespace App\Providers;

use App\Models\Project;
use App\Models\Service;
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
        $services = Service::all();
        view()->share('services',$services);

        $projects = Project::all();
        view()->share('projects',$projects);
    }
}
