<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\TraitDulce;
use App\Models\User;


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
         return response()->json([
            'token'=>$user->createToken('token')->plainTextToken,
            'type'=>'bearer'
     ]);
   } 
}
