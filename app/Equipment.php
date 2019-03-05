<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = [];

    public function path($method){
        return route('equipment-'.$method, ['id' => $this->id]);
    }

    public function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function equipmenttype(){
        return $this->belongsTo(Equipmenttype::class, 'equipmenttype_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function equipmentowners(){
        return $this->hasMany(EquipmentOwner::class);
    }

    public function changeOwner($change){

        $this->user_id = $change['next_user_id'];
        $this->save();
        $ownerChangeInstanse = $this->equipmentowners()->create($change);
        return $ownerChangeInstanse;
    }
}
