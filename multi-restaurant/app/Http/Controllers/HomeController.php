<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Resto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $resto = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $menu = Menu::where('stat', 'disponible')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        return view('pages.home.index', [
            'restos' => $resto,
            'menus' => $menu
        ]);
    }
}
