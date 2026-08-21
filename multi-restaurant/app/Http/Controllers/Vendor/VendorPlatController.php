<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorPlatController extends Controller
{
    public function index() {
        return view('pages.vendor.plat.index');
    }
}
