<?php

namespace App\Http\Middleware;

use App\Models\Resto;
use App\Models\Subscription;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
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

        if ($role !== "USER") {
            return to_route('home');
        }

        $user = Auth::user();

        
        $user_id = $user->id;

        $subscriptions = Subscription::where('user_id', '!=', $user_id)->get();

        if (!$subscriptions) {
            return to_route('subscription.index');
        }

        if(isset($user->resto)) {
            if($user->resto->status == "accepter") {
                return to_route('vendor.dashboard');
            }
        }

        return $next($request);
    }
}
