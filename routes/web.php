<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
});


use App\Http\Controllers\Admin\CategoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');
});

use App\Http\Controllers\Admin\CategoryControllerV2;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/categories', [CategoryControllerV2::class, 'index'])
        ->name('categories.index');
});
