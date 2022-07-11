<?php

namespace App\Providers;

use App\Models\Site;
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
        $viewShare['site'] = Site::first();
        view()->share($viewShare);

        view()->composer('includes.slider', function ($view) {
            $view->with([
                'sliders' => \App\Models\HomePageSlide::latest()->get()
            ]);
        });

        view()->composer('admin.dashboard', function ($view) {
            $view->with([
                'department_count' => \App\Models\Department::count(),
                'last_department' => \App\Models\Department::latest()->limit(1)->first(),
                'student_count' => \App\Models\User::count(),
                'last_student' => \App\Models\User::latest()->limit(1)->first(),
                'testimony_count' => \App\Models\Testimony::count(),
                'last_testimony' => \App\Models\Testimony::latest()->limit(1)->first(),
                'slider_count' => \App\Models\HomePageSlide::count(),
                'last_slider' => \App\Models\HomePageSlide::latest()->limit(1)->first()
            ]);
        });
    }
}
