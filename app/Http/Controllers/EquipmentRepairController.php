<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentRepair;
use Illuminate\Http\Request;

class EquipmentRepairController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//can apply to certain methods
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Equipment $equipment)
    {
        return view('equipment.repair.repair-create', compact('equipment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Equipment $equipment)
    {
        $attributes = request()->validate([
            'equipment_id' => 'int|exists:equipment,id',
            'company' => 'required|string|min:3',
            'description' => 'required|min:3|max:1000',
            'repair_start' => 'required|date',
        ]);
        EquipmentRepair::create($attributes);
        flash('repair has been added');
        return redirect($equipment->path('show'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentRepair  $equipmentRepair
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment, EquipmentRepair $repair)
    {
        return view('equipment.repair.repair_show',compact('equipment', 'repair'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentRepair  $equipmentRepair
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment, EquipmentRepair $repair)
    {
        return view('equipment.repair.repair_edit', compact('repair', 'equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentRepair  $equipmentRepair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment, EquipmentRepair $repair)
    {
        $attributes = request()->validate([
            'company' => 'required|string|min:3',
            'description' => 'required|min:3|max:1000',
            'repair_start' => 'required|date',
            'repair_finish' => 'date',
        ]);
        $method = request()->has('is_repaired') ? 'repaired': 'not_repaired';

        $repair->update($attributes);
        $repair->$method();
        flash('repair has been updated');
        return redirect(route('equipment-repair-show', ['eid' => $equipment->id,'rid' => $repair->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentRepair  $equipmentRepair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment, EquipmentRepair $repair)
    {
        $repair->delete();
        flash('repair has been deleted');
        return redirect($equipment->path('show'));
    }
}
