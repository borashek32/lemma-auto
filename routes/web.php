<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartsController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Posts;

//Common routes
Route::get('/', [SiteController::class, 'main'])->name('main');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/before', [SiteController::class, 'before'])->name('before');
Route::get('/possibilities', [SiteController::class, 'possibilities'])->name('possibilities');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/auto-parts', [AutopartsController::class, 'autoparts'])->name('autoparts');
Route::get('/partners', [AutopartsController::class, 'partners'])->name('partners');
Route::get('/law', [AutopartsController::class, 'law'])->name('law');
Route::get('/auto-magazine', [PostController::class, 'blog'])->name('blog');
Route::get('/post/{id}', [PostController::class, 'post'])->name('post');
Route::post('/post/{id}', [PostController::class, 'addComment'])->name('comment');
Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');
Route::get('/auto-magazine/category/{id}', [CategoryController::class, 'categories'])->name('category');

//Users dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('profile.show');
})->name('dashboard');
Route::get('/dashboard/contacts', [DashboardController::class, 'contacts'])->name('contacts');
//CRUD routes for an admin
Route::get('/dashboard/posts', Posts::class)->name('posts');
Route::get('dashboard/categories', Categories::class)->name('categories');

