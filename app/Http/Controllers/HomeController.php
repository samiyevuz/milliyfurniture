<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index(): View
    {
        $categories = Category::active()
            ->withCount('products')
            ->latest()
            ->take(6)
            ->get();

        $testimonials = Testimonial::active()
            ->ordered()
            ->get();

        return view('frontend.home', compact('categories', 'testimonials'));
    }

    /**
     * Display the categories page.
     */
    public function gallery(): View
    {
        $categories = Category::active()
            ->withCount('products')
            ->latest()
            ->get();

        return view('frontend.gallery', compact('categories'));
    }

    /**
     * Display products in a category.
     */
    public function categoryProducts(Category $category): View
    {
        $products = Product::where('category_id', $category->id)
            ->active()
            ->latest()
            ->paginate(12);

        return view('frontend.category-products', compact('category', 'products'));
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }
}
