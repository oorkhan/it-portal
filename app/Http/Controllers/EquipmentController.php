<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\Equipmenttype;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEquipment = Equipment::all();
        return view('equipment.index',compact('allEquipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $types = Equipmenttype::all();
        $users = User::all();
        return view('equipment.create', compact('rooms', 'types', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateEquipment();
        $equipment = Equipment::create($attributes);
        flash('equipment has been created');
        return redirect($equipment->path('show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        $users = User::all();
        $ownerChanges = $equipment->equipmentowners->all();
        return view('equipment.show', compact('equipment', 'ownerChanges', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $rooms = Room::all();
        $types = Equipmenttype::all();
        $users = User::all();
        return view('equipment.edit', compact('equipment', 'rooms', 'types', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $attributes = $this->validateEquipment('edit');
        $equipment->update($attributes);
        flash('equipment has been updated');
        return redirect($equipment->path('show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        flash('equipment has been deleted');
        return redirect(route('equipment-index'));

    }

    public function validateEquipment($method = null){
        if($method == 'edit') {
            return request()->validate([
                'model' => 'string|required|min:3',
                'manufacturer' => 'string|min:2|nullable',
                'serial' => 'string|min:3|nullable',
                'inventory_no' => 'string|min:3|nullable',
                'purchase_date' => 'date|nullable',
                'room_id' => 'nullable|exists:rooms,id',
                'equipmenttype_id' => 'nullable|exists:equipmenttypes,id',
                'user_id' => 'nullable|exists:users,id',
            ]);
        } else {
            return request()->validate([
                'model' => 'string|required|min:3',
                'manufacturer' => 'string|min:2|nullable',
                'serial' => 'string|min:3|nullable',
                'inventory_no' => 'string|min:3|nullable|unique:equipment',
                'purchase_date' => 'date|nullable',
                'room_id' => 'nullable|exists:rooms,id',
                'equipmenttype_id' => 'nullable|exists:equipmenttypes,id',
                'user_id' => 'nullable|exists:users,id',
            ]);
        }
    }
}
