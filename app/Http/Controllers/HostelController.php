<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        return view('hostels.index', compact('hostels'));
    }

    public function show($id)
    {
        $hostel = Hostel::find($id);
        return view('hostels.show', compact('hostel'));
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
        return view('hostels.edit', compact('hostel'));
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
