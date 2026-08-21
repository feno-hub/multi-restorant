<x-vendeur-layout>
    @php
        $path = '/storage/';
    @endphp

    <div class="dashboard-restaurant">

        <!-- ===== HEADER ===== -->
        <header class="dashboard-restaurant-header">
            <div class="header-left">
                @if (Auth::user()->resto)
                    <h1 class="restaurant-name">
                        @if (Auth::user()->resto->logo == "")
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
                    <x-btnsecondary-layout type="submit" icon="fa-solid fa-arrow-right-from-bracket" btn="Déconnexion" />
                </form>
            </div>
        </header>

        <!-- ===== STATS ===== -->
        <div class="dashboard-restaurant-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Commandes (jour)</span>
                    <span class="stat-icon orange"><i class="fas fa-shopping-bag"></i></span>
                </div>
                <div class="stat-value">156</div>
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
                    <span class="stat-label">Note moyenne</span>
                    <span class="stat-icon blue"><i class="fas fa-star"></i></span>
                </div>
                <div class="stat-value">4.8</div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +0.2</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Plats en stock</span>
                    <span class="stat-icon purple"><i class="fas fa-box"></i></span>
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

        <!-- ===== GRID PRINCIPAL ===== -->
        <div class="dashboard-restaurant-grid">

            <!-- ===== COMMANDES RÉCENTES ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-receipt"></i>
                        Commandes récentes
                    </h3>
                    <a href="{{ route('vendeur.orders') }}" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#ORD-432</div>
                        <div class="order-meta">
                            <span><i class="fas fa-user"></i> Marie D.</span>
                            <span><i class="fas fa-clock"></i> 12 min</span>
                        </div>
                    </div>
                    <span class="order-status preparing">En préparation</span>
                    <span class="order-amount">32,50 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#ORD-429</div>
                        <div class="order-meta">
                            <span><i class="fas fa-user"></i> Thomas M.</span>
                            <span><i class="fas fa-clock"></i> 27 min</span>
                        </div>
                    </div>
                    <span class="order-status pending">En attente</span>
                    <span class="order-amount">58,20 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#ORD-425</div>
                        <div class="order-meta">
                            <span><i class="fas fa-user"></i> Sophie B.</span>
                            <span><i class="fas fa-clock"></i> 1h</span>
                        </div>
                    </div>
                    <span class="order-status delivered">Livrée</span>
                    <span class="order-amount">24,90 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-number">#ORD-422</div>
                        <div class="order-meta">
                            <span><i class="fas fa-user"></i> Lucas P.</span>
                            <span><i class="fas fa-clock"></i> 1h22</span>
                        </div>
                    </div>
                    <span class="order-status cancelled">Annulée</span>
                    <span class="order-amount">41,30 €</span>
                </div>
            </div>

            <!-- ===== ACTIVITÉ RÉCENTE ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Activité récente
                    </h3>
                    <a href="#" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
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

        <!-- ===== BOTTOM GRID ===== -->
        <div class="dashboard-restaurant-bottom">

            <!-- ===== GRAPHIQUE COMMANDES ===== -->
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

            <!-- ===== AVIS RÉCENTS ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-star"></i>
                        Derniers avis
                    </h3>
                    <a href="#" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>

                @if ($notices)
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

        <!-- ===== STOCK ===== -->
        <section class="dashboard-restaurant-stock">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-boxes"></i>
                        État du stock
                    </h3>
                    <a href="#" class="card-link">Gérer <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="stock-grid">
                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Pâtes fraîches</div>
                            <div class="stock-quantity">8 kg</div>
                        </div>
                        <span class="stock-status low"></span>
                    </div>

                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Sauce tomate</div>
                            <div class="stock-quantity">12 L</div>
                        </div>
                        <span class="stock-status medium"></span>
                    </div>

                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Mozzarella</div>
                            <div class="stock-quantity">5 kg</div>
                        </div>
                        <span class="stock-status low"></span>
                    </div>

                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Huile d'olive</div>
                            <div class="stock-quantity">18 L</div>
                        </div>
                        <span class="stock-status high"></span>
                    </div>

                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Farine</div>
                            <div class="stock-quantity">25 kg</div>
                        </div>
                        <span class="stock-status high"></span>
                    </div>

                    <div class="stock-item">
                        <div class="stock-info">
                            <div class="stock-name">Basilic frais</div>
                            <div class="stock-quantity">2 kg</div>
                        </div>
                        <span class="stock-status low"></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== ACTIONS RAPIDES ===== -->
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
                        <span>Nouveau plat</span>
                    </a>
                    <a href="{{ route('vendeur.menu.edit') }}" class="quick-btn">
                        <i class="fas fa-edit"></i>
                        <span>Modifier le menu</span>
                    </a>
                    <a href="#" class="quick-btn">
                        <i class="fas fa-sync-alt"></i>
                        <span>Mettre à jour le stock</span>
                    </a>
                    <a href="#" class="quick-btn">
                        <i class="fas fa-chart-line"></i>
                        <span>Voir les rapports</span>
                    </a>
                </div>
            </div>
        </section>

    </div>

</x-vendeur-layout>
