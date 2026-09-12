<x-client-layout>

    <div class="client-reservations">

        <div class="client-reservations__header">

            <div>
                <a href="{{ route('client.dashboard') }}" class="client-reservations__subtitle">
                    <x-btnsecondary-layout icon='fa-solid fa-arrow-left' btn='Retour' />
                </a>

                <h1>Mes réservations</h1>

                <p>
                    Retrouvez ici toutes vos réservations de restaurants.
                </p>
            </div>

            <div class="client-reservations__header-icon">
                <i class="fa-regular fa-calendar-check"></i>
            </div>

        </div>


        @if(session('success'))
            <div class="reservation-message reservation-message--success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif


        @if(session('error'))
            <div class="reservation-message reservation-message--error">
                <i class="fa-solid fa-circle-exclamation"></i>
                {{ session('error') }}
            </div>
        @endif


        <div class="reservations-list">

            @forelse($reservations as $reservation)

                <div class="reservation-card">

                    <div class="reservation-card__restaurant">

                        <div class="restaurant-logo">

                            @if($reservation->resto?->logo)
                                <img
                                    src="{{ asset('storage/' . $reservation->resto->logo) }}"
                                    alt="{{ $reservation->resto->name }}"
                                >
                            @else
                                <i class="fa-solid fa-utensils"></i>
                            @endif

                        </div>

                        <div class="restaurant-info">

                            <span>Restaurant</span>

                            <h2>
                                {{ $reservation->resto->name ?? 'Restaurant supprimé' }}
                            </h2>

                            @if($reservation->resto?->city)
                                <p>
                                    <i class="fa-solid fa-location-dot"></i>
                                    {{ $reservation->resto->city }}
                                </p>
                            @endif

                        </div>

                    </div>


                    <div class="reservation-card__content">

                        <div class="reservation-detail">

                            <div class="reservation-detail__icon">
                                <i class="fa-regular fa-calendar"></i>
                            </div>

                            <div>
                                <span>Date</span>

                                <strong>
                                    {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                                </strong>
                            </div>

                        </div>


                        <div class="reservation-detail">

                            <div class="reservation-detail__icon">
                                <i class="fa-regular fa-clock"></i>
                            </div>

                            <div>
                                <span>Heure</span>

                                <strong>
                                    {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}
                                </strong>
                            </div>

                        </div>


                        <div class="reservation-detail">

                            <div class="reservation-detail__icon">
                                <i class="fa-solid fa-users"></i>
                            </div>

                            <div>
                                <span>Personnes</span>

                                <strong>
                                    {{ $reservation->guests ?? $reservation->number_of_people ?? 1 }}
                                </strong>
                            </div>

                        </div>


                        <div class="reservation-detail">

                            <div class="reservation-detail__icon">
                                <i class="fa-solid fa-hashtag"></i>
                            </div>

                            <div>
                                <span>Réservation</span>

                                <strong>
                                    #{{ $reservation->id }}
                                </strong>
                            </div>

                        </div>

                    </div>


                    <div class="reservation-card__footer">

                        <div>

                            @if($reservation->status === 'en_attente')

                                <span class="reservation-status reservation-status--pending">
                                    <span></span>
                                    En attente
                                </span>

                            @elseif($reservation->status === 'confirmee')

                                <span class="reservation-status reservation-status--confirmed">
                                    <span></span>
                                    Confirmée
                                </span>

                            @elseif($reservation->status === 'refusee')

                                <span class="reservation-status reservation-status--refused">
                                    <span></span>
                                    Refusée
                                </span>

                            @elseif($reservation->status === 'annulee')

                                <span class="reservation-status reservation-status--cancelled">
                                    <span></span>
                                    Annulée
                                </span>

                            @elseif($reservation->status === 'terminee')

                                <span class="reservation-status reservation-status--finished">
                                    <span></span>
                                    Terminée
                                </span>

                            @else

                                <span class="reservation-status">
                                    {{ $reservation->status }}
                                </span>

                            @endif

                        </div>


                        <div class="reservation-card__actions">

                            <a
                                href="{{ route('client.reservations.show', $reservation) }}"
                                class="reservation-btn reservation-btn--primary"
                            >
                                <i class="fa-solid fa-eye"></i>
                                Voir les détails
                            </a>


                            @if($reservation->status === 'confirmee')

                                <a
                                    href="{{ route('client.payment.reservation', $reservation) }}"
                                    class="reservation-btn reservation-btn--payment"
                                >
                                    <i class="fa-solid fa-credit-card"></i>
                                    Payer
                                </a>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="reservations-empty">

                    <div class="reservations-empty__icon">
                        <i class="fa-regular fa-calendar-xmark"></i>
                    </div>

                    <h2>
                        Aucune réservation
                    </h2>

                    <p>
                        Vous n'avez encore effectué aucune réservation.
                    </p>

                    <a
                        href=""
                        class="reservation-btn reservation-btn--primary"
                    >
                        <i class="fa-solid fa-utensils"></i>
                        Découvrir les restaurants
                    </a>

                </div>

            @endforelse

        </div>


        @if($reservations->hasPages())

            <div class="reservations-pagination">
                {{ $reservations->links() }}
            </div>

        @endif

    </div>

</x-client-layout>