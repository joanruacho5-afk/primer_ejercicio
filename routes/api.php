<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\AuthController;
Route::post('/mascota',[MascotaController::class,'create'])->middleware('auth:sanctum');
Route::post('/imagen',[ImagenController::class,'create']);

Route::get('/mascota/{id}',[MascotaController::class,'index']);


Route::post('/create',[AuthController::class,'create']);
Route::post('/login',[AuthController::class,'login']);
