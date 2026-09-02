<x-vendeur-layout>

    <div class="order-detail">

        <div class="detail-header">
            <div>
                <a href="{{ route('vendeur.orders') }}" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour aux commandes
                </a>

                <div class="title-content">
                    <div>
                        <span>Commande</span>
                        <h1>#{{ $order->id }}</h1>
                    </div>

                    @php
                        $statusLabels = [
                            'pending' => 'En attente',
                            'processing' => 'En préparation',
                            'completed' => 'Terminée',
                            'cancelled' => 'Annulée',
                        ];
                    @endphp

                    <span class="status status-{{ $order->status }}">
                        <span class="status-dot"></span>
                        {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                    </span>
                </div>

                <p>
                    Commandée le {{ $order->created_at->format('d/m/Y à H:i') }}
                </p>
            </div>
        </div>


        <div class="detail-grid">

            <div class="detail-main">

                <div class="detail-card">

                    <div class="card-title">
                        <div>
                            <i class="fa-solid fa-bag-shopping"></i>
                            <h2>Articles commandés</h2>
                        </div>

                        <span>
                            {{ $order->items->count() }}
                            article{{ $order->items->count() > 1 ? 's' : '' }}
                        </span>
                    </div>

                    <div class="items-list">

                        @foreach ($order->items as $item)
                            @php
                                $subtotal = $item->subtotal ?? $item->price * $item->quantity;
                            @endphp

                            <div class="order-item">

                                <div class="item-info">

                                    <div class="item-image">
                                        @if (isset($item->plat) && $item->plat?->image)
                                            <img src="{{ asset('storage/' . $item->plat->image) }}"
                                                alt="{{ $item->plat->name }}">
                                        @else
                                            <i class="fa-solid fa-utensils"></i>
                                        @endif
                                    </div>

                                    <div>
                                        <h3>
                                            {{ $item->plat->name ?? 'Plat supprimé' }}
                                        </h3>

                                        <p>
                                            {{ number_format($item->price, 0, ',', ' ') }} Ar
                                            × {{ $item->quantity }}
                                        </p>
                                    </div>

                                </div>

                                <strong class="item-subtotal">
                                    {{ number_format($subtotal, 0, ',', ' ') }} Ar
                                </strong>

                            </div>
                        @endforeach

                    </div>

                    <div class="order-summary">

                        @php
                            $total = $order->total ?? $order->items->sum('subtotal');
                        @endphp

                        <div>
                            <span>Sous-total</span>
                            <strong>
                                {{ number_format($total, 0, ',', ' ') }} Ar
                            </strong>
                        </div>

                        <div class="summary-total">
                            <span>Total</span>
                            <strong>
                                {{ number_format($total, 0, ',', ' ') }} Ar
                            </strong>
                        </div>

                    </div>

                </div>


                <div class="detail-card">

                    <div class="card-title">
                        <div>
                            <i class="fa-solid fa-location-dot"></i>
                            <h2>Informations de livraison</h2>
                        </div>
                    </div>

                    <div class="delivery-info">

                        <div class="info-row">
                            <span>Nom</span>
                            <strong>
                                {{ $order->user->name ?? 'Non renseigné' }}
                            </strong>
                        </div>

                        <div class="info-row">
                            <span>Email</span>
                            <strong>
                                {{ $order->user->email ?? 'Non renseigné' }}
                            </strong>
                        </div>

                        @if (isset($order->address))
                            <div class="info-row">
                                <span>Adresse</span>
                                <strong>
                                    {{ $order->address }}
                                </strong>
                            </div>
                        @endif

                        @if (isset($order->phone))
                            <div class="info-row">
                                <span>Téléphone</span>
                                <strong>
                                    {{ $order->phone }}
                                </strong>
                            </div>
                        @endif

                    </div>

                </div>

            </div>


            <aside class="detail-sidebar">

                <div class="detail-card">

                    <div class="card-title">
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <h2>Client</h2>
                        </div>
                    </div>

                    <div class="customer-profile">

                        <div class="customer-avatar">
                            {{ strtoupper(substr($order->user->name ?? 'C', 0, 1)) }}
                        </div>

                        <div>
                            <h3>
                                {{ $order->user->name ?? 'Client inconnu' }}
                            </h3>

                            <p>
                                {{ $order->user->email ?? '' }}
                            </p>
                        </div>

                    </div>

                </div>


                <div class="detail-card">

                    <div class="card-title">
                        <div>
                            <i class="fa-solid fa-clock"></i>
                            <h2>Statut</h2>
                        </div>
                    </div>

                    <div class="status-box">

                        <span class="status status-{{ $order->status }}">
                            <span class="status-dot"></span>
                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                        </span>

                        <p>
                            Dernière mise à jour :
                            {{ $order->updated_at->format('d/m/Y H:i') }}
                        </p>

                    </div>

                </div>

            </aside>

        </div>

    </div>


</x-vendeur-layout>
