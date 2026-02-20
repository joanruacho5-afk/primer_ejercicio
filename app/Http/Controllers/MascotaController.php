<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
class MascotaController extends Controller
{

    public function create(Request $request){
       
        $mascota = Mascota::create([
            'nombre'=>$request->nombre,
            'animal'=>$request->animal,
            'edad'=>$request->edad,
            'color'=>$request->color,
            'raza'=>$request->raza
        ]);

        /** @var \Illuminate\Http\Client\Response\ $token*/
        $token = Http::withoutVerifying()->post('https://urbanely-uncapsuled-cheyenne.ngrok-free.dev/api/login',[
            'email'=>$request->email,
/*'nombre_juguete'=>$request->nombre_juguete,
            'color_juguete'=>$request->color_juguete,
            'edad_juguete'=>$request->edad_juguete,
            'mascota_id'=>$mascota->id,*/
            'password'=>$request->password,
           /* 'nombre_dulce'=>$request->nombre_dulce,         
            'color_dulce'=>$request->color_dulce,
            'juguete_id'=>$request->juguete_id,
            'marca_dulce'=>$request->marca_dulce,*/
        ]);


   /** @var \Illuminate\Http\Client\Response\ $response*/
    $response = Http::withoutVerifying()->withToken($token->json()['data']['access_token'])->post('https://urbanely-uncapsuled-cheyenne.ngrok-free.dev/api/juguete/pollas',[
        'nombre'=>$request->nombre,
        'email'=>$request->email,
        'password'=>$request->password,
        'dulce_auth'=>$request->dulce_token,
        'mascota_id'=>$mascota->id,
        'nombre_dulce'=>$request->nombre_dulce,
        'color_dulce'=>$request->color_dulce,
        'marca_dulce'=>$request->marca_dulce,
        'nombre_jugete'=>$request->nombre_juguete,
        'color_jugete'=>$request->color_juguete,
        'edad_jugete'=>$request->edad_juguete
    ]); 
        
    return response()->json([
        'mascota'=>$mascota,
        'datos_De_ariel'=>$response->json(),
        'message'=>'el juegete'
    ],200);
    
    }

    public function index($id)
    {
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
