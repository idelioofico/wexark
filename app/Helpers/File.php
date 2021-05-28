<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class  File
{

    public static function Url($path)
    {
        return Storage::url($path);
    }

    public static function Upload(string $path, UploadedFile $file, string $name = '')
    {
        $storedFile = "";

        if (empty($name) && !empty($path)) {

            $storedFile = Storage::putFile($path, $file);
        }

        if (!empty($path) && !empty($name)) {
           $storedFile=Storage::putFileAs($path, $file, $name);
        }
        
        return $storedFile;
    }

    public static function Delete($path)
    {
        return  Storage::delete($path);
    }
}
