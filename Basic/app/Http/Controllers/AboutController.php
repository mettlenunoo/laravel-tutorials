<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        
        $aboutData = About::find(1);

        return view('backend.about-info.about-info', compact('aboutData','userData'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $about_id = About::find(1)->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(553,997)->save('uploads/about-images/'.$name_gen);

            $save_url = 'uploads/about-images/'.$name_gen;


            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'title_text' => $request->title_text,
                'abt_page_img' => $save_url,
                'short_desc' => $request->short_desc,
                'main_desc' => $request->main_desc,
            ]);

            $notification = array(
                'message' => 'About Info Updated With Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);




        }else{
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'title_text' => $request->title_text,
                'short_desc' => $request->short_desc,
                'main_desc' => $request->main_desc,
            ]);

            $notification = array(
                'message' => 'About Info Updated Without Image Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        }

    }

}
