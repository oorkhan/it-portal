<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentDeletion;
use Illuminate\Support\Facades\Storage;

class EquipmentDeletionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//can apply to certain methods
    }

    public function create(Equipment $equipment){
        return view('equipment.deletion.deletion', compact('equipment'));
    }

    public function store(Equipment $equipment, Request $request ){
        $attributes = request()->validate([
            'del_description' => 'string|min:3|max:100',
            'del_date' => 'date',
        ]);
        $attributes['equipment_id'] = $equipment->id;
        $deletion = EquipmentDeletion::create($attributes);
        $equipment->is_deleted = true;
        $equipment->save();
        flash('equipment has been deleted');
        return redirect($deletion->path('show', $equipment->id));
    }

    public function show(Equipment $equipment, EquipmentDeletion $deletion){
        return view('equipment.deletion.deletion_show', compact('equipment', 'deletion'));
    }

    public function edit(Equipment $equipment, EquipmentDeletion $deletion){
        return view('equipment.deletion.equipment_deletion_edit', compact('equipment', 'deletion'));
    }

    public function update(Request $request, Equipment $equipment, EquipmentDeletion $deletion){
        $attributes = request()->validate([
            'del_description' => 'required|max:150|string',
            'del_date' => 'required|date',
        ]);

        $deletion->update($attributes);
        flash('Equipment deletion information upadated');
        return redirect(route('equipment-deletion-show', ['eid' => $equipment->id, 'did' => $deletion->id]));
    }

    public function destroy(Equipment $equipment, EquipmentDeletion $deletion){

        $deletion->equipment->is_deleted = false;
        $deletion->equipment->save();
        if(count($deletion->files) >= 1){
            foreach ($deletion->files as $file){
                Storage::delete($file->url);
                $file->delete();
            }
        }
        $deletion->delete();
        flash('Record of deletion was removed');
        return redirect($equipment->path('show'));
    }
}
