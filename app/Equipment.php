<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = [];

    public function path(){
        return '/equipment/'.$this->id;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function equipmentType(){
        return $this->belongsTo(EquipmentType::class, 'EquipmentType_id');
    }
}
