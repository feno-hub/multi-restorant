<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $plans = SubscriptionPlan::where('is_active', true)
            ->orderBy('price', 'asc')
            ->get();

        return view(
            'pages.subscription.index', [
                'plans' => $plans
            ]
        );
    }


    public function subscribe(
        Request $request,
        SubscriptionPlan $plan
    ) {

        $user = Auth::user();


        if (!$plan->is_active) {

            return back()->with(
                'error',
                'Cet abonnement n’est plus disponible.'
            );
        }


        $startDate = Carbon::today();


        $endDate = $startDate
            ->copy()
            ->addDays($plan->duration);


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


    public function history()
    {
        $user = Auth::user();


        $subscriptions = $user->subscriptions            
            ->latest()
            ->paginate(10);


        return view(
            'pages.subscription.history', [
                'subscriptions' => $subscriptions
            ]
        );
    }
}