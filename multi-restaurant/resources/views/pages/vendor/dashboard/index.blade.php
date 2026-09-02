<x-vendeur-layout>
    @php
        $path = '/storage/';
    @endphp

    <div class="dashboard-restaurant">

        <header class="dashboard-restaurant-header">
            <div class="header-left">
                @if (Auth::user()->resto)
                    <h1 class="restaurant-name">
                        @if (Auth::user()->resto->logo == '')
                            <div class="restaurant-name-logo">
                                <h1>
                                    {{ Auth::user()->resto->name[0] }}{{ Auth::user()->resto->name[1] }}
                                </h1>
                            </div>
                        @else
                            <div class="restaurant-name-logo">
                                <img src="{{ $path . Auth::user()->resto->logo }}" alt="">
                            </div>
                        @endif
                        {{ Auth::user()->resto->name }}
                    </h1>
                    <div class="restaurant-subtitle">
                        <span>
                            <i class="fas fa-map-pin"></i>
                            {{ Auth::user()->resto->address }}
                        </span>
                        <span>
                            <i class="fas fa-clock"></i>
                            {{ Auth::user()->resto->open_time }} - {{ Auth::user()->resto->close_time }}
                        </span>
                        <span>
                            <i class="fas fa-phone"></i>
                            {{ Auth::user()->resto->phone }}
                        </span>
                    </div>
                @endif
            </div>
            <div class="header-right">
                <a href="{{ route('home') }}">
                    <span class="status-badge">
                        <i class="fa-solid fa-house"></i> Acceuil
                    </span>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <x-btnsecondary-layout type="submit" icon="fa-solid fa-arrow-right-from-bracket"
                        btn="Déconnexion" />
                </form>
            </div>
        </header>

        <div class="dashboard-restaurant-stats">
            <div class="stat-card">

                <div class="stat-header">
                    <span class="stat-label">Commandes</span>
                    <span class="stat-icon orange">
                        <i class="fas fa-shopping-bag"></i>
                    </span>
                </div>

                <div class="stat-value">
                    {{ Auth::user()->resto->order->count() }}
                </div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +12%</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Chiffre d'affaires</span>
                    <span class="stat-icon green"><i class="fas fa-euro-sign"></i></span>
                </div>
                <div class="stat-value">4 280 €</div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +8%</span>
            </div>

            <div class="stat-card">

                <div class="stat-header">
                    <span class="stat-label">Suivie</span>
                    <span class="stat-icon blue">
                        <i class="fas fa-star"></i>
                    </span>
                </div>

                <div class="stat-value">
                    15
                </div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +0.2</span>

            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Plats en stock</span>
                    <span class="stat-icon purple">
                        <i class="fas fa-box"></i>
                    </span>
                </div>

                <div class="stat-value">342</div>
                <span class="stat-change down"><i class="fas fa-arrow-down"></i> -5%</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Clients fidèles</span>
                    <span class="stat-icon red"><i class="fas fa-users"></i></span>
                </div>
                <div class="stat-value">1 432</div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +3%</span>
            </div>
        </div>

        <div class="dashboard-restaurant-grid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-receipt"></i>
                        Commandes récentes
                    </h3>
                    <a href="{{ route('vendeur.orders') }}" class="card-link">Voir tout <i
                            class="fas fa-arrow-right"></i></a>
                </div>

                @foreach (Auth::user()->resto->order as $orders)
                    <div class="order-item">
                        <div class="order-info">
                            <div class="order-number">
                                {{ $orders->order_number }}
                            </div>
                            <div class="order-meta">
                                <span>
                                    <i class="fas fa-user"></i> 
                                    {{ $orders->user->name }} {{ $orders->user->last_name[0] }}.
                                </span>
                                <span>
                                    <i class="fas fa-clock"></i> 
                                    {{ $orders->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                        @if ($orders->status == 'pending')
                            <span class="order-status pending">En attente</span>
                            
                        @elseif ($orders->status == 'preparing')
                            <span class="order-status preparing">En préparation</span>
                        
                        @elseif ($orders->status == 'delivered')
                            <span class="order-status delivered">Livrée</span>

                        @elseif ($orders->status == 'cancelled')
                            <span class="order-status cancelled">Annulée</span>

                        @elseif ($orders->status == 'confirmed')
                            <span class="order-status delivered">Payée</span>

                        @endif

                        <span class="order-amount">
                            {{-- {{ number_format($orders->items->subtotal, 0, ',', ' ') }} Ar --}}
                        </span>
                    </div>
                @endforeach

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Gérer la résérvation
                    </h3>
                    <a href="#" class="card-link">
                        Gérer
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="activity-item">
                    <span class="activity-icon order"><i class="fas fa-shopping-bag"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouvelle commande</strong> #ORD-435
                        </div>
                        <div class="activity-time">Il y a 5 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon review"><i class="fas fa-star"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouvel avis</strong> 5 ⭐ de Marie D.
                        </div>
                        <div class="activity-time">Il y a 12 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon user"><i class="fas fa-user-plus"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouveau client</strong> Jean P. s'est inscrit
                        </div>
                        <div class="activity-time">Il y a 28 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon warning"><i class="fas fa-exclamation-triangle"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Stock critique</strong> Pâtes fraîches
                        </div>
                        <div class="activity-time">Il y a 1h</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-restaurant-bottom">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar"></i>
                        Commandes (7 jours)
                    </h3>
                    <span class="chart-trend"><i class="fas fa-arrow-up"></i> +18%</span>
                </div>
                <div class="chart-container">
                    <div class="chart-header">
                        <span class="chart-title">Évolution des commandes</span>
                    </div>
                    <div class="chart-bars">
                        <div class="bar-wrapper">
                            <div class="bar bar-1"></div>
                            <span class="bar-label">Lun</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-2"></div>
                            <span class="bar-label">Mar</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-3"></div>
                            <span class="bar-label">Mer</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-4"></div>
                            <span class="bar-label">Jeu</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-5"></div>
                            <span class="bar-label">Ven</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-6"></div>
                            <span class="bar-label">Sam</span>
                        </div>
                        <div class="bar-wrapper">
                            <div class="bar bar-7"></div>
                            <span class="bar-label">Dim</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-star"></i>
                        Derniers avis
                    </h3>
                    <a href="#" class="card-link">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                @if (!isset($notices))
                    <h2 style="color: red;text-align:center;">
                        Pas de commantaire
                    </h2>
                @else
                    @foreach ($notices as $notice)
                        <div class="review-item">
                            <div class="review-avatar">
                                {{ $notice->user->name[0] }}{{ $notice->user->last_name[0] }}
                            </div>
                            <div class="review-content">
                                <div class="review-name">
                                    {{ $notice->user->name }} {{ $notice->user->last_name[0] }}.
                                    <span class="review-rating">★★★★★</span>
                                </div>
                                <div class="review-text">
                                    "{{ $notice->content }}"
                                </div>
                                <div class="review-time">Il y a {{ $notice->created_at->diffForHumans() }} </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>

        <section class="dashboard-restaurant-stock">
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        <i class="fas fa-boxes"></i>
                        Liste des menues
                    </h3>

                    <a href="{{ route('vendeur.menu.list') }}" class="card-link">
                        Gérer
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

                <div class="stock-grid">
                    @foreach ($menus as $menu)
                        <div class="stock-item">

                            <div class="stock-info">
                                <div class="stock-name">
                                    {{ $menu->name }}
                                </div>
                                <div class="stock-quantity">
                                    {{ $menu->plat->count() }} plats
                                </div>
                            </div>

                            @if ($menu->plat->count() <= 3)
                                <span class="stock-status low"></span>
                            @else
                                <span class="stock-status medium"></span>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section style="margin-top: 28px;">
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Actions rapides
                    </h3>

                </div>

                <div class="quick-actions">

                    <a href="{{ route('vendeur.plat.insert') }}" class="quick-btn">
                        <i class="fas fa-plus-circle"></i>
                        <span>
                            Nouveau plat
                        </span>
                    </a>

                    @if (Auth::user()->menu)
                        <a href="{{ route('vendeur.menu.edit') }}" class="quick-btn">
                            <i class="fas fa-edit"></i>
                            <span>
                                Modifier le menu
                            </span>
                        </a>
                    @else
                        <a href="{{ route('vendeur.menu.create') }}" class="quick-btn">
                            <i class="fas fa-edit"></i>
                            <span>
                                Ajouter un menu
                            </span>
                        </a>
                    @endif

                    <a href="" class="quick-btn">
                        <i class="fas fa-sync-alt"></i>
                        <span>
                            Mettre à jour le stock
                        </span>
                    </a>

                    <a href="" class="quick-btn">
                        <i class="fas fa-chart-line"></i>
                        <span>
                            Compléter l' information
                        </span>
                    </a>

                </div>

            </div>
        </section>

    </div>

</x-vendeur-layout>
