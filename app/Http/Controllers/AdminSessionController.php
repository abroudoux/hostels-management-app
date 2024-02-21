<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminSessionController extends Controller
{
    public function update(): RedirectResponse
    {
        $user = auth()->user();

        if (!$user->is_admin) {
            $user->is_admin = 1;
            $user->save();
        } else {
            $user->is_admin = 0;
            $user->save();
        }

        return redirect()->back();
    }
}
