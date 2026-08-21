<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorOrdersController extends Controller
{
    public function index() {
        return view('pages.vendor.orders.index2');
    }
}
