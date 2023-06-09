<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\About;
use App\Models\MultiImage;
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

    public function aboutMultiImage()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        // $aboutData = MultiImage::find(1);

        return view('backend.about-info.about-multi-image', compact('userData'));
    }

    public function storeMultiImage(Request $request)
    {
        if ($request->file('multi_image'))
        {
            $image = $request->file('multi_image');

            foreach ($image as $multi_image)
            {
                $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

                Image::make($multi_image)->resize(220,220)->save('uploads/about-multi-images/'.$name_gen);

                $save_url = 'uploads/about-multi-images/'.$name_gen;


                MultiImage::insert([
                    'multi_image' => $save_url,
                    'created_at' => Carbon::now(),
                ]);

            }

            $notification = array(
                'message' => 'About Multiple Images Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.about.multi.image')->with($notification);

        }else{
            $notification = array(
                'message' => 'Please upload images',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }






    }

    public function allAboutMultiImage()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $multiImageData = MultiImage::all();

        $counter = 1;

        return view('backend.about-info.all-about-multi-image', compact('userData' , 'multiImageData','counter'));
    }

    public function editAboutMultiImage($imgId)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        $singleImage =  MultiImage::findorfail($imgId);


        return view('backend.about-info.edit-about-multi-image', compact('userData' , 'singleImage'));

    }

    public function updateSingleMultiImage(Request $request, $imgId)
    {

        if($request->file('multi_image')){
            // first delete the image from the upload file
            $singleImage = MultiImage::findorfail($imgId);
            $deleteImage = $singleImage->multi_image;
            unlink($deleteImage);

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(220,220)->save('uploads/about-multi-images/'.$name_gen);

            $save_url = 'uploads/about-multi-images/'.$name_gen;


            MultiImage::findorfail($imgId)->update([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
        ]);

        }

        $notification = array(
            'message' => 'Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.about.multi.image')->with($notification);
    }

    public function deleteSingleMultiImage($id)
    {
        $singleImage = MultiImage::findorfail($id);
        $image = $singleImage->multi_image;
        unlink($image);

        MultiImage::findorfail($id)->delete();


        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
