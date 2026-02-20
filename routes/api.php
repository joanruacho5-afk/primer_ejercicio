<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroeController;

Route::post('/mascota',[MascotaController::class,'create'])->middleware('auth:sanctum');
Route::post('/imagen',[ImagenController::class,'create']);

Route::get('/mascota/{id}',[MascotaController::class,'index']);

Route::post('/create',[AuthController::class,'create']);
Route::post('/login',[AuthController::class,'login']);

Route::post('/heroe',[HeroeController::class,'index']);
Route::post('/poder',[HeroeController::class,'poder']);
/*
Route::get('/ip',function(Request $request){
    return response()->json($request->ip());
});
*/

//Route::post('/mascota',[MascotaController::class,'create']);