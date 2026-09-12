<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favoriteStore(Request $request) {
        if(!Auth::check()) {
            return to_route('login');
        }

        Favorite::create([
            'user_id' => Auth::user()->id,
            'resto_id' => $request->resto_id
        ]);

        return redirect()->back();

    }

    public function delete(string $id) {
       
        Favorite::find($id)->delete();

        return redirect()->back();
    }

}
