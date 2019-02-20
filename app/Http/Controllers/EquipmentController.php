<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentType;
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
        $equipment = Equipment::where('is_deleted', false)->get();
        return view('equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = EquipmentType::all();
        $rooms = Room::all();
        $users = User::all();
        return view('equipment.create', compact('types', 'rooms', 'users'));
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
        flash($equipment->model.'has been added.');
        return redirect($equipment->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $types = EquipmentType::all();
        $rooms = Room::all();
        $users = User::all();
        return view('equipment.edit', compact('equipment', 'types', 'rooms', 'users'));
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
        $attributes = $this->validateEquipment();
        $equipment->update($attributes);
        flash($equipment->model.' has been updated.');
        return redirect ($equipment->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->update([
            'is_deleted' => true,
            'deleted_date' => now()
            ]);
        flash($equipment->model.' has been deleted.');
        return redirect ('/equipment');
    }

    public function validateEquipment(){
        return request()->validate([
            'model' => 'required|min:3',
            'serial_no' => 'string',
            'inventory_number' => 'string',
            'purchase_date' => 'date',
            'EquipmentType_id' => 'exists:equipment_types,id',
            'user_id' => 'exists:users,id',
            'room_id' => 'exists:rooms,id'
        ]);
    }
}
