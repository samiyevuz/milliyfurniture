<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            ->latest()
            ->get();

        return view('frontend.gallery', compact('categories'));
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }
}
