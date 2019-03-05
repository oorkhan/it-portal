<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentOwner extends Model
{
    protected $guarded = [];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function files(){
        return $this->hasMany(EquipmentFile::class, 'equipment_owners_id');
    }

}
