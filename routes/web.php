<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\Blog\PostsController;
use App\Http\Controllers\Admin\Reviews\ReviewsController;
use App\Http\Controllers\Admin\users\UsersController;

//Common routes
Route::get('/', function () {return view('main');});

Route::post('/', [SiteController::class, 'submit'])->name('contact-form');

Route::get('/services', [SiteController::class, 'services'])->name('services');

Route::get('/before', [SiteController::class, 'before'])->name('before');

Route::get('/possibilities', [SiteController::class, 'possibilities'])->name('possibilities');

Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

Route::get('/autoparts', [AutopartsController::class, 'autoparts'])->name('autoparts');

Route::get('/partners', [AutopartsController::class, 'partners'])->name('partners');

Route::get('/law', [AutopartsController::class, 'law'])->name('law');

Route::get('/blog', [PostController::class, 'blog'])->name('posts');

Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');


//CRUD routes
Route::resource('/admin/posts', PostsController::class)->names([
    'index' => 'admin.posts',
    'create' => 'admin.posts.create',
    'store' => 'admin.posts.store',
    'edit'  => 'admin.posts.edit',
    'update' => 'admin.posts.update',
    'show' => 'admin.posts.show',
    'destroy' => 'admin.posts.destroy'
]);

Route::resource('/admin/reviews', ReviewsController::class)->names([
    'index' => 'admin.reviews',
    'destroy' => 'admin.reviews.destroy'
]);
Route::resource('/admin/users', UsersController::class)->names([
    'index' => 'admin.users',
    'destroy' => 'admin.users.delete'
]);

//Route::resources([
//    'admin/posts' => PostsController::class,
//    'admin/reviews' => ReviewsController::class,
//    'admin/users' => UsersController::class,
//]);



//Users dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/user/profile/contacts', function () {
    return view('profile/contacts');
});

