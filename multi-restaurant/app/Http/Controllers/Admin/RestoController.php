<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\InsertRestoRequest;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    public function index() {
        $restos = Resto::orderBy('id', 'desc')
            ->simplepaginate(10);

        $restoAccept = Resto::where('status', 'accepter')
            ->count();

        $restoRefus = Resto::where('status', 'refuser')
            ->count();

        $restoAttent = Resto::where('status', 'en attent')
            ->count();

        return view('pages.admin.resto.index', [
            'restos' => $restos,
            'countResto' => Resto::count(),
            'restoAccept' => $restoAccept,
            'restoRefus' => $restoRefus,
            'restoAttent' => $restoAttent
        ]);
    }

    public function show(string $id) {

        $user = User::where('id', $id)->first();

        return view('pages.admin.resto.show', [
            'user' => $user
        ]);
    }

    public function accepter(string $id) {
        $resto = Resto::findOrFail($id);
        $resto->status = 'accepter';
        $resto->save();

        return redirect()->back()->with('success', 'restaurant accépter');

    }

    public function refuser(string $id) {

        $resto = Resto::findOrFail($id);
        $resto->status = 'refuse';
        $resto->save();

        return redirect()->back()->with('success', 'restaurant refuser');

    }

}
