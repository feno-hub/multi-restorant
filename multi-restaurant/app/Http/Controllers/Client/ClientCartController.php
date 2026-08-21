<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientCartController extends Controller
{
    /**
     * Afficher le panier.
     */
    public function index()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cart->load('items.plat');

        return view(
            'pages.client.cart.index',
            compact('cart')
        );
    }


    /**
     * Ajouter un plat au panier.
     */
    public function add(Request $request, Plat $plat)
    {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $item = $cart->items()
            ->where('plat_id', $plat->id)
            ->first();

        if ($item) {

            $item->increment(
                'quantity',
                $request->quantity
            );
        } else {

            $cart->items()->create([
                'plat_id' => $plat->id,
                'quantity' => $request->quantity,
                'price' => $plat->price,
            ]);
        }

        return redirect()
            ->route('client.cart.index')
            ->with(
                'success',
                'Le plat a été ajouté à votre panier.'
            );
    }


    /**
     * Modifier la quantité.
     */
    public function update(
        Request $request,
        CartItem $item
    ) {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
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


    /**
     * Supprimer un article.
     */
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


    /**
     * Vider le panier.
     */
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
            'Votre panier a été vidé.'
        );
    }
}
