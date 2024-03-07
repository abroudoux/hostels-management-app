<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $user_id = auth()->user()->id;
        $query = Reservation::query();

        if ($search) {
            $query->where('user_name', 'like', '%' . $search . '%');
        }

        if (!auth()->user()->isAdmin()) {
            $query->where('user_id', $user_id);
        }

        $reservations = $query->get();

        return view('dashboard', compact('reservations', 'search'));

    }
}
