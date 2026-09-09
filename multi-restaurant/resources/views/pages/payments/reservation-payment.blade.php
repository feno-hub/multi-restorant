<x-auth-layout>
    <div class="payment-page">

        <div class="payment-container">

            <div class="payment-header">
                <span class="payment-label">Paiement sécurisé</span>

                <h1>Choisir votre moyen de paiement</h1>

                <p>
                    Sélectionnez le moyen de paiement que vous souhaitez utiliser.
                </p>
            </div>

            <div class="payment-summary">

                <div>
                    <span>Montant à payer</span>

                    <strong>
                        {{ number_format($payment->amount, 0, ',', ' ') }} Ar
                    </strong>
                </div>

                <span class="payment-status">
                    En attente
                </span>

            </div>

            <form action="{{ route('client.payment.reservation', $reservation) }}" method="POST">

                @csrf
                @method('POST')

                <div class="payment-methods">

                    <label class="payment-method">
                        <input type="radio" name="method" value="mvola" required>

                        <div class="payment-method-content">
                            <div class="payment-icon">
                                <span>MV</span>
                            </div>

                            <div>
                                <strong>MVola</strong>
                                <p>Paiement simulé avec MVola</p>
                            </div>
                        </div>
                    </label>

                    <label class="payment-method">
                        <input type="radio" name="method" value="orange_money">

                        <div class="payment-method-content">
                            <div class="payment-icon">
                                <span>OM</span>
                            </div>

                            <div>
                                <strong>Orange Money</strong>
                                <p>Paiement simulé avec Orange Money</p>
                            </div>
                        </div>
                    </label>

                    <label class="payment-method">
                        <input type="radio" name="method" value="airtel_money">

                        <div class="payment-method-content">
                            <div class="payment-icon">
                                <span>AM</span>
                            </div>

                            <div>
                                <strong>Airtel Money</strong>
                                <p>Paiement simulé avec Airtel Money</p>
                            </div>
                        </div>
                    </label>

                </div>

                @error('method')
                    <div class="payment-error">
                        {{ $message }}
                    </div>
                @enderror

                <div class="payment-simulation">
                    <strong>Paiement en simulation</strong>

                    <p>
                        Aucun argent réel ne sera débité.
                        Une fausse transaction sera générée automatiquement.
                    </p>
                </div>

                <button type="submit" class="payment-button">
                    Continuer le paiement
                </button>

            </form>

        </div>

    </div>
</x-auth-layout>
