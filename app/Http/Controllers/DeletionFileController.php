<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipment;
use App\EquipmentDeletion;
use App\DeletionFile;
use Illuminate\Support\Facades\Storage;

class DeletionFileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//can apply to certain methods
    }
    public function create(EquipmentDeletion $deletion){
        return view('equipment.deletion.deletion-file-create', compact('deletion'));
    }

    public function store(EquipmentDeletion $deletion, Request $request){
        if($request->hasFile('file')){
            $attributes = request()->validate([
               'del_file_description' => 'required|min:3|max:100'
            ]);

            $file = $request->file('file');
            $url = $file->store('public/storage/equipment');
            $attributes['url'] = $url;
            $attributes['equipment_deletion_id'] = $deletion->id;
            DeletionFile::create($attributes);
            flash('file has been added');
            return redirect($deletion->path('show', $deletion->equipment->id));
        } else {
            return back()->withInput()->withErrors('Please upload file');
        }
    }

    public function edit(EquipmentDeletion $deletion, DeletionFile $file){
        return view('equipment.deletion.deletion-file-edit', compact('deletion', 'file'));
    }

    public function update(EquipmentDeletion $deletion ,DeletionFile $file, Request $request){
        $attributes = request()->validate([
            'del_file_description' => 'required|min:3|max:100',
        ]);
        $file->update($attributes);
        flash('file has been added');
        return redirect($deletion->path('show', $deletion->equipment->id));
    }

    public function destroy(DeletionFile $file){
        Storage::delete($file->url);
        $file->delete();
        flash('File has been deleted');
        return back();
    }
}
