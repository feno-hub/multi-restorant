<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard() {

        $resto = Resto::limit(5)
            ->orderBy('id', 'desc')
            ->get();

       

        return view('pages.admin.dashboard', [
            'restos' => $resto,
            'countResto' => Resto::count(),
            'countUser' => User::count(),
        ]);
    }

    public function updateStatus(Request $request) {
        Resto::update([]);
    }

}
