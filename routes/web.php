<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Admin\Advertisements\Advs;
use App\Http\Livewire\Admin\Contacts\Contacts;
use App\Http\Livewire\Admin\Shop\Autoparts;
use App\Http\Livewire\Admin\Blog\Categories;
use App\Http\Livewire\Admin\Blog\Comments;
use App\Http\Livewire\User\Blog\OneCat;
use App\Http\Livewire\Admin\Reviews\Reviews;
use App\Http\Livewire\Admin\Shop\Sections;
use App\Http\Livewire\User\Blog\PostOne;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Admin\Blog\Posts;
use App\Http\Livewire\Admin\Users\Users;

//Common routes
Route::get('/', [SiteController::class, 'main'])->name('main');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/before', [SiteController::class, 'before'])->name('before');
Route::get('/possibilities', [SiteController::class, 'possibilities'])->name('possibilities');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/auto-parts', [AutopartController::class, 'autoparts'])->name('auto-parts');
Route::get('/partners', [AutopartController::class, 'partners'])->name('partners');
Route::get('/law', [AutopartController::class, 'law'])->name('law');
Route::get('/auto-magazine', [PostController::class, 'blog'])->name('blog');
Route::get('/auto-magazine/posts/{slug}', PostOne::class)->name('post');
Route::post('/auto-magazine/posts/{slug}', [PostController::class, 'addComment'])->name('comment');
Route::post('/auto-magazine/posts', [PostController::class, 'reply'])->name('reply');
Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');
Route::get('/auto-magazine/category/{slug}', OneCat::class)->name('category');

//Users dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('profile.welcome');
})->name('welcome');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/profile', function () {
    return view('profile.show');
})->name('profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/contacts', function () {
    return view('profile.contacts');
})->name('contacts');
//Route::get('/dashboard/cart/{slug} ', Cart::class)->name('cart');
//CRUD routes for an admin
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/posts', Posts::class)->name('posts');
        Route::get('/categories', Categories::class)->name('cats');
        Route::get('/comments', Comments::class)->name('comments-admin');
        Route::get('/users', Users::class)->name('users');
        Route::get('/reviews', Reviews::class)->name('reviews-admin');
        Route::get('/advertisements-in-blog', Advs::class)->name('advs-blog');
        Route::get('/sections', Sections::class)->name('sections');
        Route::get('/auto-parts', Autoparts::class)->name('auto-parts-admin');
        Route::get('/offices', Contacts::class)->name('offices');
    });
});

