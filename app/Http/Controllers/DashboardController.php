<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        if (auth()->user()->isAdmin()) {
            $reservations = DB::table('reservations')->paginate(25);
        } else {
            $reservations = Reservation::where('user_id', $user_id)->get();
        }

        return view('dashboard', compact('reservations'));
    }
}
