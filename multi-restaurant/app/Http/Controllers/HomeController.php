<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Plat;
use App\Models\Resto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $findForresto = Resto::where('status', 'accepter')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $threePlat = Plat::where('qty', '!=', '0')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();

        $sixFiveCategory = Resto::limit(6)->get();


        return view('pages.home.index', [
            'forResto' => $findForresto,
            'threePlat' => $threePlat,
            'sixCategory' => $sixFiveCategory
        ]);
    }
}
