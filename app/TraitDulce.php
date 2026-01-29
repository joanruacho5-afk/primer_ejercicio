<?php

namespace App;

trait TraitDulce
{
    public function ApiResponse($data,$message,$error,$code){
        return response()->Json([
            'datos'=>$data,
            'mensajes'=>$message,
            'errores'=>$error,
            'codigos'=>$code,
        ]);
    }
}
