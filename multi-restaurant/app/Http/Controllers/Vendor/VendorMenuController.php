<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendeur\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMenuController extends Controller
{

    public function list() {
        return view('pages.vendor.menu.list', [
            'menus' => Menu::all()
        ]);
    }

    public function create() {
        return view('pages.vendor.menu.create');
    }
    
    public function store(MenuRequest $request) {
        $request->validated();
        
        $image = $request->file('image')->store('images/menu', 'public');
        $resto_id = Auth::user()->resto->id;

        Menu::create([
            "resto_id" => $resto_id, 
            "name" => $request->name,
            "stat" => $request->stat,
            "image" => $image,
            "description" => $request->description
        ]);

        return redirect()
            ->back()
            ->with('success', 'Votre menu est bien créer');

    }

    public function show(string $id) {
        return view('pages.vendor.menu.show', [
            'menu' => Menu::where('id', $id)->first()
        ]);
    }

    public function edit(string $id) {
        $menu = Menu::where('id', $id)->first();
        return view('pages.vendor.menu.update', [
            'menu' => $menu
        ]);
    }


}
