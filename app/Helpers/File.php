<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class  File
{
    //Retrieve uploaded file url
    public static function Url($path)
    {
        return Storage::url($path);
    }

    //Upload file
    public static function Upload(string $path, UploadedFile $file, string $name = '')
    {
        $storedFile = "";

        if (empty($name) && !empty($path)) {

            $storedFile = Storage::putFile($path, $file);
        }

        if (!empty($path) && !empty($name)) {
            $storedFile = Storage::putFileAs($path, $file, $name . '.' . $file->extension());
        }

        return $storedFile;
    }

    //Delete uploaded single file or multipli by passing array of file path's as parameter
    public static function Delete($path)
    {
        return  Storage::delete($path);
    }
}
