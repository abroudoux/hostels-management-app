<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Hostel;

class ReservationController extends Controller
{
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->room_id = $request->get('room_id');
        $reservation->room_name = $request->get('room_name');
        $reservation->room_number = $request->get('room_number');
        $reservation->hostel_id = $request->get('hostel_id');
        $reservation->hostel_name = $request->get('hostel_name');
        $reservation->hostel_location = $request->get('hostel_location');
        $reservation->user_id = $request->get('user_id');
        $reservation->user_name = $request->get('user_name');
        $reservation->start_date = $request->get('start_date');
        $reservation->end_date = $request->get('end_date');
        $reservation->save();

        return redirect()->route('reservations.index');
    }

    public function create($id, $user_id)
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

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request)
    {
        $reservation = Reservation::find($request->get('id'));
        $room = Room::find($reservation->room_id);
        $room->is_reserved = 0;
        $room->save();
        $reservation->delete();

        return redirect()->route('dashboard');
    }
}
