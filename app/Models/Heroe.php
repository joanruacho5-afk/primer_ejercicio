<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Heroe extends Model
{
    protected $guarded =[];


    public function poderes():HasMany{
        return $this->hasMany(Poder::class,'heroe_id','id');
    }
}
