<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorStockController extends Controller
{
    public function index() {
        return view('pages.vendor.stock.index');
    }
}
