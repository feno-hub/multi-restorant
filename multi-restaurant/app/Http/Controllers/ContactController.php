<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index() {
        return view("pages.contact.index");
    }

    public function store(Request $request) {

        if(Auth::check()) {

            $user_id = Auth::user()->id;
            
            $validateData = $request->validate([
                "content" => ['required']
            ]);
            
            Message::create([
                "user_id" => $user_id,
                "content" => $validateData['content']
            ]);
            
            Activites::create([
                'user_id' => $user_id,
                'title' => 'message',
                'content' => "message admin",
            ]);

            return redirect()->back()->with('success', 'Messages envoyer');

        }else {
            return back()->withErrors('contact', 'Connectez vous pour envoyer le message')->onlyInput('content');
        }

    }

}
