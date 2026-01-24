<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryControllerV2;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;


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

    /*
    | Testimonials CRUD (Mijozlar fikri)
    */
    Route::resource('testimonials', TestimonialController::class)
        ->except(['show']);

    /* Settings CRUD */
    
    Route::get('/settings', [SettingController::class, 'index'])
    ->name('admin.settings.index');

Route::post('/settings', [SettingController::class, 'update'])
    ->name('admin.settings.update');


/*
| Contact CRUD
*/
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');


});
