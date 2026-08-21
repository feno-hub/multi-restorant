<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('pages.admin.subscription.list', [
            "subscriptionPlan" => SubscriptionPlan::all()
        ]);
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('pages.admin.subscription.create');
    }


    /**
     * Enregistrer un nouvel abonnement
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:subscription_plans,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'features' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);


        // Transformer les fonctionnalités en tableau
        $features = null;

        if (!empty($validated['features'])) {
            $features = array_values(
                array_filter(
                    array_map('trim', explode("\n", $validated['features']))
                )
            );
        }


        SubscriptionPlan::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'duration' => $validated['duration'],
            'features' => $features,
            'is_active' => $validated['is_active'],
        ]);


        return redirect()
            ->route('admin.subscription')
            ->with('success', 'L’abonnement a été créé avec succès.');
    }


    /**
     * Formulaire de modification
     */
    public function edit(SubscriptionPlan $subscriptionPlan)
    {
        return view(
            'pages.admin.subscription.create',
            compact('subscriptionPlan')
        );
    }


    /**
     * Modifier un abonnement
     */
    public function update(
        Request $request,
        SubscriptionPlan $subscriptionPlan
    ) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'slug' => 'required|string|max:255|unique:subscription_plans,slug,' .
                $subscriptionPlan->id,

            'description' => 'nullable|string',

            'price' => 'required|numeric|min:0',

            'duration' => 'required|integer|min:1',

            'features' => 'nullable|string',

            'is_active' => 'required|boolean',
        ]);


        // Transformer les fonctionnalités en tableau
        $features = null;

        if (!empty($validated['features'])) {
            $features = array_values(
                array_filter(
                    array_map(
                        'trim',
                        explode("\n", $validated['features'])
                    )
                )
            );
        }


        $subscriptionPlan->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'duration' => $validated['duration'],
            'features' => $features,
            'is_active' => $validated['is_active'],
        ]);


        return redirect()
            ->route('admin.subscription')
            ->with('success', 'L’abonnement a été modifié avec succès.');
    }


    /**
     * Supprimer un abonnement
     */
    public function destroy(SubscriptionPlan $subscriptionPlan)
    {
        $subscriptionPlan->delete();

        return redirect()
            ->route('admin.subscription')
            ->with('success', 'L’abonnement a été supprimé avec succès.');
    }
}
