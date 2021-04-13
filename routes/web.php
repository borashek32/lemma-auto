<?php

use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostLikeController;
use App\Http\Livewire\Admin\Contacts\Contacts;
use App\Http\Livewire\Admin\Shop\Autoparts;
use App\Http\Livewire\Admin\Blog\Categories;
use App\Http\Livewire\Admin\Blog\Comments;
use App\Http\Livewire\Admin\Reviews\Reviews;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AutopartController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Livewire\Admin\Users\Users;

// COMMON ROUTES
Route::get('/', [SiteController::class, 'main'])->name('main');
Route::post('/', [SiteController::class, 'submit'])->name('contact-form');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/before', [SiteController::class, 'before'])->name('before');
Route::get('/possibilities', [SiteController::class, 'possibilities'])->name('possibilities');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/auto-parts', [AutopartController::class, 'autoparts'])->name('auto-parts');
Route::get('/partners', [AutopartController::class, 'partners'])->name('partners');
Route::get('/law', [AutopartController::class, 'law'])->name('law');
Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about-us');

// BLOG
Route::get('/auto-magazine', [BlogController::class, 'blog'])->name('blog');
Route::get('/auto-magazine/posts/{slug}', [BlogController::class, 'onePost'])->name('post');
Route::post('/auto-magazine/posts/{slug}', [BlogController::class, 'addComment'])->name('comment');
Route::post('/auto-magazine/posts', [BlogController::class, 'reply'])->name('reply');
Route::get('/auto-magazine/category/{slug}', [BlogController::class, 'category'])->name('category');
Route::post('/auto-magazine/posts/{post}/likes', [PostLikeController::class, 'store'])->name('post.like');
Route::delete('/auto-magazine/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('post.like');

Route::get('/reviews', [ReviewController::class, 'reviewsPost'])->name('reviews');
Route::post('/reviews', [ReviewController::class, 'reviewsWrite'])->name('reviews-form');


// USERS DASHBOARD
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('profile.welcome');
})->name('welcome');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/profile', function () {
    return view('profile.show');
})->name('profile');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/contacts', function () {
    return view('profile.contacts');
})->name('contacts');

// CRUD ROUTES FOR ADMIN
Route::group(['middleware' => ['role:super-admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::resource('/members', MemberController::class);
        Route::resource('/posts', PostController::class);
        Route::resource('/advertisements', AdvertisementController::class);
        Route::get('/categories', Categories::class)->name('cats');
        Route::get('/comments', Comments::class)->name('comments-admin');
        Route::get('/users', Users::class)->name('users');
        Route::get('/reviews', Reviews::class)->name('reviews-admin');
        Route::get('/auto-parts', Autoparts::class)->name('auto-parts-admin');
        Route::get('/offices', Contacts::class)->name('offices');
    });
});

