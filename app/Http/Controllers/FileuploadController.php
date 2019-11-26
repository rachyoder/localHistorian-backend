<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fileupload;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Marker as MarkerResource;

class FileuploadController extends Controller
{
    public function index()
    {
        return MarkerResource::collection(Fileupload::all());
    }

    public function store(Request $request)
    {
        $name = '';
        if ($request->get('file')) {
            $image = $request->get('file');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('file'))->save(public_path('images/') . $name);
        }
        if ($request->get('coords')) {
            $coords = $request->get('coords');
            $coords_arr = explode(',', $coords);
            $lat = $coords_arr[0];
            $lon = $coords_arr[1];
        }
        $title = $request->get('title');
        $desc = $request->get('desc');
        $addr = $request->get('addr');

        $fileupload = new Fileupload();
        $fileupload->filename = $name;
        $fileupload->lat = $lat;
        $fileupload->lon = $lon;
        $fileupload->title = $title;
        $fileupload->desc = $desc;
        $fileupload->addr = $addr;
        $fileupload->save();
        return response()->json('Successfully added');
    }
    
    public function getImg($imgName)
    {
        $url = public_path().("/images/".$imgName);
        return($url);
    }

    public function checkVerification(Request $request)
    {
        $markers = $request->verified;
        
        foreach($markers as $marker) {
            $id = $marker['id'];
            $selected_marker = Fileupload::find($id);
            $selected_marker->isVerified = $marker['verify'];
            $selected_marker->save();
        }
        return response()->json('Successfully Verified');
    }

    public function delete(Request $request) 
    {
        $id = $request->id;
        Fileupload::destroy($id);
        return response()->json('Successfully deleted');
    }
}

