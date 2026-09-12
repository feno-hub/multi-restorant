<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientReservationController extends Controller
{
    public function index()
    {

        $user_id = Auth::user()->id;

        $reservations = Reservation::with('resto')
            ->where('user_id', $user_id)
            ->latest()
            ->paginate(10);

        return view('pages.client.reservations.index', compact('reservations'));
    }
}
