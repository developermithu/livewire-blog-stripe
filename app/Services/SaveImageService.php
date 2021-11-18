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
        $path = Storage::put('public/' . $folder, new File($image));  //maybe putFile

        $targetPath = storage_path('app/' . $path);
        Image::make($image)->resize(1200, 630)->save($targetPath);

        $model->image = $path;
        $model->save();

        // Option two
        // $img = $image;
        // $imgName = $img->getClientOriginalName();
        // $imgNewName = explode('.', $imgName)[0];
        // $fileExtension = time() . '.' . $imgNewName . '.' . $img->getClientOriginalExtension();
        // $location = storage_path('app/public/' . $folder . '/' . $fileExtension);
        // Image::make($img)->resize(1200, 630)->save($location);
        // $model->image = $fileExtension;
    }
}
