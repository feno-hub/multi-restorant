<x-auth-layout>

    <div class="checkout-page">

        <div class="checkout-header">

            <span>
                COMMANDE
            </span>

            <h1>
                Finaliser votre commande
            </h1>

            <p>
                Vérifiez votre commande avant de la confirmer.
            </p>

        </div>


        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        <div class="checkout-layout">

            <div class="checkout-form">

                <h2>
                    Informations
                </h2>


                <form
                    action="{{ route(
                        'client.orders.store'
                    ) }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-group">

                        <label for="note">
                            Note pour le restaurant
                        </label>

                        <textarea
                            name="note"
                            id="note"
                            rows="5"
                            maxlength="500"
                            placeholder="Ex : Sans oignon, sauce à part..."
                        >{{ old('note') }}</textarea>

                        @error('note')

                            <small class="error">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>


                    <div class="payment-info">

                        <h3>
                            Paiement
                        </h3>

                        <p>
                            Le mode de paiement sera défini
                            selon les options disponibles.
                        </p>

                    </div>


                    <button
                        type="submit"
                        class="confirm-btn"
                    >
                        Confirmer la commande
                    </button>

                </form>

            </div>


            <aside class="checkout-summary">

                <h2>
                    Votre commande
                </h2>


                <div class="restaurant-name">

                    <small>
                        RESTAURANT
                    </small>

                    <strong>
                        {{ $restaurant?->name ?? 'Restaurant inconnu' }}
                    </strong>

                </div>


                @foreach($cart->items as $item)

                    <div class="checkout-item">

                        <div>

                            <strong>
                                {{ $item->plat->name }}
                            </strong>

                            <span>
                                {{ $item->quantity }}
                                ×
                                {{ number_format(
                                    $item->price,
                                    0,
                                    ',',
                                    ' '
                                ) }}
                                Ar
                            </span>

                        </div>


                        <strong>

                            {{
                                number_format(
                                    $item->price *
                                    $item->quantity,
                                    0,
                                    ',',
                                    ' '
                                )
                            }}

                            Ar

                        </strong>

                    </div>

                @endforeach


                <div class="checkout-total">

                    <span>
                        Sous-total
                    </span>

                    <strong>
                        {{ number_format(
                            $subtotal,
                            0,
                            ',',
                            ' '
                        ) }}
                        Ar
                    </strong>

                </div>


                <div class="checkout-total">

                    <span>
                        Livraison
                    </span>

                    <strong>
                        {{ number_format(
                            $deliveryFee,
                            0,
                            ',',
                            ' '
                        ) }}
                        Ar
                    </strong>

                </div>


                <div class="checkout-total">

                    <span>
                        Total
                    </span>

                    <strong>
                        {{ number_format(
                            $total,
                            0,
                            ',',
                            ' '
                        ) }}
                        Ar
                    </strong>

                </div>


                <a
                    href="{{ route(
                        'client.cart.index'
                    ) }}"
                    class="back-cart"
                >
                    ← Modifier mon panier
                </a>

            </aside>

        </div>

    </div>

</x-auth-layout>