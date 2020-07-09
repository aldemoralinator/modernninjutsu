<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use JD\Cloudder\Facades\Cloudder;

class ImageUploadController extends Controller
{
    public function home()
    {
        return view('home');
    }
     
    public function uploadImages(Request $request)
    { 

        $this->validate($request,[
            'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        ]);
 
        $image = $request->file('image_name');
 
        $name = $request->file('image_name')->getClientOriginalName();
 
        $image_name = $request->file('image_name')->getRealPath();;
 
        Cloudder::upload($image_name, null);
 
        list($width, $height) = getimagesize($image_name);
 
        return $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
 
        //save to uploads directory
        // $image->move(public_path("uploads"), $name);
 
        //Save images
        // $this->saveImages($request, $image_url);
 
        // return redirect()->back()->with('status', 'Image Uploaded Successfully');

        // $this->validate($request,[
        //     'image_name'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
        // ]);
    
        // $image_name = $request->file('image_name')->getRealPath();;
    
        // $path = Cloudder::upload($image_name, null);
        // return var_dump($path->uploadedResult);        
        
        // return json_encode($path);
        // return redirect()->back()->with('status', 'Image Uploaded Successfully');
     
    }
}
