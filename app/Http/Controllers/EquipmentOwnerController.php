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
        $users = User::all();
        return view('equipment.owner.change_user', compact('equipment', 'users'));
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
                $url = $file->store('public/storage/equipment');
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
        return view('equipment.owner.change_user_show',
            compact('equipmentOwner', 'equipment', 'prevOwner', 'nextOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment, EquipmentOwner $owner)
    {
        $users = User::all();
        return view('equipment.owner.owner-change-edit', compact('equipment', 'owner', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EquipmentOwner  $equipmentOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment, EquipmentOwner $owner)
    {
        $attributes = request()->validate([
            'prev_user_id' => 'int|exists:users,id',
            'next_user_id' => 'int|exists:users,id',
        ]);

        $owner->update($attributes);
        flash('owner change has been edited');
        return redirect(route('equipment-owner-show', ['eid' => $equipment->id, 'ocid' => $owner->id]));
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

    public function addFileCreate(Equipment $equipment, EquipmentOwner $owner){
        return view('equipment.owner.owner-file-create', compact('equipment', 'owner'));
    }

    public function addFileStore(Request $request, Equipment $equipment, EquipmentOwner $owner){
        if($request->hasFile('file')){
            $attributes = request()->validate([
                'description' => 'required|string|min:3|max:200',
            ]);
            $file = $request->file('file');
            $url = $file->store('public/storage/equipment');
            $attributes['url'] = $url;
            $attributes['equipment_owners_id'] = $owner->id;
            EquipmentFile::create($attributes);
            flash('file has been added');
            return redirect(route('equipment-owner-show', ['eid' => $equipment->id, 'ocid' => $owner->id]));
        }else {
            return back()->withInput()->withErrors('Please upload file');
        }
    }

    public function deleteFile(EquipmentFile $file){
        Storage::delete($file->url);
        $file->delete();
        flash('File has been deleted');
        return back();
    }
}
