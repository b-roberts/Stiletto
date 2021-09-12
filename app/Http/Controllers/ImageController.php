<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    function image($path)
    {
        return file_get_contents(env('FILE_PATH') . $path);
    }
}
