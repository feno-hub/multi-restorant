<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
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

        return view('pages.vendor.dashboard.index', [
            'notices' => $notices
        ]);
    }
}
