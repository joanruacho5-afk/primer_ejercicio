<?php

namespace App\Http\Controllers;

use App\Models\Heroe;
use Illuminate\Http\Request;

class HeroeController extends Controller
{
    public function index(Request $request){
        $heroe = Heroe::create([
            'name'=>$request->name
        ]);

        return response()->json([
            'error'=>null,
            'data'=>$heroe,
            'code'=>200
        ],200);
    }
    public function poder(Request $request){
    $heroe = Heroe::find($request->id);
    
    $heroe->poderes()->create([
    'poder'=>$request->power,
    'nombre'=>$request->name
    ]);
    $hereos = Heroe::with('poderes')->whereHas('poderes',function(){
        
    });
    return response()->json([
        'data'=>[
            'heroe'=>$heroe->load('poderes')
        ],
        'error'=>null,
        'code'=>200
    ],200);
    }
}
