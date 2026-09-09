<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plat;
use App\Models\Resto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $resto = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $threePlat = Plat::where('qty', '!=', '0')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();


        return view('pages.home.index', [
            'restos' => $resto,
            'threePlat' => $threePlat
        ]);
    }
}
