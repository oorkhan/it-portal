<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campus::all();
        return view('rooms.create', compact('campuses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateRoom();
        $room = Room::create($attributes);

        flash('Room '.$room->name.' has been added.');
        return redirect($room->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $campuses = Campus::all();
        return view('rooms.edit', compact('room', 'campuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $attributes = $this->validateRoom();
        $room->update($attributes);
        flash('Room '.$room->name.' has been updated.');
        return redirect($room->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        flash('Room '.$room->name.' has been deleted.');
        return redirect('/rooms');
    }

    protected function validateRoom(){
        return request()->validate([
            'name' => 'required|min:3',
            'campus_id' => 'exists:campuses,id',
            'numberOfPeople' => 'integer',
            'type' => 'string'
        ]);}
}
