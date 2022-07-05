<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomRate;
use App\Models\Freebie;
use App\Models\Inn;

class RoomControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        
        $this->validate($request, [
            'room_number' => 'required',
            "number_of_beds" => 'required',
            "status" => "required"
        ]);

        $room = new Room;
        $room->room_number = $request->room_number;
        $room->number_of_beds = $request->number_of_beds;
        $room->status = $request->status;
        $room->inn_id = $request->inn_id;
        $room->save();

        return redirect()->back()->with('success', 'Room Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $freebies = Freebie::all();
        $room = Room::find($id);
        $room_rates = RoomRate::latest()->where('room_id', $id)->get();

        return view('rooms.show')
        ->with('freebies', $freebies)
        ->with('room', $room)
        ->with('room_rates', $room_rates);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);

        return view('rooms.edit')->with('room', $room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'room_number' => 'required',
            "number_of_beds" => 'required',
            "status" => "required"
        ]);

        $room = Room::find($id);
        $room->room_number = $request->room_number;
        $room->number_of_beds = $request->number_of_beds;
        $room->status = $request->status;
        $room->inn_id = $request->inn_id;
        $room->save();

        return redirect('/rooms')->with('success', 'Room Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->back()->with('success', 'Deleted Successfully!');
    }
}
