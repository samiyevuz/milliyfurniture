<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $categoriesCount = Category::count();
        $productsCount = Product::count();
        $galleryCount = 0;
        
        $latestProducts = Product::with('category')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'productsCount',
            'galleryCount',
            'latestProducts'
        ));
    }
}
