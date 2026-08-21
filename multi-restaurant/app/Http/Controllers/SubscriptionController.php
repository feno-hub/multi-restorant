<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Afficher les plans d'abonnement
     */
    public function index()
    {
        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Récupérer les plans disponibles
        |--------------------------------------------------------------------------
        */

        $plans = SubscriptionPlan::where('is_active', true)
            ->orderBy('price', 'asc')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Abonnement actuel
        |--------------------------------------------------------------------------
        */

        $currentSubscription = $user
            ->currentSubscription()
            ->with('plan')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | Vérifier l'état de l'abonnement
        |--------------------------------------------------------------------------
        */

        if (
            $currentSubscription &&
            $currentSubscription->ends_at->isPast()
        ) {

            $currentSubscription->update([
                'status' => 'expired',
            ]);

            $currentSubscription = null;
        }


        return view(
            'pages.subscription.index',
            compact(
                'plans',
                'currentSubscription'
            )
        );
    }


    /**
     * Souscrire à un abonnement
     */
    public function subscribe(
        Request $request,
        SubscriptionPlan $plan
    ) {

        $user = Auth::user();


        /*
        |--------------------------------------------------------------------------
        | Vérifier que le plan est actif
        |--------------------------------------------------------------------------
        */

        if (!$plan->is_active) {

            return back()->with(
                'error',
                'Cet abonnement n’est plus disponible.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Annuler l'ancien abonnement
        |--------------------------------------------------------------------------
        */

        $user->subscriptions()
            ->where('status', 'active')
            ->update([
                'status' => 'cancelled',
            ]);


        /*
        |--------------------------------------------------------------------------
        | Date de début
        |--------------------------------------------------------------------------
        */

        $startDate = Carbon::today();


        /*
        |--------------------------------------------------------------------------
        | Date de fin
        |--------------------------------------------------------------------------
        */

        $endDate = $startDate
            ->copy()
            ->addDays($plan->duration);


        /*
        |--------------------------------------------------------------------------
        | Créer l'abonnement
        |--------------------------------------------------------------------------
        */

        Subscription::create([
            'user_id' => $user->id,

            'subscription_plan_id' => $plan->id,

            'starts_at' => $startDate,

            'ends_at' => $endDate,

            'status' => 'active',
        ]);


        return redirect()
            ->route('subscription.index')
            ->with(
                'success',
                'Votre abonnement a été activé avec succès.'
            );
    }


    /**
     * Historique des abonnements
     */
    public function history()
    {
        $user = Auth::user();


        $subscriptions = $user
            ->subscriptions()
            ->with('plan')
            ->latest()
            ->paginate(10);


        return view(
            'pages.subscription.history',
            compact('subscriptions')
        );
    }
}