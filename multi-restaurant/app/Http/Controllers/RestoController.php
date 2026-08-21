<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ReservationRequest;
use App\Models\Notice;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoController extends Controller
{
    public function list()
    {

        $resto = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->simplepaginate(6);

        return view('pages.resto.list', [
            "restos" => $resto,
            "countResto" => Resto::count(),
        ]);
    }

    // RECHERCHE

    public function search()
    {
        

        $resto = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->simplepaginate(6);


        return view('pages.resto.list', [
            "restos" => $resto,
            "countResto" => Resto::count(),
        ]);
    }

    // DETAIL

    public function show(string $id)
    {

        $resto = Resto::where('id', $id)->first();
        return view('pages.resto.show', [
            'resto' => $resto
        ]);
    }

    // AVIES CLIENTS

    public function notice(string $id)
    {

        $notices = Notice::where('resto_id', $id)
            ->orderBy('id', 'desc')->get();

        return view('pages.resto.notice', [
            'resto_id' => $id,
            'notices' => $notices
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'max:250', 'min:2'],
            'resto_id' => ['required']
        ]);

        $id_connect = Auth::user()->id;

        Notice::create([
            'user_id' => $id_connect,
            'resto_id' => $request->resto_id,
            'content' => $request->content
        ]);

        return redirect()->back()->with('success', 'Votre avie est bien envoyer');
    }

    // RESERVATION TABLE

    public function reservation(Resto $resto) {

        $id_resto = $resto->id;

        $restos = Resto::where('id', $id_resto)
            ->get();
        
        return view('pages.resto.table.index', compact('resto'), [
            'reesto' => $restos
        ]);
    }

    public function storeReservation(ReservationRequest $request, Resto $resto) {
        dd('storeReservation');
    }

}
