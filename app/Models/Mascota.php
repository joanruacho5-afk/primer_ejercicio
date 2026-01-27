<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Mascota extends Model
{
    protected $guarded = [];
    public function images(): MorphMany{
        return $this-> morphMany(Imagen::class,'imageable','Image_Type','Image_id','id');
    }
}
