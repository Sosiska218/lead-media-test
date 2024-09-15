<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Blade::component(\App\View\Components\Form::class, 'form');

        View::composer('pages.employee.*', function (\Illuminate\View\View $view) {
            $view->with('companies', Company::query()->latest()->get());
        });
    }
}
