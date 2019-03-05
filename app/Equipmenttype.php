<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipmenttype extends Model
{
    protected $guarded = [];

    public function path($method){
        return route('equipmenttype-'.$method, ['id' => $this->id]);
    }

    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
}
