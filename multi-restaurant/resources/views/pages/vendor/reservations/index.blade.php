<x-vendeur-layout>

    <div class="reservations-page">

        <div class="reservations-header">

            <div class="reservations-header__content">
                <span class="reservations-header__subtitle">
                    Gestion du restaurant
                </span>

                <h1>
                    Mes réservations
                </h1>

                <p>
                    Consultez et gérez les réservations de vos clients.
                </p>
            </div>

            <div class="reservations-header__icon">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

        </div>


        @if(session('success'))
            <div class="reservation-alert reservation-alert--success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif


        <div class="reservations-stats">

            <div class="reservation-stat">
                <div class="reservation-stat__icon">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>

                <div>
                    <span>Total</span>
                    <strong>{{ $reservations->total() }}</strong>
                </div>
            </div>

            <div class="reservation-stat">
                <div class="reservation-stat__icon">
                    <i class="fa-solid fa-clock"></i>
                </div>

                <div>
                    <span>En attente</span>
                    <strong>
                        {{ $reservations->where('status', 'en_attente')->count() }}
                    </strong>
                </div>
            </div>

            <div class="reservation-stat">
                <div class="reservation-stat__icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <div>
                    <span>Confirmées</span>
                    <strong>
                        {{ $reservations->where('status', 'confirmee')->count() }}
                    </strong>
                </div>
            </div>

            <div class="reservation-stat">
                <div class="reservation-stat__icon">
                    <i class="fa-solid fa-ban"></i>
                </div>

                <div>
                    <span>Annulées</span>
                    <strong>
                        {{ $reservations->where('status', 'annulee')->count() }}
                    </strong>
                </div>
            </div>

        </div>


        <div class="reservations-card">

            <div class="reservations-card__header">

                <div>
                    <h2>
                        Liste des réservations
                    </h2>

                    <p>
                        Toutes les réservations de votre restaurant
                    </p>
                </div>

                <div class="reservations-card__search">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="reservationSearch"
                        placeholder="Rechercher..."
                    >
                </div>

            </div>


            <div class="reservations-table-wrapper">

                <table class="reservations-table">

                    <thead>
                        <tr>
                            <th>Réservation</th>
                            <th>Client</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Personnes</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="reservationTable">

                        @forelse($reservations as $reservation)

                            <tr>

                                <td>
                                    <div class="reservation-number">
                                        <span class="reservation-number__icon">
                                            <i class="fa-solid fa-hashtag"></i>
                                        </span>

                                        <strong>
                                            {{ $reservation->id }}
                                        </strong>
                                    </div>
                                </td>


                                <td>
                                    <div class="client-info">

                                        <div class="client-avatar">
                                            {{ strtoupper(substr($reservation->user->name ?? 'C', 0, 1)) }}
                                        </div>

                                        <div>
                                            <strong>
                                                {{ $reservation->user->name ?? 'Client' }}
                                            </strong>

                                            @if($reservation->user?->email)
                                                <small>
                                                    {{ $reservation->user->email }}
                                                </small>
                                            @endif
                                        </div>

                                    </div>
                                </td>


                                <td>
                                    <div class="date-info">
                                        <i class="fa-regular fa-calendar"></i>

                                        <span>
                                            {{ \Carbon\Carbon::parse($reservation->reservation_date)->format('d/m/Y') }}
                                        </span>
                                    </div>
                                </td>


                                <td>
                                    <div class="time-info">
                                        <i class="fa-regular fa-clock"></i>

                                        {{ \Carbon\Carbon::parse($reservation->reservation_time)->format('H:i') }}
                                    </div>
                                </td>


                                <td>
                                    <span class="guests-count">
                                        <i class="fa-solid fa-users"></i>
                                        {{ $reservation->guests ?? $reservation->number_of_people ?? 1 }}
                                    </span>
                                </td>


                                <td>

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

                                </td>


                                <td>

                                    <div class="reservation-actions">

                                        <a
                                            href="{{ route('vendeur.reservations.show', $reservation) }}"
                                            class="reservation-action reservation-action--view"
                                            title="Voir"
                                        >
                                            <i class="fa-solid fa-eye"></i>
                                        </a>


                                        @if($reservation->status === 'en_attente')

                                            <form
                                                action="{{ route('vendeur.reservations.status', $reservation) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <input
                                                    type="hidden"
                                                    name="status"
                                                    value="confirmee"
                                                >

                                                <button
                                                    type="submit"
                                                    class="reservation-action reservation-action--confirm"
                                                    title="Accepter"
                                                >
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </form>


                                            <form
                                                action="{{ route('vendeur.reservations.status', $reservation) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <input
                                                    type="hidden"
                                                    name="status"
                                                    value="refusee"
                                                >

                                                <button
                                                    type="submit"
                                                    class="reservation-action reservation-action--refuse"
                                                    title="Refuser"
                                                >
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </form>

                                        @endif

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7">

                                    <div class="reservation-empty">

                                        <div class="reservation-empty__icon">
                                            <i class="fa-regular fa-calendar-xmark"></i>
                                        </div>

                                        <h3>
                                            Aucune réservation
                                        </h3>

                                        <p>
                                            Votre restaurant n'a encore reçu aucune réservation.
                                        </p>

                                    </div>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            @if($reservations->hasPages())

                <div class="reservations-pagination">
                    {{ $reservations->links() }}
                </div>

            @endif

        </div>

    </div>


    <script>
        document
            .getElementById('reservationSearch')
            ?.addEventListener('input', function () {

                const search = this.value.toLowerCase();

                document
                    .querySelectorAll('#reservationTable tr')
                    .forEach(row => {

                        const text = row.textContent.toLowerCase();

                        row.style.display =
                            text.includes(search) ? '' : 'none';

                    });

            });
    </script>

</x-vendeur-layout>