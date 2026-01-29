<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jugueteController;
use App\Http\Middleware\ApiMiddleware;
use App\Http\Controllers\Authcontroller;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/juguete/pollas',[jugueteController::class,'recibirMascota'])->middleware(ApiMiddleware::class);

Route::get('/juguete/obtener/{id}',[jugueteController::class,'obtenerMascota']);


Route::post('/create',[Authcontroller::class,'create']);
Route::post('/login',[Authcontroller::class,'login']);