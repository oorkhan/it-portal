<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function campus(){
        return $this->belongsTo(Campus::class);
    }

    public function path($method){
        return route('room-'.$method, ['id' => $this->id]);
    }

    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
}
