<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;

class FileuploadController extends Controller
{
    public function store(Request $request)
    {
        $name = "";
        if ($request->get('file')) {
            $image = $request->get('file');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('file'))->save(public_path('images/') . $name);
            $data = \Image::make($request->get('file'))->exif();
            dd($data);
        }


        $fileupload = new Fileupload();
        $fileupload->filename = $name;
        $fileupload->save();
        return response()->json('Successfully added');
    }
}
