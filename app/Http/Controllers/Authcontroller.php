<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Suport\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\models\user;

class Authcontroller extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $email=$request->email;
        $password=$request->password;

        $user = User::where('email', '=', $email)->first();
        if (!$user && !Hash::check($password,$user->password)) {
             return response()->json([
                'mensaje' => 'Email o contraseña incorrectos'
            ]);
        } 
           


        $token=$user->createToken("Token")->plainTextToken;
            /*return response()->json(["data"=>[
                'access_token'=>$token,
                'token_type'=>'bearer',
            ]

            ]);*/




            $response = Http::withoutVerifying()->post('https://tremulously-superloyal-mayme.ngrok-free.dev/api/login',[
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        return response()->json([
            'respose'=>$token,
            
            'response'=>$response->json()
        ]);
        }
    


    public function create(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        
        $user =user::create([
        'name' => $request->name,
        'email' => $request->email,
        'password'=> Hash::make($request->password), 
        

        ]);

        $response = Http::withoutVerifying()->post('https://tremulously-superloyal-mayme.ngrok-free.dev/api/create',[
        'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        return response()->json([
            'user'=>$user,
            'response'=>$response->json()
        ]);

        
        

        
        
    }
}
