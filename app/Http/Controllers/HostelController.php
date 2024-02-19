<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        $hostels->each(function ($hostel) {
            $hostel->availableRoomsCount = Room::where('hostel_id', $hostel->id)
                ->where('is_reserved', 0)
                ->count();
        });
        return view('hostels.index', compact('hostels'));
    }

    public function show($id)
    {
        $hostel = Hostel::find($id);
        $roomsAvaibles = Room::where('hostel_id', $id)->where('is_reserved', 0)->get();
        $roomsNonAvaibles = Room::where('hostel_id', $id)->where('is_reserved', 1)->get();
        return view('hostels.show', compact('hostel', 'roomsAvaibles', 'roomsNonAvaibles'));
    }

    public function create()
    {
        return view('hostels.create');
    }

    public function store(Request $request)
    {
        $hostel = Hostel::create($request->all());
        return redirect()->route('hostels.index');
    }

    public function edit($id)
    {
        $hostel = Hostel::find($id);
        $rooms = Room::where('hostel_id', $id)->get();
        return view('hostels.edit', compact('hostel', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $hostel = Hostel::find($id);
        $hostel->name = $request->get('name');
        $hostel->location = $request->get('location');
        $hostel->save();

        return redirect()->route('hostels.index');
    }

    public function destroy(Request $request)
    {
        $hostel = Hostel::find($request->get('id'));
        $hostel->delete();

        return redirect()->route('hostels.index');
    }
}
