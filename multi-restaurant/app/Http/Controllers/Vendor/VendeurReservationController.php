<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendeurReservationController extends Controller
{
    public function index()
    {
        $restaurant = Auth::user()->resto;

        if (!$restaurant) {
            return redirect()->back()
                ->with('error', 'Vous n\'avez pas de restaurant associé.');
        }

        $reservations = Reservation::with('user')
            ->where('resto_id', $restaurant->id)
            ->latest()
            ->paginate(10);

        return view('pages.vendor.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        $restaurant = Auth::user()->resto;

        if (!$restaurant || $reservation->resto_id !== $restaurant->id) {
            abort(403);
        }

        $reservation->load('user', 'resto');

        return view('pages.vendor.reservations.show', compact('reservation'));
    }

    public function updateStatus(Request $request, Reservation $reservation)
    {
        $restaurant = Auth::user()->resto;

        if (!$restaurant || $reservation->resto_id !== $restaurant->id) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:en_attente,confirmee,refusee,annulee,terminee',
        ]);

        $reservation->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Le statut de la réservation a été mis à jour.');
    }
}