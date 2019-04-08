<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentDeletion extends Model
{
    protected $guarded = [];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function files(){
        return $this->hasMany(DeletionFile::class);
    }

    public function path($method, $eid){
        return route('equipment-deletion-'.$method, ['eid' => $eid ,'did'=>$this->id]);
    }
}
