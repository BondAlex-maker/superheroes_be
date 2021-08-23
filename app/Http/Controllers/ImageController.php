<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\File;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::orderBy('id', 'DESC')->get();
        return response()->json(["status" => "success", "count" => count($images), "data" => $images]);;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
    }

    public function show(Image $image){
        return response()->json(new ImageResource($image));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   \App\Models\Image  $posts_id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image )
    {
        $path = public_path().'/uploads/'.$image->image_name;
        unlink($path);
        $image->delete();
        echo $path;
        return response()->json("Success ");
    }
}
