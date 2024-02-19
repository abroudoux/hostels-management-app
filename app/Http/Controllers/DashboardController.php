<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $reservations = Reservation::where('user_id', $user_id)->get();
        return view('dashboard', compact('reservations'));
    }
}
