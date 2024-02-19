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
}
