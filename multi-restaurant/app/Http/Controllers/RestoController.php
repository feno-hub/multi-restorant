<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ReservationRequest;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoController extends Controller
{
    public function list()
    {
        $restos = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->simplePaginate(6);

        return view('pages.resto.list', [
            'restos' => $restos,
            'countResto' => Resto::where('status', 'accepter')->count(),
        ]);
    }


    public function search(Request $request)
    {
        $query = Resto::where('status', 'accepter');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');

            });
        }

        $restos = $query
            ->orderBy('id', 'desc')
            ->simplePaginate(6);

        return view('pages.resto.list', [
            'restos' => $restos,
            'countResto' => Resto::where('status', 'accepter')->count(),
        ]);
    }


    public function show(string $id)
    {
        $resto = Resto::findOrFail($id);

        $menu_resto = Menu::where('resto_id', $id)
            ->where('stat', 'disponible')
            ->orderBy('id', 'desc')
            ->get();

        return view('pages.resto.show', [
            'resto' => $resto,
            'menu_resto' => $menu_resto,
        ]);
    }


    public function notice(string $id)
    {
        $notices = Notice::where('resto_id', $id)
            ->orderBy('id', 'desc')
            ->get();

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

        return redirect()
            ->back()
            ->with('success', 'Votre avis est bien envoyé');
    }


    public function reservation(Resto $resto)
    {
        $id_resto = $resto->id;

        $restos = Resto::where('id', $id_resto)
            ->get();

        return view('pages.resto.table.index', [
            'resto' => $resto,
            'reesto' => $restos,
        ]);
    }


    public function storeReservation(
        ReservationRequest $request,
        Resto $resto
    ) {
        dd('storeReservation');
    }
}