<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CategoryProduct;

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
        //
        view()->composer('pages.index', function ($view) {
            $category = CategoryProduct::all();
            $viewData = [
                'category' => $category,
            ];
            $view->with('pages.index', $viewData);
        });
    }
}
