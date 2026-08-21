<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        
        if(Auth::check()) {
            return to_route('home');
        }
        
        return view('pages.auth.register');
    }

    public function store(UserRegisterRequest $request) {
        $request->validated();

        User::create([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return redirect('connexion')->with('success', 'Vous êtes maintenant membre');

    }

}
