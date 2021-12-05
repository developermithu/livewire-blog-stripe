<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SaveImageService
{

    public static function UploadImage($image, $model, $folder)
    {
        // Option One
        // use Illuminate\Http\File otherwise it will show error
        $path = Storage::putFile('public/' . $folder, new File($image));

        $targetPath = storage_path('app/' . $path);  //app/public/posts
        Image::make($image)->resize(1200, 630)->save($targetPath);

        $model->image = $path;
        $model->save();

        // config/filesystems.php    
        // 'links' => [
        //     public_path('storage') => storage_path('app/public'),
        // ],

        //======== Option TWO ======== //
        // $img = $image;
        // $imgName = $img->getClientOriginalName();
        // $imgNewName = explode('.', $imgName)[0];
        // $fileExtension = time() . '.' . $imgNewName . '.' . $img->getClientOriginalExtension();
        // $location = storage_path('app/public/' . $folder . '/' . $fileExtension);
        // Image::make($img)->resize(1200, 630)->save($location);
        // $model->image = $fileExtension;
    }
}
