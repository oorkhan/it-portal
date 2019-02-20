<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $guarded = [];
    public function path(){
        return '/campuses/'.$this->id;
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
