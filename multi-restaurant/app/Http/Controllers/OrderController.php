<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Page de validation de commande.
     */
    public function checkout()
    {
        $cart = Cart::where(
            'user_id',
            Auth::id()
        )
            ->with('items.plat.resto')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {

            return redirect()
                ->route('client.cart.index')
                ->with(
                    'error',
                    'Votre panier est vide.'
                );
        }

        return view(
            'pages.client.orders.checkout',
            compact('cart')
        );
    }


    /**
     * Créer la commande.
     */
    public function store(Request $request)
    {
        $request->validate([
            'note' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $cart = Cart::where(
            'user_id',
            Auth::id()
        )
            ->with('items.plat.resto')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {

            return redirect()
                ->route('client.cart.index')
                ->with(
                    'error',
                    'Votre panier est vide.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Vérification du restaurant
        |--------------------------------------------------------------------------
        */

        $restaurantIds = $cart->items
            ->map(fn ($item) => $item->plat->resto_id)
            ->unique();

        if ($restaurantIds->count() > 1) {

            return back()->with(
                'error',
                'Vous ne pouvez commander que dans un seul restaurant à la fois.'
            );
        }


        $restoId = $restaurantIds->first();


        /*
        |--------------------------------------------------------------------------
        | Calcul
        |--------------------------------------------------------------------------
        */

        $subtotal = $cart->items->sum(
            function ($item) {
                return $item->price * $item->quantity;
            }
        );


        $deliveryFee = 0;

        $total = $subtotal + $deliveryFee;


        /*
        |--------------------------------------------------------------------------
        | Création de la commande
        |--------------------------------------------------------------------------
        */

        $order = DB::transaction(function () use (
            $cart,
            $restoId,
            $subtotal,
            $deliveryFee,
            $total,
            $request
        ) {

            $order = Order::create([
                'user_id' => Auth::id(),

                'resto_id' => $restoId,

                'order_number' =>
                    'CMD-' .
                    strtoupper(
                        Str::random(8)
                    ),

                'subtotal' => $subtotal,

                'delivery_fee' => $deliveryFee,

                'total' => $total,

                'status' => 'pending',

                'note' => $request->note,
            ]);


            foreach ($cart->items as $item) {

                $order->items()->create([

                    'plat_id' => $item->plat_id,

                    'plat_name' => $item->plat->name,

                    'price' => $item->price,

                    'quantity' => $item->quantity,

                    'subtotal' =>
                        $item->price *
                        $item->quantity,
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | Vider le panier
            |--------------------------------------------------------------------------
            */

            $cart->items()->delete();


            return $order;
        });


        return redirect()
            ->route(
                'client.orders.show',
                $order
            )
            ->with(
                'success',
                'Votre commande a été créée avec succès.'
            );
    }


    /**
     * Afficher une commande.
     */
    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load([
            'items',
            'resto',
        ]);

        return view(
            'pages.client.orders.show',
            compact('order')
        );
    }
}