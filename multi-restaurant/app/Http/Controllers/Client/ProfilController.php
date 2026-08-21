<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        return view('pages.client.profil.index');
    }

    public function edit() {
        return view('pages.client.profil.edit');
    }

}
