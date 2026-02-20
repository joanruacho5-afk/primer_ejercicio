<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DulceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

  
Route::post('/create1', [DulceController::class, 'create'])->middleware([ApiMiddleware::class,'auth:sanctum']);
Route::post('/createimg', [ImageController::class, 'create']);
Route::get('/index/{id}',[DulceController::class, 'index']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/create',[AuthController::class, 'create']);


