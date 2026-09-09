<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Notice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plat;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $resto_id = Auth::user()->resto->id;
        
        $notices = Notice::where('resto_id', $resto_id)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get();

        $menus = Menu::where('resto_id', $resto_id)
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();


        $resto = Auth::user()->resto->id;
        
        $orders = Order::where('resto_id', $resto)->get();

        $subtotal = $orders->sum(
            function($order) {
                return $order->subtotal += 0;
            }
        );


        $total = $subtotal;

        

        return view('pages.vendor.dashboard.index', [
            'notices' => $notices,
            'menus' => $menus,
            'totalprice' => $total,
        ]);
    }
}
