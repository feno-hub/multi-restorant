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

        /*
        |--------------------------------------------------------------------------
        | Vérifier la connexion
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {

            return redirect()
                ->route('login');
        }


        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Vérifier l'abonnement
        |--------------------------------------------------------------------------
        */

        if (!$user->hasActiveSubscription()) {

            return redirect()
                ->route('subscription.index')
                ->with(
                    'error',
                    'Cette fonctionnalité est réservée aux utilisateurs abonnés.'
                );
        }


        return $next($request);
    }
}