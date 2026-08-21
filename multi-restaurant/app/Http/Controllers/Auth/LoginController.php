<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\Resto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {

        if (Auth::check()) {
            return to_route('home');
        }

        return view('pages.auth.login');
    }

    public function store(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $id_connect = Auth::user()->id;
            $resto = Resto::where('user_id', $id_connect)->first();

            switch (Auth::user()->role) {
                case 'USER' && $resto:
                    return to_route('vendor.dashboard');
                case 'USER':
                    return to_route('client.dashboard');
                case 'ADMIN':
                    return to_route('admin.dashboard');
                default:
                    return to_route('login');
            }

            return redirect()->intended('home');
        }

        return back()
            ->withErrors(['email' => "Email n' existe pas ou mot de passe incorrecte",])
            ->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/acceuil');
    }
}
