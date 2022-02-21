<?php

namespace App\Providers;

use App\Models\Post;
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
            $lastPosts = Post::latest()->take(1)->get();
            $view->with('lastPosts', $lastPosts );
        });
        Paginator::defaultView('vendor.pagination.bootstrap-4');
    }

//    public function boot()
//    {
//        Paginator::defaultView('vendor.pagination.simple-default');
//    }
}
