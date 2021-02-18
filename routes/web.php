<?php

use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Advs;
use App\Http\Livewire\Autoparts;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Comments;
use App\Http\Livewire\OneCat;
use App\Http\Livewire\PostOne;
use App\Http\Livewire\Reviews;
use App\Http\Livewire\Sections;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Posts;
use App\Http\Livewire\Users;

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
    return view('profile.show');
})->name('dashboard');
Route::get('/dashboard/contacts', [DashboardController::class, 'contacts'])->name('contacts');
//CRUD routes for an admin
Route::get('/dashboard/posts', Posts::class)->name('posts');
Route::get('/dashboard/categories', Categories::class)->name('cats');
Route::get('/dashboard/comments', Comments::class)->name('comments-admin');
Route::get('/dashboard/users', Users::class)->name('users');
Route::get('/dashboard/reviews', Reviews::class)->name('reviews-admin');
Route::get('/dashboard/advertisements-in-blog', Advs::class)->name('advs-blog');
Route::get('/dashboard/sections', Sections::class)->name('sections');
Route::get('/dashboard/auto-parts', Autoparts::class)->name('auto-parts-admin');

