<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\InsertRestoRequest;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestoController extends Controller
{
    public function index()
    {
        return view('pages.client.create-resto.index');
    }

    public function store(InsertRestoRequest $request)
    {

        $request->validated();

        $logo = $request->file('logo') == "" ? null : $request->file('logo')->store('images/resto/logo', "public");
        $cover = $request->file('cover')->store('images/resto/cover', "public");
        $user_id = Auth::user()->id;

        Resto::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'category' => $request->category,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'description' => $request->description,
            'open_time' => $request->open_time,
            'close_time' => $request->close_time,
            'logo' => $logo,
            'cover' => $cover,
            'instat' => $request->instat,
            'website' => $request->website
        ]);

        return to_route('client.dashboard')
            ->with('success', 
                "Veuillez patienter pendant que votre demande est en cours de validation par l’administrateur."
        );
    }

    public function restoList() {
        $restos = Resto::orderBy('id', 'desc')
            ->simplepaginate(6);

        return view('pages.client.resto.list', [
            'restos' => $restos
        ]);
    }

    public function show(string $id) {
        $resto = Resto::where('id', $id)
            ->first();
        return view('pages.client.resto.show', [
            'resto' => $resto
        ]);
    }

}
