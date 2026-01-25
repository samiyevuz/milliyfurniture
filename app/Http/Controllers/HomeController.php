<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index(): View
    {
        return view('frontend.home');
    }

    /**
     * Display the gallery page.
     */
    public function gallery(): View
    {
        return view('frontend.gallery');
    }

    /**
     * Display the contact page.
     */
    public function contact(): View
    {
        return view('frontend.contact');
    }
}
