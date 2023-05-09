<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index_page()
    {
        $homeslider = HomeSlider::find(1);

        $aboutData = About::find(1);

        return view('frontend.index' ,compact('homeslider','aboutData'));
    }

    public function about_page()
    {
        $aboutData = About::find(1);

        return view('frontend.about' ,compact('aboutData'));
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
