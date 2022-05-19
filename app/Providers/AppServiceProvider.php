<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Advertisement;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('*',function($view){
            $advs = Advertisement::latest()->take(2)->get();
            $view->with('advs', $advs);
        });
        view()->composer('*',function($view){
            $cats = Category::latest()->take(2)->get();
            $view->with('cats', $cats);
        });
    }

//    public function boot()
//    {
//        Paginator::defaultView('vendor.pagination.simple-default');
//    }
}
