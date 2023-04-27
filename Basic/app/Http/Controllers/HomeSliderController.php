<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HomeSliderController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        
        $homeslider = HomeSlider::find(1);

        return view('backend.home-slider.show-slider' ,compact('homeslider','userData'));
    }

        public function update(Request $request)
    {
        $slider_id = HomeSlider::find(1)->id;

        if ($request->file('slider_image')) {
            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('uploads/home-slider-image/'.$name_gen);

            $save_url = 'uploads/home-slider-image/'.$name_gen;


            HomeSlider::find($slider_id)->update([
                'title_underlined' => $request->title_underlined,
                'title' => $request->title,
                'title_text' => $request->title_text,
                'slider_img' => $save_url,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);




        }else{
            HomeSlider::find($slider_id)->update([
                'title_underlined' => $request->title_underlined,
                'title' => $request->title,
                'title_text' => $request->title_text,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }
        

    }

}
