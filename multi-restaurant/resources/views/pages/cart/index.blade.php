<x-auth-layout>

    <div class="client-cart">

        <div class="cart-header">

            <div>
                <span class="cart-label">
                    MON PANIER
                </span>

                <h1>
                    Votre panier
                </h1>

                <p>
                    Retrouvez ici les plats que vous souhaitez commander.
                </p>
            </div>

            <a href="{{ route('menu.index') }}" class="btn-back">
                ← Continuer mes achats
            </a>

        </div>



        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif



        @if (!$cart || $cart->items->isEmpty())

            <div class="empty-cart">

                <div class="empty-icon">
                    🛒
                </div>

                <h2>
                    Votre panier est vide
                </h2>

                <p>
                    Ajoutez des plats pour commencer votre commande.
                </p>

                <a href="{{ route('resto.list') }}" class="btn-primary">
                    Découvrir les restaurants
                </a>

            </div>
        @else
            @php

                $total = $cart->items->sum(fn($item) => $item->price * $item->quantity);

                $restaurant = $cart->items->first()->plat->menu->resto;

            @endphp


            <div class="cart-layout">


                <div class="cart-items">

                    <div class="restaurant-info">

                        <div>

                            <small>
                                RESTAURANT
                            </small>

                            <h2>
                                {{ $restaurant?->name ?? 'Restaurant inconnu' }}
                            </h2>

                        </div>

                        <span>
                            {{ $cart->items->sum('quantity') }}
                            article(s)
                        </span>

                    </div>


                    @foreach ($cart->items as $item)
                        <div class="cart-item">

                            {{-- IMAGE --}}

                            <div class="item-image">

                                @if ($item->plat->image)
                                    <img src="{{ asset('storage/' . $item->plat->image) }}"
                                        alt="{{ $item->plat->name }}">
                                @else
                                    <div class="image-placeholder">
                                        🍽️
                                    </div>
                                @endif

                            </div>


                            {{-- INFORMATIONS --}}

                            <div class="item-content">

                                <h3>
                                    {{ $item->plat->name }}
                                </h3>

                                <p>
                                    {{ Str::limit($item->plat->description, 100) }}
                                </p>

                                <strong>
                                    {{ number_format($item->price, 0, ',', ' ') }}
                                    Ar
                                </strong>

                            </div>


                            {{-- QUANTITE --}}

                            <div class="item-actions">

                                <form
                                    action="{{ route('client.cart.update', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <div class="quantity">

                                        <input type="number" name="quantity" value="{{ $item->quantity }}"
                                            min="1" max="20">

                                    </div>

                                    <button type="submit" class="update-btn">
                                        Modifier
                                    </button>

                                </form>


                                <form
                                    action="{{ route('client.cart.remove', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="delete-btn">
                                        Supprimer
                                    </button>

                                </form>

                            </div>


                            {{-- TOTAL ARTICLE --}}

                            <div class="item-total">

                                {{ number_format($item->price * $item->quantity, 0, ',', ' ') }}

                                Ar

                            </div>

                        </div>
                    @endforeach


                    {{-- VIDER --}}

                    <form action="{{ route('client.cart.clear') }}" method="POST" class="clear-cart-form">

                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            Vider le panier
                        </button>

                    </form>

                </div>


                {{-- RESUME --}}

                <aside class="cart-summary">

                    <h2>
                        Résumé
                    </h2>

                    <div class="summary-row">

                        <span>
                            Articles
                        </span>

                        <span>
                            {{ $cart->items->sum('quantity') }}
                        </span>

                    </div>


                    <div class="summary-row">

                        <span>
                            Sous-total
                        </span>

                        <span>
                            {{ number_format($total, 0, ',', ' ') }}
                            Ar
                        </span>

                    </div>


                    <div class="summary-row">

                        <span>
                            Livraison
                        </span>

                        <span>
                            0 Ar
                        </span>

                    </div>


                    <div class="summary-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            {{ number_format($total, 0, ',', ' ') }}
                            Ar
                        </strong>

                    </div>


                    <a href="{{ route('client.orders.checkout') }}"
                        class="checkout-btn">
                        Passer la commande →
                    </a>

                </aside>

            </div>

        @endif

    </div>

</x-auth-layout>
