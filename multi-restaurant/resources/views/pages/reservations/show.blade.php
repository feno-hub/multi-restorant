<x-auth-layout>

<div class="reservation-show">

    <div class="reservation-show__header">

        <div>

            <span class="reservation-show__label">
                RÉSERVATION
            </span>

            <h1>
                Détail de votre réservation
            </h1>

            <p>
                Votre réservation a bien été enregistrée.
            </p>

        </div>

        <div class="reservation-show__actions">

            <a
                href="{{ url('/') }}"
                class="btn-back"
            >
                ← Accueil
            </a>

            @if ($reservation->status !== 'refused')
                <a
                    href="{{ route('client.payment.reservation.process', $reservation) }}"
                    class="multi-button-primary"
                >
                    Payer la réservation
                </a>
            @endif

        </div>

    </div>

    <x-success-layout key="success" />

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="reservation-show__layout">

        <div class="reservation-show__content">

            <div class="reservation-card">

                <div class="reservation-card__title">

                    <h2>
                        Informations de réservation
                    </h2>

                    <span class="reservation-status status-{{ $reservation->status }}">
                        @if ($reservation->status === 'pending')
                            En attente
                        @elseif ($reservation->status === 'accepted')
                            Acceptée
                        @elseif ($reservation->status === 'refused')
                            Refusée
                        @else
                            {{ ucfirst($reservation->status) }}
                        @endif
                    </span>

                </div>

                <div class="reservation-info-grid">

                    <div class="reservation-info">

                        <span>
                            Nom
                        </span>

                        <strong>
                            {{ $reservation->name }}
                        </strong>

                    </div>

                    <div class="reservation-info">

                        <span>
                            Email
                        </span>

                        <strong>
                            {{ $reservation->email }}
                        </strong>

                    </div>

                    <div class="reservation-info">

                        <span>
                            Téléphone
                        </span>

                        <strong>
                            {{ $reservation->phone }}
                        </strong>

                    </div>

                    <div class="reservation-info">

                        <span>
                            Nombre de personnes
                        </span>

                        <strong>
                            {{ $reservation->guests }}
                            personne{{ $reservation->guests > 1 ? 's' : '' }}
                        </strong>

                    </div>

                    <div class="reservation-info">

                        <span>
                            Date
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}
                        </strong>

                    </div>

                    <div class="reservation-info">

                        <span>
                            Heure
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}
                        </strong>

                    </div>

                </div>

            </div>

            @if ($reservation->message)

                <div class="reservation-card">

                    <h2>
                        Votre message
                    </h2>

                    <p class="reservation-message">
                        {{ $reservation->message }}
                    </p>

                </div>

            @endif

        </div>

        <aside class="reservation-show__sidebar">

            <div class="restaurant-card">

                <small>
                    RESTAURANT
                </small>

                <h2>
                    {{ $reservation->resto->name }}
                </h2>

                @if ($reservation->resto->address)

                    <p>
                        {{ $reservation->resto->address }}
                    </p>

                @endif

                @if ($reservation->resto->phone)

                    <p>
                        {{ $reservation->resto->phone }}
                    </p>

                @endif

            </div>

            <div class="reservation-card reservation-payment-card">

                <h3>
                    Paiement
                </h3>

                @if ($reservation->status === 'refused')

                    <p>
                        Cette réservation a été refusée.
                    </p>

                @else

                    <p>
                        Le paiement de votre réservation peut être effectué
                        avec MVola, Orange Money ou Airtel Money.
                    </p>

                    <a
                        href="{{ route('client.payment.reservation', $reservation) }}"
                        class="multi-button-primary"
                    >
                        Payer maintenant
                    </a>

                @endif

            </div>

            <div class="reservation-card">

                <h3>
                    Date de création
                </h3>

                <p>
                    {{ $reservation->created_at->format('d/m/Y à H:i') }}
                </p>

            </div>

        </aside>

    </div>

</div>

</x-auth-layout>
