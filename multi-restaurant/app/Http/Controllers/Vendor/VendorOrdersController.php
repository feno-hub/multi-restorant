<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class VendorOrdersController extends Controller
{
    public function index() {
        return view('pages.vendor.orders.index', [
            'orders' => Order::orderBy('id', 'desc')->get()
        ]);

    }

    public function accepter(string $id) {

        $orders = Order::find($id);
        $orders->status = 'confirmed';
        $orders->save();

        return redirect()->back()->with('success', 'Commande accépter');

    }

    public function refuser(string $id) {

        $orders = Order::find($id);
        $orders->status = 'cancelled';
        $orders->save();

        return redirect()->back()->with('success', 'Commande réfuser');

    }

    public function show(string $id) {
        return view('pages.vendor.orders.show', [
            'order' => Order::where('id', $id)->first()
        ]);
    }

    public function delete(string $id) {

        Order::find($id)->delete();

        return redirect()->back()->with('success', 'Commande supprimer dans la liste');

    }

}
