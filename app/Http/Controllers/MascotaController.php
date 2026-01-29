<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
class MascotaController extends Controller
{
    /*
            $table->string('nombre');
            $table->string('animal');
            $table->unsignedBigInteger('edad');
            $table->string('color');
            $table->string('raza');
    */
    public function create(Request $request){
        $mascota = Mascota::create([
            'nombre'=>$request->nombre,
            'animal'=>$request->animal,
            'edad'=>$request->edad,
            'color'=>$request->color,
            'raza'=>$request->raza
        ]);

   /** @var \Illuminate\Http\Client\Response\ $response*/
    $response = Http::withoutVerifying()->withHeaders(['Authorization'=>$request->jugete_token])->post('https://urbanely-uncapsuled-cheyenne.ngrok-free.dev/api/juguete/pollas',[
        'dulce_auth'=>$request->dulce_token,
        'mascota_id'=>$mascota->id,
        'nombre_dulce'=>$request->nombre_dulce,
        'color_dulce'=>$request->color_dulce,
        'marca_dulce'=>$request->marca_dulce,
        'nombre_jugete'=>$request->nombre_jugete,
        'color_jugete'=>$request->color_jugete,
        'edad_jugete'=>$request->edad_jugete
    ]); 
    return response()->json([
        'mascota'=>$mascota,
        'data'=>$response->json(),
        'message'=>'el juegete'
    ],200);
    
    }

        public function index($id){
        $mascota = Mascota::find($id);
        /** @var \Illuminate\Http\Client\Response\ $response*/
    $response = Http::withoutVerifying()->get('https://urbanely-uncapsuled-cheyenne.ngrok-free.dev/api/juguete/obtener/'.$mascota->id);
    return response()->json([
        'mascota'=>$mascota,
        'data'=>$response->json(),
        'message'=>'el juegete'
    ],200);
    }
}
