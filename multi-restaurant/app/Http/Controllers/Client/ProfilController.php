<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        return view('pages.client.profil.index');
    }

    public function edit() {
        return view('pages.client.profil.edit');
    }

    public function update(UserRegisterRequest $request, string $id) {
        $request->validated();

        $profile = $request->file('image') == "" ? null : $request->file('image')->store('images/user/profile', "public");

        User::update([
            "name" => $request->name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => $request->password,
            "image" => $profile,
            "phone" => $request->phone
        ]);

        return to_route('client.profil.index')->with('success', 'Votre profile a été modifier');

    }

}
