<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\ImageModel;


class ImageModel extends Model
{
    protected $table = 'img';

      protected $guarded = [
        'id',
        'created_at'
    ];
    
    protected $hidden = [
        'id',
        'created_at'
    ];

    public function imageable():MorphTo{
        return $this-> morphTo('imageable','Imagen_Type','Imagen_id','id');
    }
}
