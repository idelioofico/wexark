<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class  File
{

    public static function Url($path)
    {
        return Storage::url($path);
    }

    public static function Upload(string $path,object $file,string $name='')
    {
        $name=$name?:sha1($file->name);
        return Storage::putFileAs($path, $file, $name);
    }

    public static function Delete($path)
    {
        return  Storage::delete($path);
    }
}
