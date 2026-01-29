<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Relation\MorphMany;


class DulceModel extends Model
{
    protected $guarded = [
        'id',
        'created_at'
    ];
    
    protected $fillable = [
        'juguete_id',
        'nombre_dulce',
        'color_dulce',
        'marca_dulce'
    ];
    
    protected $hidden = [
        'id',
        'created_at'
    ];

    public function image(): MorphMany{
        return $this-> morphMany(ImageModel::class,'imageable','Imagen_Type','Imagen_id','id');
    }

}
