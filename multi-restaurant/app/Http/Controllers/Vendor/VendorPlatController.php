<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendeur\PlatRequest;
use App\Models\Menu;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorPlatController extends Controller
{
    public function create(Request $request)
    {
        $restaurant = Auth::user()->resto;

        $menus = Menu::where('resto_id', $restaurant->id)
            ->latest()
            ->get();

        $selectedMenu = $request->menu_id;

        return view(
            'pages.vendor.plat.index',
            compact('menus', 'selectedMenu')
        );
    }

    public function store(PlatRequest $request)
    {
        $restaurant = Auth::user()->resto;

        $validated = $request->validated();

        $menu = Menu::where('id', $validated['menu_id'])
            ->where('resto_id', $restaurant->id)
            ->firstOrFail();

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('images/plats', 'public');
        }

        Plat::create($validated);

        return redirect()
            ->route('vendeur.menu.show', $menu->id)
            ->with('success', 'Le plat a été ajouté avec succès.');
    }
}
