<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Category;
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
            $cats = Category::latest()->take(2)->get();
            $view->with('cats', $cats);
        });
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }

//    public function boot()
//    {
//        Paginator::defaultView('vendor.pagination.simple-default');
//    }
}
