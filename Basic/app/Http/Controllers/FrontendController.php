<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index_page()
    {
        return view('frontend.index');
    }

    public function about_page()
    {
        return view('frontend.about');
    }

    public function services_page()
    {
        return view('frontend.services');
    }

    public function blog_page()
    {
        return view('frontend.blog');
    }

    public function blog_details_page()
    {
        return view('frontend.blog-deatails');
    }

    public function contact_page()
    {
        return view('frontend.contact');
    }

    public function portfolio_page()
    {
        return view('frontend.portfolio');
    }

    public function portfolio_details_page()
    {
        return view('frontend.portfolio-details');
    }
}
