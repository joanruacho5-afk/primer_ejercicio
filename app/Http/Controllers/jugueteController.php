<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\juguetes;
use Illuminate\Support\Facades\Http;
class jugueteController extends Controller
{
    public function recibirMascota(Request $request)
    {
        
        $juguete = juguetes::create([
            'mascota_id'    => $request->mascota_id,
            'nombre_juguete'=> $request->nombre_jugete,
            'color_juguete' => $request->color_jugete,
            'edad_juguete'  => $request->edad_jugete,
        ]);

        
        $response = Http::withoutVerifying()->withHeaders(['Authorization'=>$request->dulce_auth])->post('https://tremulously-superloyal-mayme.ngrok-free.dev/api/create1', [
            'juguete_id'     => $juguete->id,
            'nombre_dulce'   => $request->nombre_dulce,
            'color_dulce'    => $request->color_dulce,
            'marca_dulce'    => $request->marca_dulce,
        ]);

        
        return response()->json([
            'mensaje' => 'Juguete recibido y enviado a dulces',
            'juguete' => $juguete,
            'respuesta_dulces' => $response->json()
        ]);
    }

    public function obtenerMascota($id){
        $juguete=juguetes::where('mascota_id','=',$id)->first();

        $response2= Http::withoutVerifying()->get('https://tremulously-superloyal-mayme.ngrok-free.dev/api/index/'.$juguete->id);
           return response()->json([
            "jugete"=>$juguete,
            "response"=>$response2->json()
        ]);

    }
    
}
