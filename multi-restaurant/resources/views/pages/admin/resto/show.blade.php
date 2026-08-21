<x-admin-layout>

    @php
        $path = '/storage/';
    @endphp

    <section class="restaurant-detail">

        {{-- =========================================
             EN-TÊTE
        ========================================== --}}
        <div class="restaurant-detail__top">

            <div class="restaurant-detail__breadcrumb">

                <a href="{{ route('admin.restaurant') }}">
                    <i class="fas fa-store"></i>
                    Restaurants
                </a>

                <i class="fas fa-chevron-right"></i>

                <span>Détail du restaurant</span>

            </div>


            <div class="restaurant-detail__actions">

                <a href="{{ route('admin.restaurant') }}" class="restaurant-detail__btn restaurant-detail__btn--back">

                    <i class="fas fa-arrow-left"></i>
                    Retour

                </a>

            </div>

        </div>


        {{-- =========================================
             HERO RESTAURANT
        ========================================== --}}
        <div class="restaurant-detail__hero">

            <div class="restaurant-detail__cover">

                <img src="{{ $path . $user->resto->cover }}" alt="Restaurant Le Gourmet">

                @if ($user->resto->status == 'accepter')
                    <span class="restaurant-detail__status restaurant-detail__status--accepted">
                        <i class="fas fa-clock"></i>
                        {{ $user->resto->status }}
                    </span>
                @elseif ($user->resto->status == 'refuse')
                    <span class="restaurant-detail__status restaurant-detail__status--refused">
                        <i class="fas fa-clock"></i>
                        {{ $user->resto->status }}
                    </span>
                @else
                    <span class="restaurant-detail__status restaurant-detail__status--pending">
                        <i class="fas fa-clock"></i>
                        {{ $user->resto->status }}
                    </span>
                @endif

            </div>


            <div class="restaurant-detail__identity">

                <div class="restaurant-detail__logo">

                    @if (isset($user->resto->logo))
                        <img src="{{ $path . $user->resto->logo }}" alt="">
                    @else
                        <i class="fas fa-utensils"></i>
                    @endif

                </div>

                <div>

                    <h1>
                        {{ $user->resto->name }}
                    </h1>

                    <p>
                        <i class="fas fa-location-dot"></i>
                        {{ $user->resto->city }}, {{ $user->resto->address }}
                    </p>

                    <span>
                        {{ $user->resto->category }} · ID #REST-{{ $user->resto->id }}
                    </span>

                </div>

            </div>

        </div>


        {{-- =========================================
             STATISTIQUES
        ========================================== --}}
        <div class="restaurant-detail__stats">

            <div class="restaurant-detail__stat">

                <div class="restaurant-detail__stat-icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>

                <div>

                    <strong>248</strong>

                    <span>Commandes</span>

                </div>

            </div>


            <div class="restaurant-detail__stat">

                <div class="restaurant-detail__stat-icon">
                    <i class="fas fa-star"></i>
                </div>

                <div>

                    <strong>4.8</strong>

                    <span>Note moyenne</span>

                </div>

            </div>


            <div class="restaurant-detail__stat">

                <div class="restaurant-detail__stat-icon">
                    <i class="fas fa-utensils"></i>
                </div>

                <div>

                    <strong>36</strong>

                    <span>Plats</span>

                </div>

            </div>


            <div class="restaurant-detail__stat">

                <div class="restaurant-detail__stat-icon">
                    <i class="fas fa-users"></i>
                </div>

                <div>

                    <strong>184</strong>

                    <span>Clients</span>

                </div>

            </div>

        </div>


        {{-- =========================================
             CONTENU PRINCIPAL
        ========================================== --}}
        <div class="restaurant-detail__grid">


            {{-- =====================================
                 INFORMATIONS DU RESTAURANT
            ====================================== --}}
            <div class="restaurant-detail__card">

                <div class="restaurant-detail__card-header">

                    <div>

                        <h2>
                            <i class="fas fa-circle-info"></i>
                            Informations du restaurant
                        </h2>

                        <p>
                            Informations générales du restaurant
                        </p>

                    </div>

                </div>


                <div class="restaurant-detail__information">

                    <div class="restaurant-detail__field">

                        <span>
                            Nom du restaurant
                        </span>

                        <strong>
                            {{ $user->resto->name }}
                        </strong>

                    </div>


                    <div class="restaurant-detail__field">

                        <span>
                            Catégorie
                        </span>

                        <strong>
                            {{ $user->resto->category }}
                        </strong>

                    </div>


                    <div class="restaurant-detail__field">

                        <span>
                            Email
                        </span>

                        <strong>
                            {{ $user->resto->email }}
                        </strong>

                    </div>


                    <div class="restaurant-detail__field">

                        <span>
                            Téléphone
                        </span>

                        <strong>
                            {{ $user->resto->phone }}
                        </strong>

                    </div>


                    <div class="restaurant-detail__field">

                        <span>
                            Adresse
                        </span>

                        <strong>
                            {{ $user->resto->city }} {{ $user->resto->address }}
                        </strong>

                    </div>


                    <div class="restaurant-detail__field">

                        <span>
                            Date d'inscription
                        </span>

                        <strong>
                            {{ $user->resto->created_at }}
                        </strong>

                    </div>

                </div>

            </div>


            {{-- =====================================
                 PROPRIÉTAIRE
            ====================================== --}}
            <div class="restaurant-detail__card">

                <div class="restaurant-detail__card-header">

                    <div>

                        <h2>
                            <i class="fas fa-user"></i>
                            Propriétaire
                        </h2>

                        <p>
                            Responsable du restaurant
                        </p>

                    </div>

                </div>


                <div class="restaurant-detail__owner">

                    <div class="restaurant-detail__owner-avatar">
                        {{ $user->name[0] }}{{ $user->last_name[0] }}
                    </div>

                    <div class="restaurant-detail__owner-info">

                        <strong>
                            {{ $user->name }}{{ $user->last_name }}
                        </strong>

                        <span>
                            Propriétaire
                        </span>

                        <a href="mailto:jean.dupont@gmail.com">
                            <i class="fas fa-envelope"></i>
                            {{ $user->email }}
                        </a>

                        @if (isset($user->phone))
                            <a href="tel:+261341234567">
                                <i class="fas fa-phone"></i>
                                {{ $user->phone }}
                            </a>
                        @else
                            <a href="tel:+261341234567">
                                <i class="fas fa-phone"></i>
                                {{ $user->resto->phone }}
                            </a>
                        @endif

                    </div>

                </div>

            </div>


            {{-- =====================================
                 DESCRIPTION
            ====================================== --}}
            <div class="restaurant-detail__card restaurant-detail__card--full">

                <div class="restaurant-detail__card-header">

                    <div>

                        <h2>
                            <i class="fas fa-align-left"></i>
                            Description
                        </h2>

                    </div>

                </div>


                <p class="restaurant-detail__description">

                    {{ $user->resto->description }}

                </p>

            </div>


            {{-- =====================================
                 HORAIRES
            ====================================== --}}
            <div class="restaurant-detail__card">

                <div class="restaurant-detail__card-header">

                    <div>

                        <h2>
                            <i class="fas fa-clock"></i>
                            Horaires
                        </h2>

                    </div>

                </div>


                <div class="restaurant-detail__hours">

                    <div>
                        {{-- <span>Samedi</span> --}}
                        <strong>{{ $user->resto->open_time }} - {{ $user->resto->close_time }}</strong>
                    </div>

                </div>

            </div>


            {{-- =====================================
                 INFORMATIONS ADMIN
            ====================================== --}}
            <div class="restaurant-detail__card">

                <div class="restaurant-detail__card-header">

                    <div>

                        <h2>
                            <i class="fas fa-shield-halved"></i>
                            Administration
                        </h2>

                    </div>

                </div>


                <div class="restaurant-detail__admin-info">

                    <div>

                        <span>Statut</span>

                        <strong class="restaurant-detail__admin-status">
                            <i class="fas fa-clock"></i>
                            {{ $user->resto->status }}
                        </strong>

                    </div>


                    <div>

                        <span>Inscription</span>

                        <strong>
                            {{ $user->resto->created_at }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================
             ACTIONS ADMIN
        ========================================== --}}
        @if ($user->resto->status == "en_attent")
            <div class="restaurant-detail__validation">

                <div>

                    <h2>
                        Décision administrative
                    </h2>

                    <p>
                        Validez ou refusez l'inscription de ce restaurant.
                    </p>

                </div>


                <div class="restaurant-detail__validation-actions">

                    <form action="#" method="POST">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="restaurant-detail__btn restaurant-detail__btn--refuse">

                            <i class="fas fa-xmark"></i>
                            Refuser

                        </button>

                    </form>


                    <form action="#" method="POST">

                        @csrf
                        @method('PATCH')

                        <button type="submit" class="restaurant-detail__btn restaurant-detail__btn--accept">

                            <i class="fas fa-check"></i>
                            Accepter le restaurant

                        </button>

                    </form>

                </div>

            </div>
        @endif

    </section>

</x-admin-layout>
