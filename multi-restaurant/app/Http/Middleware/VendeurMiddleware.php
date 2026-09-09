<?php

namespace App\Http\Middleware;

use App\Models\Resto;
use App\Models\Subscription;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VendeurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return to_route('home');
        }

        $role = Auth::user()->role;

        if ($role !== 'USER') {
            return to_route('home');
        }

        $user = Auth::user();

        if (!isset($user->resto)) {
            return to_route('client.dashboard');
        }

        if ($user->resto->status !== "accepter") {
            return to_route('client.dashboard');
        }

        if (!Auth::user()->subscriptions) {
            return to_route('subscription.index');
        }
        
        return $next($request);
    }
}
