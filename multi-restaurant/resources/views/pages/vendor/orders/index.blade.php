
<x-vendeur-layout>

    <section class="orders-page">

        <!-- ===== TITRE ===== -->
        <div class="orders-page-header">
            <div>
                <h2>Gestion des commandes</h2>
                <p>Consultez et gérez les commandes de vos clients en temps réel.</p>
            </div>

            <a href="#" class="btn-refresh">
                <i class="fa-solid fa-rotate-right"></i>
                Actualiser
            </a>
        </div>

        <!-- ===== STATISTIQUES ===== -->
        <div class="orders-stats">

            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">En attente</span>
                    <strong class="stat-value">12</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon progress">
                    <i class="fa-solid fa-fire-burner"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">En préparation</span>
                    <strong class="stat-value">8</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon ready">
                    <i class="fa-solid fa-bell-concierge"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Prêtes</span>
                    <strong class="stat-value">5</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon completed">
                    <i class="fa-solid fa-circle-check"></i>
                </div>
                <div class="stat-content">
                    <span class="stat-label">Terminées</span>
                    <strong class="stat-value">34</strong>
                </div>
            </div>

        </div>

        <!-- ===== FILTRES ===== -->
        <div class="orders-filters">

            <div class="filter-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Rechercher une commande...">
            </div>

            <select>
                <option>Tous les statuts</option>
                <option>En attente</option>
                <option>En préparation</option>
                <option>Prête</option>
                <option>Terminée</option>
                <option>Annulée</option>
            </select>

        </div>

        <!-- ===== TABLEAU ===== -->
        <div class="orders-table-wrapper">

            <table class="orders-table">

                <thead>
                    <tr>
                        <th>Commande</th>
                        <th>Client</th>
                        <th>Plats</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>
                            <div class="order-id">
                                <strong>#CMD-001</strong>
                            </div>
                        </td>

                        <td>
                            <div class="client-info">
                                <span class="client-name">Jean Rakoto</span>
                                <small>+261 34 00 000 00</small>
                            </div>
                        </td>

                        <td>
                            <div class="order-items">
                                Pizza + Boisson
                            </div>
                        </td>

                        <td>
                            <strong>35 000 Ar</strong>
                        </td>

                        <td>
                            03/08/2026
                        </td>

                        <td>
                            <span class="status pending">
                                En attente
                            </span>
                        </td>

                        <td>
                            <div class="actions">
                                <button class="btn-action accept">
                                    <i class="fa-solid fa-check"></i>
                                </button>

                                <button class="btn-action reject">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>

                                <button class="btn-action view">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>#CMD-002</strong>
                        </td>

                        <td>
                            <div class="client-info">
                                <span class="client-name">Marie Andry</span>
                                <small>+261 32 00 000 00</small>
                            </div>
                        </td>

                        <td>Burger + Frites</td>

                        <td><strong>28 000 Ar</strong></td>

                        <td>03/08/2026</td>

                        <td>
                            <span class="status progress">
                                En préparation
                            </span>
                        </td>

                        <td>
                            <div class="actions">
                                <button class="btn-action ready">
                                    <i class="fa-solid fa-bell-concierge"></i>
                                </button>

                                <button class="btn-action view">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>#CMD-003</strong>
                        </td>

                        <td>
                            <div class="client-info">
                                <span class="client-name">Paulina Rabe</span>
                                <small>+261 33 00 000 00</small>
                            </div>
                        </td>

                        <td>Poulet grillé + Riz</td>

                        <td><strong>42 000 Ar</strong></td>

                        <td>02/08/2026</td>

                        <td>
                            <span class="status completed">
                                Terminée
                            </span>
                        </td>

                        <td>
                            <div class="actions">
                                <button class="btn-action view">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </section>

</x-vendeur-layout>
```
{{-- @foreach($orders as $order)
<tr>
    <td>#{{ $order->reference }}</td>
    <td>{{ $order->client->name }}</td>
    <td>{{ $order->client->phone }}</td>
    <td>{{ number_format($order->total,0,',',' ') }} Ar</td>
    <td>
        <span class="status {{ $order->status }}">
            {{ $order->status }}
        </span>
    </td>
    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
    <td>...</td>
</tr>
@endforeach --}}
