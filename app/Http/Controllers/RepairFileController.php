<?php

namespace App\Http\Controllers;

use App\EquipmentRepair;
use App\RepairFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepairFileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');//can apply to certain methods
    }

    public function create(EquipmentRepair $repair)
    {
        return view('equipment.repair.repair_file_create', compact('repair'));
    }

    public function store(EquipmentRepair $repair, Request $request)
    {
        if($request->hasFile('file')){
            $attributes = request()->validate([
                'description' => 'required|string|min:3|max:200',
            ]);

            $file = $request->file('file');
            $url = $file->store('public/storage/equipment');
            $equipmentRepairId = $repair->id;
            $attributes['url'] = $url;
            $attributes['equipment_repair_id'] = $equipmentRepairId;
            RepairFile::create($attributes);
            flash('file has been added');
            return redirect($repair->path('show'));
        }else {
            return back()->withInput()->withErrors('Please upload file');
        }
    }

    public function destroy(EquipmentRepair $repair, RepairFile $file)
    {
        Storage::delete($file->url);
        $file->delete();
        flash('File has been deleted');
        return back();
    }
}
