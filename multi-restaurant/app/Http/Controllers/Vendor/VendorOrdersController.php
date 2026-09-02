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

    public function show(string $id) {
        return view('pages.vendor.orders.show', [
            'order' => Order::where('id', $id)->first()
        ]);
    }

}
