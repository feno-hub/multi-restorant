<x-auth-layout>

<div class="payment-success">

    <div class="payment-success__card">

        <div class="payment-success__icon">
            ✓
        </div>

        <div class="payment-success__header">
            <span class="payment-success__label">Paiement confirmé</span>

            <h1>Paiement effectué avec succès</h1>

            <p>
                Votre paiement a bien été enregistré.
                Votre commande est maintenant confirmée.
            </p>
        </div>

        <div class="payment-success__amount">
            <span>Montant payé</span>

            <strong>
                {{ number_format($payment->amount, 0, ',', ' ') }} Ar
            </strong>
        </div>

        <div class="payment-success__details">

            <div class="payment-success__row">
                <span>Numéro de transaction</span>
                <strong>{{ $payment->transaction_id }}</strong>
            </div>

            <div class="payment-success__row">
                <span>Moyen de paiement</span>

                <strong>
                    @if ($payment->method === 'mvola')
                        MVola
                    @elseif ($payment->method === 'orange_money')
                        Orange Money
                    @elseif ($payment->method === 'airtel_money')
                        Airtel Money
                    @else
                        {{ $payment->method }}
                    @endif
                </strong>
            </div>

            <div class="payment-success__row">
                <span>Statut</span>

                <span class="payment-success__status">
                    Payé
                </span>
            </div>

            <div class="payment-success__row">
                <span>Date du paiement</span>

                <strong>
                    {{ $payment->paid_at?->format('d/m/Y à H:i') }}
                </strong>
            </div>

        </div>

        <div class="payment-success__actions">

            @if ($payment->order_id)

                <a href="{{ route('client.orders.show', $payment->order_id) }}"
                   class="payment-success__primary">
                    Voir ma commande
                </a>

            @endif

            <a href="{{ url('/') }}"
               class="payment-success__secondary">
                Retour à l'accueil
            </a>

        </div>

        <div class="payment-success__footer">
            <span>✓</span>
            Merci d'avoir choisi MultiResto
        </div>

    </div>

</div>

</x-auth-layout>
