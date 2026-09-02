<x-auth-layout>

    <div class="order-show">

        <div class="order-header">

            <div>

                <span>
                    COMMANDE #{{ $order->order_number }}
                </span>

                <h1>
                    Détail de votre commande
                </h1>

                <p>
                    Votre commande a bien été enregistrée.
                </p>

            </div>

            <div class="">

                <a href="{{ url('/') }}" class="btn-back">
                    ← Accueil
                </a>

                <a href="{{ route('client.payment.order', $order) }}" class="multi-button-secondary" style="background: green; color:white;">
                    Payer la commande
                </a>
            </div>

        </div>


        <x-success-layout key="success" />

        <div class="order-layout">

            <div class="order-content">

                <div class="order-card">

                    <div class="card-title">

                        <h2>
                            Articles commandés
                        </h2>

                        <span class="status
                            status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>

                    </div>


                    @foreach ($order->items as $item)
                        <div class="order-item">

                            <div class="order-item-image">

                                @if ($item->plat->image)
                                    <img src="{{ asset('storage/' . $item->plat->image) }}"
                                        alt="{{ $item->plat_name }}">
                                @else
                                    <span>
                                        🍽️
                                    </span>
                                @endif

                            </div>


                            <div class="order-item-info">

                                <h3>
                                    {{ $item->plat_name }}
                                </h3>

                                <p>
                                    Quantité :
                                    {{ $item->quantity }}
                                </p>

                                <p>
                                    Prix :
                                    {{ number_format($item->price, 0, ',', ' ') }}
                                    Ar
                                </p>

                            </div>


                            <strong>

                                {{ number_format($item->subtotal, 0, ',', ' ') }}

                                Ar

                            </strong>

                        </div>
                    @endforeach


                    <div class="order-total">

                        <span>
                            Sous-total
                        </span>

                        <strong>
                            {{ number_format($order->subtotal, 0, ',', ' ') }}
                            Ar
                        </strong>

                    </div>


                    <div class="order-total">

                        <span>
                            Livraison
                        </span>

                        <strong>
                            {{ number_format($order->delivery_fee, 0, ',', ' ') }}
                            Ar
                        </strong>

                    </div>


                    <div class="order-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            {{ number_format($order->total, 0, ',', ' ') }}
                            Ar
                        </strong>

                    </div>

                </div>


                @if ($order->note)
                    <div class="order-card">

                        <h2>
                            Votre note
                        </h2>

                        <p>
                            {{ $order->note }}
                        </p>

                    </div>
                @endif

            </div>



            <aside class="order-sidebar">

                <div class="restaurant-card">

                    <small>
                        RESTAURANT
                    </small>

                    <h2>
                        {{ $order->resto->name }}
                    </h2>

                    @if ($order->resto->address)
                        <p>
                            {{ $order->resto->address }}
                        </p>
                    @endif

                </div>


                <div class="payment-card">

                    <h3>
                        État de la commande
                    </h3>

                    <p>
                        {{ ucfirst($order->status) }}
                    </p>

                </div>


                <div class="payment-card">

                    <h3>
                        Date
                    </h3>

                    <p>
                        {{ $order->created_at->format('d/m/Y à H:i') }}
                    </p>

                </div>

            </aside>

        </div>

    </div>

</x-auth-layout>
