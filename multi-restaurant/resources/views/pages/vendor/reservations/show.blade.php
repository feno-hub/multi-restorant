<x-vendeur-layout>

    <div class="reservation-show">

        {{-- En-tête --}}
        <div class="reservation-show__header">

            <div>
                <a href="{{ route('vendeur.reservations.index') }}"
                   class="reservation-show__back">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour aux réservations
                </a>

                <h1>
                    <i class="fa-regular fa-calendar-check"></i>
                    Détails de la réservation
                </h1>

                <p>
                    Consultez les informations de cette réservation.
                </p>
            </div>

            <div class="reservation-show__number">
                <span>Réservation</span>
                <strong>#{{ $reservation->id }}</strong>
            </div>

        </div>


        {{-- Messages --}}
        @if(session('success'))
            <div class="reservation-alert reservation-alert--success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="reservation-alert reservation-alert--error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif


        <div class="reservation-show__grid">

            {{-- Informations réservation --}}
            <div class="reservation-card">

                <div class="reservation-card__header">
                    <div class="reservation-card__icon">
                        <i class="fa-regular fa-calendar-days"></i>
                    </div>

                    <div>
                        <h2>Informations de réservation</h2>
                        <p>Détails du rendez-vous</p>
                    </div>
                </div>


                <div class="reservation-info">

                    <div class="reservation-info__item">
                        <span class="reservation-info__label">
                            <i class="fa-regular fa-calendar"></i>
                            Date
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                        </strong>
                    </div>


                    <div class="reservation-info__item">
                        <span class="reservation-info__label">
                            <i class="fa-regular fa-clock"></i>
                            Heure
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}
                        </strong>
                    </div>


                    <div class="reservation-info__item">
                        <span class="reservation-info__label">
                            <i class="fa-solid fa-users"></i>
                            Nombre de personnes
                        </span>

                        <strong>
                            {{ $reservation->guests }}
                            {{ $reservation->guests > 1 ? 'personnes' : 'personne' }}
                        </strong>
                    </div>


                    <div class="reservation-info__item">
                        <span class="reservation-info__label">
                            <i class="fa-solid fa-circle-info"></i>
                            Statut
                        </span>

                        @switch($reservation->status)

                            @case('en_attente')
                                <span class="reservation-status reservation-status--pending">
                                    En attente
                                </span>
                                @break

                            @case('confirmee')
                                <span class="reservation-status reservation-status--confirmed">
                                    Confirmée
                                </span>
                                @break

                            @case('refusee')
                                <span class="reservation-status reservation-status--refused">
                                    Refusée
                                </span>
                                @break

                            @case('annulee')
                                <span class="reservation-status reservation-status--cancelled">
                                    Annulée
                                </span>
                                @break

                            @case('terminee')
                                <span class="reservation-status reservation-status--finished">
                                    Terminée
                                </span>
                                @break

                            @default
                                <span class="reservation-status">
                                    {{ $reservation->status }}
                                </span>

                        @endswitch

                    </div>

                </div>

            </div>


            {{-- Informations client --}}
            <div class="reservation-card">

                <div class="reservation-card__header">

                    <div class="reservation-card__icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>
                        <h2>Informations du client</h2>
                        <p>Coordonnées du client</p>
                    </div>

                </div>


                <div class="client-profile">

                    <div class="client-profile__avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="client-profile__content">

                        <h3>
                            {{ $reservation->user->name ?? 'Client inconnu' }}
                        </h3>

                        @if($reservation->user?->email)
                            <p>
                                <i class="fa-regular fa-envelope"></i>
                                {{ $reservation->user->email }}
                            </p>
                        @endif

                        @if($reservation->user?->phone)
                            <p>
                                <i class="fa-solid fa-phone"></i>
                                {{ $reservation->user->phone }}
                            </p>
                        @endif

                    </div>

                </div>

            </div>


            {{-- Restaurant --}}
            <div class="reservation-card">

                <div class="reservation-card__header">

                    <div class="reservation-card__icon">
                        <i class="fa-solid fa-utensils"></i>
                    </div>

                    <div>
                        <h2>Restaurant</h2>
                        <p>Restaurant concerné</p>
                    </div>

                </div>


                <div class="restaurant-info">

                    @if($reservation->resto?->logo)

                        <img
                            src="{{ asset('storage/' . $reservation->resto->logo) }}"
                            alt="{{ $reservation->resto->name }}"
                            class="restaurant-info__logo"
                        >

                    @else

                        <div class="restaurant-info__logo restaurant-info__logo--empty">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                    @endif


                    <div>

                        <h3>
                            {{ $reservation->resto->name ?? 'Restaurant inconnu' }}
                        </h3>

                        @if($reservation->resto?->city)
                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $reservation->resto->city }}
                            </p>
                        @endif

                        @if($reservation->resto?->phone)
                            <p>
                                <i class="fa-solid fa-phone"></i>
                                {{ $reservation->resto->phone }}
                            </p>
                        @endif

                    </div>

                </div>

            </div>


            {{-- Actions --}}
            <div class="reservation-card reservation-card--actions">

                <div class="reservation-card__header">

                    <div class="reservation-card__icon">
                        <i class="fa-solid fa-sliders"></i>
                    </div>

                    <div>
                        <h2>Gestion de la réservation</h2>
                        <p>Modifier le statut</p>
                    </div>

                </div>


                <form
                    action="{{ route('vendeur.reservations.status', $reservation) }}"
                    method="POST"
                    class="reservation-status-form"
                >

                    @csrf
                    @method('PATCH')

                    <label for="status">
                        Statut de la réservation
                    </label>

                    <select name="status" id="status">

                        <option value="en_attente"
                            {{ $reservation->status === 'en_attente' ? 'selected' : '' }}>
                            En attente
                        </option>

                        <option value="confirmee"
                            {{ $reservation->status === 'confirmee' ? 'selected' : '' }}>
                            Confirmée
                        </option>

                        <option value="refusee"
                            {{ $reservation->status === 'refusee' ? 'selected' : '' }}>
                            Refusée
                        </option>

                        <option value="annulee"
                            {{ $reservation->status === 'annulee' ? 'selected' : '' }}>
                            Annulée
                        </option>

                        <option value="terminee"
                            {{ $reservation->status === 'terminee' ? 'selected' : '' }}>
                            Terminée
                        </option>

                    </select>

                    <button type="submit" class="multi-button-primary">
                        <i class="fa-solid fa-check"></i>
                        Mettre à jour
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-vendeur-layout>