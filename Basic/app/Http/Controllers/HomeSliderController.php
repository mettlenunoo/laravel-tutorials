<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeSliderController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        
        $homeslider = HomeSlider::find(1);

        return view('home-slider.show-slider' ,compact('homeslider','userData'));
    }

        public function update(Request $request)
    {
        $slider_id = HomeSlider::find(1);

    }
}
