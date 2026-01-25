<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryControllerV2;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->middleware('guest')
        ->name('login');
    Route::post('/login', [LoginController::class, 'login'])
        ->middleware('guest')
        ->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])
        ->middleware('auth')
        ->name('logout');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
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
    | Testimonials CRUD
    */
    Route::resource('testimonials', TestimonialController::class)
        ->except(['show']);

    /*
    | Settings
    */
    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

    /*
    | Contact Management
    */
    Route::get('/contact', [ContactController::class, 'index'])
        ->name('contact');
});
