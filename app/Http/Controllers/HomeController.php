<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function gallery()
    {
        return view('frontend.gallery');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
