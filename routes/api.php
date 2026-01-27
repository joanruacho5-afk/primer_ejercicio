<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ImagenController;
Route::post('/mascota',[MascotaController::class,'create']);
Route::post('/imagen',[ImagenController::class,'creage']);