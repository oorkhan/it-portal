<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentFile extends Model
{
    protected $guarded = [];

    public function equipmentowner(){
        return $this->belongsTo(EquipmentOwner::class);
    }
}
