<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Reservation_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationInfoController extends Controller
{
    public function reservationInfo() {
        return view("pages.vendor.info-reservation.create-info");
    }

    public function store(Request $request) {

        if (!Auth::user()->resto) {
            return redirect('vendeur/tableau-board');
        }

        

        $request->validate([
            'table' => [
                'required',
                'min:1',
            ],
            'place' => [
                'required',
                'min:1'
            ],
            'price' => [
                'required',
                'min:1'
            ]
        ]);

        Reservation_info::create([
            'resto_id' => Auth::user()->resto->id,
            'table' => $request->table,
            'place' => $request->place,
            'price' => $request->price,
            'delay' => $request->delay,
            'is_active' => $request->is_active
        ]);

        return redirect()
            ->back()
            ->with('success', 'Votre information est créée');

    }

}
