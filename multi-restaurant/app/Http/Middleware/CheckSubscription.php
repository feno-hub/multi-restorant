<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (!Auth::check()) {

            return redirect()
                ->route('login');
        }


        $user = Auth::user();



        return $next($request);
    }
}