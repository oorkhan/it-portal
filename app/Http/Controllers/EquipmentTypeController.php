<?php

namespace App\Http\Controllers;

use App\EquipmentType;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentTypes = EquipmentType::all();
        return view('equyipmentTypes.index', compact('equipmentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equyipmentTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateEquipmentType();
        $equipmentType = EquipmentType::create($attributes);
        flash($equipmentType->name.'Equipment type has been created');
        return redirect($equipmentType->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentType $equipmentType)
    {
        return view('equyipmentTypes.show', compact('equipmentType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentType $equipmentType)
    {
        return view('equyipmentTypes.edit', compact('equipmentType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentType $equipmentType)
    {
        $attributes = $this->validateEquipmentType();
        $equipmentType->update($attributes);
        flash('Equipment type has been updated');
        return redirect($equipmentType->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentType  $equipmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentType $equipmentType)
    {
        $equipmentType->delete();
        flash($equipmentType->name.'has been deleted.');
        return redirect('/equipment-types');
    }

    public function validateEquipmentType(){
        return request()->validate([
            'name' => 'required|min:3',
        ]);
    }
}
