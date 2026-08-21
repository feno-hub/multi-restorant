<x-app-layout>

    <section class="cart">

        <!-- Header -->

        <div class="cart-header">

            <div>

                <h1>Mon panier</h1>

                <p>
                    Vérifiez votre commande avant de confirmer votre achat.
                </p>

            </div>

        </div>

        {{-- @if ($cartItems->count()) --}}

        <div class="cart-content">

            <!-- Produits -->

            <div class="cart-products">

                {{-- @foreach ($cartItems as $item) --}}
                <div class="cart-item">

                    <div class="cart-item-image">

                        <img src="{{ asset('assets/images/fonts/new1.png') }}" alt="">

                    </div>

                    <div class="cart-item-info">

                        <h3>pizza</h3>

                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit, quos?</p>

                        <span class="price">
                            150000 ar
                            {{-- {{ number_format($item->price, 0, ',', ' ') }} Ar --}}

                        </span>

                    </div>

                    <div class="cart-item-quantity">

                        <button>-</button>
                        {{-- <input type="number" value="{{ $item->quantity }}"> --}}
                        <input type="number" value="">
                        <button>+</button>

                    </div>

                    <div class="cart-item-total">

                        150000 ar
                        {{-- {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar --}}

                    </div>

                    <div class="cart-item-delete">

                        <form>

                            <button>

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </form>

                    </div>

                </div>
                {{-- @endforeach --}}

            </div>

            <!-- Résumé -->

            <div class="cart-summary">

                <h2>Résumé</h2>

                <div class="summary-row">

                    <span>Sous-total</span>

                    <span>
                        700000
                        {{-- {{ number_format($subtotal, 0, ',', ' ') }}  --}}
                        Ar
                    </span>

                </div>

                <div class="summary-row">

                    <span>Livraison</span>

                    <span>
                        800000
                        {{-- {{ number_format($delivery, 0, ',', ' ') }} --}}
                        Ar
                    </span>

                </div>

                <div class="summary-total">

                    <span>Total</span>

                    <span>
                        {{-- {{ number_format($total, 0, ',', ' ') }} --}}
                        1000000 Ar
                    </span>

                </div>

                <a href="" class="btn-checkout">

                    Passer la commande

                </a>

            </div>

        </div>
    {{-- @else --}}

        <div class="cart-empty">

            <i class="fa-solid fa-cart-shopping"></i>

            <h2>Votre panier est vide</h2>

            <p>

                Découvrez nos restaurants et ajoutez vos plats préférés.

            </p>

            <a href="{{ route('resto.list') }}" class="btn-shopping">

                Voir les restaurants

            </a>

        </div>

        {{-- @endif --}}

    </section>

</x-app-layout>
