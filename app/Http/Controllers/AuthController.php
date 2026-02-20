<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\TraitDulce;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{

use TraitDulce;


    public function create(Request $request){
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password 
       ]);

       return $this->ApiResponse($user, 'se creao correctamente', null, 200);
   } 
   public function login(Request $request){
        $user = User::where('email', '=',$request->email)->first();
         
        if(!$user || !Hash::check($request->password,$user->password)){
            return $this->ApiResponse(null, 'el email o el password son incorrectos', null, 400);
        }
        $token = $user->createToken('token')->plainTextToken;

                return response()->json([
                    'serve1'=> $token
             ]);

        //return $this->ApiResponse($user, 'se creao correctamente', null, 200);
        $url = Http::withoutVerifying()->withtoken($token)->post('http://localhost:8000/api/create1',[
            'juguete_id'=>$request->juguete_id,
            'nombre_dulce'=>$request->nombre_dulce,
            'color_dulce'=>$request->color_dulce,
            'marca_dulce'=>$request->marca_dulce
         ]);
              
   } 
}
