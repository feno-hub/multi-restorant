<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendeur\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorMenuController extends Controller
{
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
            "category" => $request->category,
            "price" => $request->price,
            "preparation_time" => $request->preparation_time,
            "stat" => $request->stat,
            "image" => $image,
            "description" => $request->description
        ]);

        return redirect()
            ->back()
            ->with('success', 'Votre menu est bien créer');

    }

    public function edit() {
        return view('pages.vendor.menu.update');
    }

}
