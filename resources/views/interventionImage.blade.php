https://artisansweb.net/resize-image-laravel-using-intervention-image-library/
composer require intervention/image
Intervention\Image\ImageServiceProvider::class
'Image' => Intervention\Image\Facades\Image::class
//run for making folder in public
php artisan storage:link   

<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Image;
 
class ImageController extends Controller
{
 public function store(Request $request)
{
    if($request->hasFile('profile_image')) {
        //get filename with extension
        $filenamewithextension = $request->file('profile_image')->getClientOriginalName();
 
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('profile_image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
        $request->file('profile_image')->storeAs('public/profile_images/thumbnail', $filenametostore);
 
        //Resize image here
        $thumbnailpath = public_path('storage/profile_images/thumbnail/'.$filenametostore);
        $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($thumbnailpath);
 
        return redirect('images')->with('success', "Image uploaded successfully.");
    }
}
}



//If you are looking for hard crop then replace below lines

$img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
    $constraint->aspectRatio();
});
$img->save($thumbnailpath);
//is changed by

$img = Image::make($thumbnailpath)->resize(100, 100)->save($thumbnailpath);