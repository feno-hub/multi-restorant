<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = Cart::with([
            'items.plat.menu.resto'
        ])
        ->where('user_id', Auth::id())
        ->first();


        if (!$cart || $cart->items->isEmpty()) {

            return redirect()
                ->route('pages.cart.index')
                ->with(
                    'error',
                    'Votre panier est vide.'
                );
        }


        $subtotal = $cart->items->sum(
            function ($item) {
                return $item->price * $item->quantity;
            }
        );


        $deliveryFee = 0;


        $total = $subtotal + $deliveryFee;


        $restaurant = $cart
            ->items
            ->first()
            ->plat
            ->menu
            ->resto;


        return view(
            'pages.orders.checkout',
            compact(
                'cart',
                'subtotal',
                'deliveryFee',
                'total',
                'restaurant'
            )
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'note' => [
                'nullable',
                'string',
                'max:500',
            ],
        ]);



        $cart = Cart::with([
            'items.plat.menu.resto'
        ])
        ->where('user_id', Auth::id())
        ->first();


        if (!$cart || $cart->items->isEmpty()) {

            return redirect()
                ->route('client.cart.index')
                ->with(
                    'error',
                    'Votre panier est vide.'
                );
        }



        $restaurant = $cart
            ->items
            ->first()
            ->plat
            ->menu
            ->resto;


        $subtotal = $cart->items->sum(
            function ($item) {
                return $item->price * $item->quantity;
            }
        );


        $deliveryFee = 0;

        $total = $subtotal + $deliveryFee;


        DB::beginTransaction();


        try {

            $order = Order::create([

                'user_id' => Auth::id(),

                'resto_id' => $restaurant->id,

                'order_number' =>
                    'CMD-' . date('YmdHis') . '-' . Auth::id(),

                'subtotal' => $subtotal,

                'delivery_fee' => $deliveryFee,

                'total' => $total,

                'status' => 'pending',

                'note' => $request->note,

            ]);


            foreach ($cart->items as $item) {

                OrderItem::create([

                    'order_id' => $order->id,

                    'plat_id' => $item->plat_id,

                    'plat_name' => $item->plat->name,

                    'price' => $item->price,

                    'quantity' => $item->quantity,

                    'subtotal' =>
                        $item->price * $item->quantity,

                ]);
            }


            $cart->items()->delete();


            DB::commit();


            return redirect()
                ->route(
                    'client.orders.show',
                    $order
                )
                ->with(
                    'success',
                    'Votre commande a été enregistrée avec succès.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Une erreur est survenue lors de la commande.'
                );
        }
    }


    public function show(Order $order)
    {

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }


        $order->load([
            'items.plat',
            'resto',
        ]);


        return view(
            'pages.orders.show',
            compact('order')
        );
    }
}