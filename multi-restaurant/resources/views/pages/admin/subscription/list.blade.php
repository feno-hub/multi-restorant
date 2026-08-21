<x-admin-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <header class="header">

        <div class="header-left">

            <h1>
                <i class="fas fa-credit-card"></i>
                Gestion des abonnements
            </h1>

            <div class="sub">
                <i class="fas fa-circle status-dot"></i>

                3 abonnements disponibles

                <span class="update-badge">
                    <i class="far fa-clock"></i>
                    Mis à jour à l'instant
                </span>
            </div>

        </div>


        <div class="header-right">

            <div class="date-badge">
                <i class="far fa-calendar-alt"></i>
                <span id="date"></span>
            </div>

            <div class="date-badge">
                <i class="fa-solid fa-stopwatch"></i>
                <span id="time"></span>
            </div>


            <div class="admin-profile">

                <h1>
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    {{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}
                </h1>

                <div>

                    <div class="name">
                        {{ Auth::user()->name }}
                        {{ ucfirst(substr(Auth::user()->last_name, 0, 1)) }}.
                    </div>

                    <div class="role">
                        Super Admin
                    </div>

                </div>

                <i class="fas fa-chevron-down"></i>

            </div>

        </div>

    </header>



    {{-- =========================================================
        STATISTIQUES
    ========================================================== --}}
    <div class="page-admin-subscription-stats">

        {{-- TOTAL --}}
        <div class="stat-item">

            <div class="stat-icon">
                <i class="fas fa-layer-group"></i>
            </div>

            <div>
                <div class="stat-number">
                    3
                </div>

                <div class="stat-label">
                    Total
                </div>
            </div>

        </div>


        {{-- GRATUIT --}}
        <div class="stat-item">

            <div class="stat-icon gratuit-icon">
                <i class="fas fa-gift"></i>
            </div>

            <div>
                <div class="stat-number">
                    1
                </div>

                <div class="stat-label">
                    Gratuit
                </div>
            </div>

        </div>


        {{-- PREMIUM --}}
        <div class="stat-item">

            <div class="stat-icon premium-icon">
                <i class="fas fa-star"></i>
            </div>

            <div>
                <div class="stat-number">
                    1
                </div>

                <div class="stat-label">
                    Premium
                </div>
            </div>

        </div>


        {{-- PRO --}}
        <div class="stat-item">

            <div class="stat-icon pro-icon">
                <i class="fas fa-crown"></i>
            </div>

            <div>
                <div class="stat-number">
                    1
                </div>

                <div class="stat-label">
                    Pro
                </div>
            </div>

        </div>

    </div>



    {{-- =========================================================
        FILTRE
    ========================================================== --}}
    <div class="subscription-toolbar">

        <div class="filter-group">

            <div class="filter-input">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" name="search" placeholder="Rechercher un abonnement...">

            </div>


            <button type="submit" class="filter-search">

                <i class="fa-solid fa-magnifying-glass"></i>

                Rechercher

            </button>

        </div>


        {{-- BOUTON AJOUT --}}
        <a href="{{ route('admin.subscription.create') }}" class="subscription-add-btn">

            <i class="fa-solid fa-plus"></i>

            Ajouter un abonnement

        </a>

    </div>



    {{-- =========================================================
        TABLEAU DES ABONNEMENTS
    ========================================================== --}}
    <div class="subscription-table-container">

        <div class="subscription-table-header">

            <div>

                <h2>
                    Liste des abonnements
                </h2>

                <p>
                    Gérez les offres proposées aux restaurants.
                </p>

            </div>

            <span class="subscription-count">
                3 offres
            </span>

        </div>



        <div class="table-responsive">

            <table class="subscribe">

                <thead>

                    <tr class="subscribe-title">

                        <th>
                            Abonnement
                        </th>

                        <th>
                            Prix
                        </th>

                        <th>
                            Durée
                        </th>

                        <th>
                            Fonctionnalités
                        </th>

                        <th>
                            Statut
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody>


                    {{-- =================================================
                        ABONNEMENTS
                    ================================================== --}}

                    @foreach ($subscriptionPlan as $subscription)
                        <tr class="subscribe-list">

                            <td>

                                <div class="subscription-name">

                                    @if ($subscription->name === 'Gratuit')
                                        <div class="subscription-icon gratuit">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                    @elseif ($subscription->name === 'Premium')
                                        <div class="subscription-icon premium">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                    @else 
                                        <div class="subscription-icon pro">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                    @endif

                                    <div>

                                        <strong>
                                            {{ $subscription->name }}
                                        </strong>

                                    </div>

                                </div>

                            </td>


                            <td>

                                <strong class="price">
                                    {{ $subscription->price }} Ar
                                </strong>

                            </td>


                            <td>

                                <span class="duration">
                                    {{ $subscription->duration }} jours
                                </span>

                            </td>


                            <td>

                                <ul class="features">

                                    @foreach ($subscription->features ?? [] as $feature)
                                        <li>
                                            <i class="fas fa-check"></i>
                                            {{ $feature }}
                                        </li>
                                    @endforeach

                                </ul>

                            </td>


                            <td>

                                @if ($subscription->is_active == '1')
                                    <span class="status active">
                                        <i class="fas fa-circle"></i>
                                        Actif
                                    </span>
                                @else
                                    <span class="status inactive">
                                        <i class="fas fa-circle"></i>
                                        Inactif
                                    </span>
                                @endif
                            </td>


                            <td>

                                <div class="subscription-actions">

                                    <a href="{{ route('admin.subscription.edit', $subscription) }}" class="action edit" title="Modifier">
                                        <i class="fas fa-pen"></i>
                                    </a>


                                    <form action="{{ route('admin.subscription.destroy') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="button" class="action delete" title="Supprimer">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>
                    @endforeach


                </tbody>

            </table>

        </div>

    </div>

</x-admin-layout>
