<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'description'];

    public function path($method){
        return route("department-$method", ["id" => $this->id]);
    }
}
