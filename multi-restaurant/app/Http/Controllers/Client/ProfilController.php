<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index() {
        return view('pages.client.profil.index');
    }

    public function edit(string $id) {
        $user = User::findOrFail($id);

        if (!$user) {
            return to_route('client.profil.index');
        }

        return view('pages.client.profil.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRegisterRequest $request, string $id) {
        
        dd('modification');
        
        // $user = User::findOrFail($id);


        // $request->validated();

        // if($request->hasFile('photo')) {

        //     if($user->photo && Storage::disk('public')->exists($user->photo)) {
        //         Storage::disk('public')->delete($user->photo);
        //     }

        //     $path = $request->file('photo')->store('images/profils', 'public');

        //     $user->photo = $path;

        // }

        // $user->save();

        // return to_route('client.profil.index')->with('success', 'Votre profile a été modifier');

    }

}
