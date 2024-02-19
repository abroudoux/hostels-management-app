<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Hostel;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show', compact('room'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $room = Room::create($request->all());
        return redirect()->route('rooms.index');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        $room->name = $request->get('name');
        $room->hostel_id = $request->get('hostel_id');
        $room->save();

        return redirect()->route('rooms.index');
    }

    public function destroy(Request $request)
    {
        $room = Room::find($request->get('id'));
        $room->delete();

        return redirect()->route('rooms.index');
    }

    public function reserve($id, $user_id)
    {
        $room = Room::find($id);
        $user = User::find($user_id);
        $hostel = Hostel::find($room->hostel_id);

        $room->is_reserved = 1;
        $room->save();

        $reservation = new Reservation();
        $reservation->room_id = $room->id;
        $reservation->room_name = $room->name;
        $reservation->room_number = $room->room_number;
        $reservation->hostel_id = $hostel->id;
        $reservation->hostel_name = $hostel->name;
        $reservation->hostel_location = $hostel->location;
        $reservation->user_id = $user->id;
        $reservation->user_name = $user->name;
        $reservation->start_date = now();
        $reservation->end_date = now()->addDays(2);
        $reservation->save();
    
        return redirect()->route('hostels.index');
    }
}
