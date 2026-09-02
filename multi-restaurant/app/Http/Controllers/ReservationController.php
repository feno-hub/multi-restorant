<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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
            'message' => 'nullable|string|max:500',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'guests' => 'required|integer|min:1|max:50',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['resto_id'] = $resto->id;
        $validated['status'] = 'pending';

        $reservation = Reservation::create($validated);

        return redirect()
            ->route('client.reservation.show', $reservation)
            ->with('success', 'Votre réservation a été envoyée avec succès.');
    }
}
