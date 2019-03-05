<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentFile;
use App\EquipmentOwner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentOwnerController extends Controller
{
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
        $users = User::all();
        return view('equipment.change_user', compact('equipment', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Equipment $equipment, Request $request)
    {
        $attributes = request()->validate([
            'prev_user_id' => 'integer|required|exists:users,id',
            'next_user_id' => 'integer|required|exists:users,id'
        ]);

        $ownerChangeInstanse = $equipment->changeOwner($attributes);
        if ($request->hasFile('files')){
            $files = $request->file('files');

            foreach ($files as $file){
                $url = $file->store('equipment');
                $id = $ownerChangeInstanse->id;
                EquipmentFile::create([
                    'equipment_owners_id' => $id,
                    'url' => $url
                ]);
            }
        }

        flash('Owner has been assigned');
        return redirect($equipment->path('show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment, $oid)
    {
        $equipmentOwner = EquipmentOwner::where('id', $oid)->first();
        $prevOwner = User::where('id', $equipmentOwner->prev_user_id)->first();
        $nextOwner = User::where('id', $equipmentOwner->next_user_id)->first();

//        $prevOwner = $users->where('id', $change->prev_user_id)->first();
//        $nextOwner = $users->where('id', $change->next_user_id)->first();
        return view('equipment.change_user_show',
            compact('equipmentOwner', 'equipment', 'prevOwner', 'nextOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentOwner $equipmentOwner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipmentOwner $equipmentOwner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment, $oid)
    {
        $equipmentOwner = EquipmentOwner::where('id', $oid)->first();
        foreach ($equipmentOwner->files as $file){
            Storage::delete($file->url);
            $file->delete();
        }
        $equipmentOwner->delete();
        flash('Operation has been deleted');
        return redirect($equipment->path('show'));
    }
}
