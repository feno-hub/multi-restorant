<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticesController extends Controller
{
    public function index() {

        $notices = Notice::orderBy('id', 'desc')
            ->simplepaginate(6);

        return view('pages.admin.notices.index', [
            'notices' => $notices
        ]);
    }
}
