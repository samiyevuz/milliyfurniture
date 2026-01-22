<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryControllerV2;

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

    // Dashboard
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // Categories CRUD
    Route::get('/categories', [CategoryControllerV2::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [CategoryControllerV2::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryControllerV2::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{category}/edit', [CategoryControllerV2::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{category}', [CategoryControllerV2::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{category}', [CategoryControllerV2::class, 'destroy'])
        ->name('categories.destroy');
});
