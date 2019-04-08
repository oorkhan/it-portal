<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentRepair extends Model
{
    protected $guarded = [];

    public function equipment(){
        return $this->belongsTo(Equipment::class);
    }

    public function files(){
        return $this->hasMany(RepairFile::class);
    }

    public function repaired($is_repaired = true){
        $this->update(compact('is_repaired'));
    }
    public function not_repaired(){
        $this->repaired(false);
    }

    public function path($method){
        return route('equipment-repair-'.$method, ['eid'=> $this->equipment->id, 'rid' => $this->id]);
    }
}
