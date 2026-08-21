<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {

        $id_connect = Auth::user()->id;

        $users = User::where('id', '!=', $id_connect)
            ->orderBy('id', 'desc')
            ->simplepaginate(5);

        $id_connect = Auth::user()->id;
        $user_actif = User::where('id', $id_connect)
            ->count();

        return view('pages.admin.users.list', [
            'users' => $users,
            'countUser' => User::count(),
            'countAdmin' => Resto::count(),
            'user_actif' => $user_actif
        ]);
    }
}
