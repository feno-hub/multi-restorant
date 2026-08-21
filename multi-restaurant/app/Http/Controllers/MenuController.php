<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Menu;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index() {
        return view('pages.menu.index', [
            'menus' => Menu::all()
        ]);
    }

    public function search() {
        return view('pages.menu.index', [
            'menus' => Menu::all()
        ]);
    }

    public function  show() {
        return view('pages.menu.show-menu');
    }

    public function category(string $name) {
        $menus = Menu::where('name', $name)
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.menu.category', [
            'menus' => $menus
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
