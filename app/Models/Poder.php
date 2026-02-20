<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Poder extends Model
{
    protected $guarded =[];

    public function heroe():BelongsTo{
        return $this->belongsTo(Heroe::class,'heroe_id','id');
    }
}
