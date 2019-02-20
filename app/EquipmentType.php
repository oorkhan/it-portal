<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    protected $guarded = [];

    public function path(){
        return '/equipment-types/'.$this->id;
    }

    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
}
