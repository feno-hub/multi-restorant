<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Menu;
use App\Models\Plat;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index() {
        $menus = Menu::orderBy('id', 'desc')
            ->simplepaginate(12);
        return view('pages.menu.index', [
            'menus' => $menus
        ]);
    }

    public function search() {
        return view('pages.menu.index', [
            'menus' => Menu::all()
        ]);
    }

    public function  show(string $id) {

        $menu = Menu::where('id', $id)->first();

        $resto = Resto::where('id', $menu->resto_id)->first();

        return view('pages.menu.show', [
            'menu' => $menu,
            'resto' => $resto
        ]);
    }

    public function likeStore(Request $request) {
        $request->validate([
            'menu_id' => 'required'
        ]);

        Like::create([
            'menu_id' => $request->menu_id
        ]);

        return redirect()->back();

    }

}
