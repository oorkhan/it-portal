<?php

namespace App\Http\Controllers;

use App\Equipmenttype;
use Illuminate\Http\Request;

class EquipmenttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmenttypes = Equipmenttype::all();
        return view('equipmenttype.index', compact('equipmenttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipmenttype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateTypes();
        $equipmenttype = Equipmenttype::create($attributes);
        flash('Equipment type '.$equipmenttype->name.' has been added.');
        return redirect(route('equipmenttype-show', ['id' => $equipmenttype->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipmenttype  $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function show(Equipmenttype $equipmenttype)
    {
        return view('equipmenttype.show', compact('equipmenttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipmenttype  $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipmenttype $equipmenttype)
    {
        return view('equipmenttype.edit', compact('equipmenttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipmenttype  $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipmenttype $equipmenttype)
    {
        $attributes = $this->validateTypes();
        $equipmenttype->update($attributes);
        flash('Equipment type '.$equipmenttype->name.' has been updated.');
        return redirect(route('equipmenttype-show', ['id' => $equipmenttype->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipmenttype  $equipmenttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipmenttype $equipmenttype)
    {
        $equipmenttype->delete();
        flash('Equipment type '.$equipmenttype->name.' has been deleted.');
        return redirect(route('equipmenttype-index'));
    }

    public function validateTypes(){
        return request()->validate([
            'name' => 'required|min:3|unique:equipmenttypes',
        ]);
    }
}
