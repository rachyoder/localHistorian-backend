<?php

namespace App\Http\Controllers;

use App\Marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('file')) {
            $image = $request->get('file');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('file'))->save(public_path('images/') . $name);
        }



        $fileupload = new Fileupload();
        $fileupload->filename = $name;
        $fileupload->save();
        return response()->json('Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function show(Marker $marker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function edit(Marker $marker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marker $marker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marker  $marker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marker $marker)
    {
        //
    }
}
