<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientCartController extends Controller
{
    public function index()
    {
        $cart = Cart::with([
            'items.plat.menu.resto'
        ])
            ->where('user_id', Auth::id())
            ->first();

        return view(
            'pages.cart.index',
            compact('cart')
        );
    }


    public function add(Request $request, Plat $plat)
    {
        if ($plat->status !== 'Disponible') {
            return back()->with(
                'error',
                'Ce plat n’est pas disponible.'
            );
        }


        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);


        $firstItem = $cart->items()
            ->with('plat.menu')
            ->first();

        if ($firstItem) {

            if (!$firstItem->plat || !$firstItem->plat->menu) {
                return back()->with(
                    'error',
                    'Un article de votre panier est invalide.'
                );
            }

            if (!$plat->menu) {
                return back()->with(
                    'error',
                    'Ce plat n’est associé à aucun menu.'
                );
            }

            $currentRestaurant = $firstItem->plat->menu->resto_id;
            $newRestaurant = $plat->menu->resto_id;

            if ($currentRestaurant != $newRestaurant) {

                return back()->with(
                    'error',
                    'Votre panier contient déjà des plats d’un autre restaurant.'
                );
            }
        }

        $item = $cart->items()
            ->where('plat_id', $plat->id)
            ->first();

        if ($item) {

            $item->increment('quantity');
        } else {

            $cart->items()->create([
                'plat_id' => $plat->id,
                'quantity' => 1,
                'price' => $plat->price,
            ]);
        }


        return redirect()
            ->route('client.cart.index')
            ->with(
                'success',
                'Plat ajouté au panier.'
            );
    }


    public function update(
        Request $request,
        CartItem $item
    ) {

        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
                'max:20',
            ],
        ]);


        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }


        $item->update([
            'quantity' => $request->quantity,
        ]);


        return back()->with(
            'success',
            'Quantité mise à jour.'
        );
    }


    public function remove(CartItem $item)
    {
        if ($item->cart->user_id !== Auth::id()) {
            abort(403);
        }


        $item->delete();


        return back()->with(
            'success',
            'Article supprimé du panier.'
        );
    }


    public function clear()
    {
        $cart = Cart::where(
            'user_id',
            Auth::id()
        )->first();


        if ($cart) {
            $cart->items()->delete();
        }


        return back()->with(
            'success',
            'Panier vidé.'
        );
    }
}
