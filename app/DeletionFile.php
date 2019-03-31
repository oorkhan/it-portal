<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletionFile extends Model
{
    protected $guarded = [];

    public function deletion(){
        return $this->belongsTo(EquipmentDeletion::class);
    }
}
