<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\Mascota;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function create(Request $request){
        $imagen = Imagen::create([
            'Image_Type'=>Mascota::class,
            'Image_id'=>$request->id_mascota,
            'url'=>$request->url
        ]);

        return response()->json([
            'data'=>$imagen,
            'message'=>'imagen guardada :p',
            'error'=>null,
            'code'=>200
        ],200);
    }
}
