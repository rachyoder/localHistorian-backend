<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;

class FileuploadController extends Controller
{
    public function store(Request $request)
    {
        $name = '';
        if ($request->get('file')) {
            $image = $request->get('file');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('file'))->save(public_path('images/') . $name);
            $lat = \Image::make($request->get('file'))->exif('Latitude');
            $lon = \Image::make($request->get('file'))->exif('Longitude');
        }
        
        if ($request->get('coords')) {
            $coords = $request->get('coords');
            $coords_arr = explode(',', $coords);
            // $lat = $coords_arr[0];
            // $lon = $coords_arr[1];
        }

        $fileupload = new Fileupload();
        $fileupload->filename = $name;
        $fileupload->lat = $lat;
        $fileupload->lon = $lon;
        $fileupload->save();
        return response()->json('Successfully added');
    }
}
