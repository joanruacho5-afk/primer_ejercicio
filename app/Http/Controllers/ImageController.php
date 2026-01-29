<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DulceModel;
use App\Models\ImageModel;

class ImageController extends Controller
{
    public function create(Request $request){
        $imagen = ImageModel::create([
            'Image_Type'=>DulceModel::class,
            'Image_id'=>$request->id_dulce,
            'url'=>$request->url,
        ]);

        return response()->json([
            'data'=>$imagen,
            'message'=>'imagen guardada',
            'error'=>null,
            'code'=>200
        ],200);
    }
}
