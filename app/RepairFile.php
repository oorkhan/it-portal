<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepairFile extends Model
{
    protected $guarded = [];
    public function equipmentrepair(){
        return $this->belongsTo(EquipmentRepair::class);
    }
}
