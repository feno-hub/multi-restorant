<x-vendeur-layout>

    @section('content')
        <div class="vendor-orders">

            <div class="orders-header">
                <div>
                    
                    <a href="{{ route('vendor.dashboard') }}">
                        <span class="page-subtitle">
                            <i class="fa-solid fa-arrow-left"></i>
                            Retour
                        </span>
                    </a>

                    <h1>Commandes</h1>
                    <p>Consultez les commandes de votre restaurant.</p>
                </div>

                <div class="orders-count">
                    <i class="fa-solid fa-receipt"></i>
                    <span>{{ $orders->count() }} commandes</span>
                </div>
            </div>

            <div class="orders-card">

                <div class="table-wrapper">

                    <table class="orders-table">

                        <thead>
                            <tr>
                                <th>Commande</th>
                                <th>Client</th>
                                <th>Articles</th>
                                <th>Total</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($orders as $order)
                                @php
                                    $total = $order->total ?? $order->items->sum('subtotal');
                                @endphp

                                <tr>

                                    <td>
                                        <span class="order-number">
                                            #{{ $order->id }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="customer">
                                            <div class="customer-avatar">
                                                {{ strtoupper(substr($order->user->name ?? 'C', 0, 1)) }}
                                            </div>

                                            <div>
                                                <strong>
                                                    {{ $order->user->name ?? 'Client inconnu' }}
                                                </strong>

                                                @if ($order->user)
                                                    <small>
                                                        {{ $order->user->email }}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        {{ $order->items->count() }}
                                        article{{ $order->items->count() > 1 ? 's' : '' }}
                                    </td>

                                    <td>
                                        <strong class="order-total">
                                            {{ number_format($total, 0, ',', ' ') }} Ar
                                        </strong>
                                    </td>

                                    <td>
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
                                    </td>

                                    <td>
                                        <div class="order-date">
                                            <strong>
                                                {{ $order->created_at->format('d/m/Y') }}
                                            </strong>
                                            <small>
                                                {{ $order->created_at->format('H:i') }}
                                            </small>
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('vendeur.orders.show', $order->id) }}" class="order-view">
                                            <i class="fa-solid fa-eye"></i>
                                            Voir
                                        </a>
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7">
                                        <div class="empty-orders">
                                            <div class="empty-icon">
                                                <i class="fa-solid fa-receipt"></i>
                                            </div>

                                            <h3>Aucune commande</h3>

                                            <p>
                                                Votre restaurant n'a pas encore reçu de commande.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="orders-pagination">
                </div>

            </div>


        </div>

    </x-vendeur-layout>
