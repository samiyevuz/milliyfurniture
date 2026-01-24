<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryControllerV2;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;

/*
|--------------------------------------------------------------------------
| Frontend routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    | Dashboard
    */
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    | Categories CRUD
    */
    Route::resource('categories', CategoryControllerV2::class)
        ->except(['show']);

    /*
    | Products CRUD
    */
    Route::resource('products', ProductController::class)
        ->except(['show']);
});

/*
|--------------------------------------------------------------------------
| Testimonials CRUD
|--------------------------------------------------------------------------
*/
Route::get('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'index'])
    ->name('testimonials.index');

Route::get('/testimonials/create', [\App\Http\Controllers\Admin\TestimonialController::class, 'create'])
    ->name('testimonials.create');

Route::post('/testimonials', [\App\Http\Controllers\Admin\TestimonialController::class, 'store'])
    ->name('testimonials.store');

Route::get('/testimonials/{testimonial}/edit', [\App\Http\Controllers\Admin\TestimonialController::class, 'edit'])
    ->name('testimonials.edit');

Route::put('/testimonials/{testimonial}', [\App\Http\Controllers\Admin\TestimonialController::class, 'update'])
    ->name('testimonials.update');

Route::delete('/testimonials/{testimonial}', [\App\Http\Controllers\Admin\TestimonialController::class, 'destroy'])
    ->name('testimonials.destroy');
