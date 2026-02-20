<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function create(Request $request){
        $user = User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)
        ]);


        /** @var \Illuminate\Http\Client\Response\ $response*/
        $response = Http::withoutVerifying()->post('https://urbanely-uncapsuled-cheyenne.ngrok-free.dev/api/create',[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        return response()->json([
            'user'=>$user,
            'response'=>$response->json()
        ]);
    }

    public function login(Request $request){
        $user = User::where('email','=',$request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json([
                'error'=>'el email o la contraseña es incorrecta'
            ]);
        }
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'token'=>$token
        ]);
    }
}
