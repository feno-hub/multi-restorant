<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check()) {
            return to_route('home');
        }

        $role = Auth::user()->role;

        if($role !== 'ADMIN') {
            return to_route('login');
        }

        return $next($request);
    }
}
