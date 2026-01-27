<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Imagen extends Model
{
    protected $table = 'imagens';
    protected $guarded = [];
    public function imageable():MorphTo{
    return $this->morphTo('imageable','Image_Type','Image_id','id');
    }
}
