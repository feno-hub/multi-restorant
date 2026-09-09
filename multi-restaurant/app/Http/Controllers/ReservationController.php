<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Reservation_info;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Resto $resto)
    {
        return view('pages.reservations.create', compact('resto'));
    }

    public function store(Request $request, Resto $resto)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:30',
            'guests' => 'required|string',
            'message' => 'nullable|string|max:500',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'total' => 'integer|min:1|max:50',
        ]);

        $resto_id = $resto->id;
        $reservation_info = Reservation_info::where('resto_id', $resto_id)->first(); 
        // $total = $reservation_info->price * $validated['guests'];

        $validated['user_id'] = Auth::id();
        $validated['resto_id'] = $resto_id;
        $validated['status'] = 'pending';
        $validated['total'] = $reservation_info->price;


        $reservation = Reservation::create($validated);

        return redirect()
            ->route('client.reservation.show', $reservation)
            ->with('success', 'Votre réservation a été envoyée avec succès.');
    }

    public function show(Reservation $reservation) {
        return view('pages.reservations.show',compact('reservation'));
    }

}
