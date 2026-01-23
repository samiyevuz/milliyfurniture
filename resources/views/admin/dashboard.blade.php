<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery; // agar gallery modeli bo‘lsa

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        $productsCount   = Product::count();

        // Agar Gallery modeli YO‘Q bo‘lsa, 0 qilib qo‘yamiz
        $galleryCount = class_exists(Gallery::class)
            ? Gallery::count()
            : 0;

        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'productsCount',
            'galleryCount',
            'latestProducts'
        ));
    }
}
