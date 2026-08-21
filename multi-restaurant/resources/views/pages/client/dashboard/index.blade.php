<x-client-layout>
    <div class="dashboard-client">

        <!-- ===== HEADER ===== -->
        <header class="dashboard-client-header">
            <a href="{{ route('client.profil.index') }}">
                <div class="client-avatar">
                    {{ ucfirst(Auth::user()->name)['0'] }}
                    {{ ucfirst(Auth::user()->last_name)['0'] }}
                </div>
            </a>
            <div class="client-info">
                <h1 class="client-name">
                    {{ Auth::user()->name }}
                    {{ ucfirst(Auth::user()->last_name)['0'] }}
                </h1>
                <div class="client-email">
                    <i class="fas fa-envelope"></i>
                    {{ Auth::user()->email }}
                </div>
                <div class="client-since">
                    Membre depuis 
                    <strong>
                        {{ Auth::user()->created_at->day }}-{{ Auth::user()->created_at->month }}-{{ Auth::user()->created_at->year }}
                    </strong>
                </div>
            </div>
            <div class="header-right">
                <a href="{{ route('home') }}" class="notification-btn">
                    <i class="fa-solid fa-house"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <x-btnsecondary-layout type="submit" icon="fa-solid fa-arrow-right-from-bracket" btn="Déconnexion" />
                </form>
            </div>
        </header>

        <x-success-layout key="success" />

        <!-- ===== STATS ===== -->
        <div class="dashboard-client-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Commandes</span>
                    <span class="stat-icon orange">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </span>
                </div>
                <div class="stat-value">24</div>
                <div class="stat-sub">Dernière commande il y a 2j</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Dépenses totales</span>
                    <span class="stat-icon green">
                        <i class="fas fa-euro-sign"></i>
                    </span>
                </div>
                <div class="stat-value">487 €</div>
                <div class="stat-sub">Moyenne : 20,30 €</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Restaurants visités</span>
                    <span class="stat-icon purple">
                        <i class="fas fa-store"></i>
                    </span>
                </div>
                <div class="stat-value">8</div>
                <div class="stat-sub">Dont 3 favoris</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Avis donnés</span>
                    <span class="stat-icon red">
                        <i class="fas fa-pen"></i>
                    </span>
                </div>
                <div class="stat-value">12</div>
                <div class="stat-sub">Note moyenne : 4.7 ⭐</div>
            </div>
        </div>

        <!-- ===== GRID PRINCIPAL ===== -->
        <div class="dashboard-client-grid">

            <!-- ===== COMMANDES RÉCENTES ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-receipt"></i>
                        Mes commandes
                    </h3>
                    <a href="{{ route('client.orders.index') }}" class="card-link">
                        <x-btnprimary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-restaurant">
                            <i class="fas fa-store"></i> 
                            La Bella Vita
                        </div>
                        <div class="order-meta">
                            <span>
                                <i class="fas fa-calendar"></i> 
                                28 juil. 2026
                            </span>
                            <span>
                                <i class="fas fa-clock"></i>
                                12:30
                            </span>
                        </div>
                    </div>
                    <span class="order-status preparing">En préparation</span>
                    <span class="order-amount">32,50 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-restaurant">
                            <i class="fas fa-store"></i> 
                            Sushi Omakase
                        </div>
                        <div class="order-meta">
                            <span>
                                <i class="fas fa-calendar"></i> 
                                26 juil. 2026
                            </span>
                            <span>
                                <i class="fas fa-clock"></i> 
                                19:15
                            </span>
                        </div>
                    </div>
                    <span class="order-status delivered">Livrée</span>
                    <span class="order-amount">58,20 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-restaurant">
                            <i class="fas fa-store"></i> 
                            El Fuego
                        </div>
                        <div class="order-meta">
                            <span>
                                <i class="fas fa-calendar"></i> 
                                24 juil. 2026
                            </span>
                            <span>
                                <i class="fas fa-clock"></i> 
                                20:00
                            </span>
                        </div>
                    </div>
                    <span class="order-status pending">En attente</span>
                    <span class="order-amount">24,90 €</span>
                </div>

                <div class="order-item">
                    <div class="order-info">
                        <div class="order-restaurant">
                            <i class="fas fa-store"></i> 
                            Burger House
                        </div>
                        <div class="order-meta">
                            <span>
                                <i class="fas fa-calendar"></i> 
                                22 juil. 2026
                            </span>
                            <span>
                                <i class="fas fa-clock"></i> 
                                13:45
                            </span>
                        </div>
                    </div>
                    <span class="order-status cancelled">Annulée</span>
                    <span class="order-amount">41,30 €</span>
                </div>
            </div>

            <!-- ===== RESTAURANTS FAVORIS ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-heart"></i>
                        Mes favoris
                    </h3>
                    <a href="{{ route('client.favorites') }}" class="card-link">
                        <x-btnprimary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                <div class="favorite-item">
                    <div class="favorite-info">
                        <div class="favorite-avatar color-1">🍕</div>
                        <div class="favorite-detail">
                            <div class="favorite-name">La Bella Vita</div>
                            <div class="favorite-cuisine">Italienne · Paris 11e</div>
                        </div>
                    </div>
                    <div class="favorite-rating">
                        <i class="fas fa-star"></i> 4.8 <span>(230)</span>
                    </div>
                </div>

                <div class="favorite-item">
                    <div class="favorite-info">
                        <div class="favorite-avatar color-2">🍣</div>
                        <div class="favorite-detail">
                            <div class="favorite-name">Sushi Omakase</div>
                            <div class="favorite-cuisine">Japonaise · Lyon 2e</div>
                        </div>
                    </div>
                    <div class="favorite-rating">
                        <i class="fas fa-star"></i> 4.9 <span>(320)</span>
                    </div>
                </div>

                <div class="favorite-item">
                    <div class="favorite-info">
                        <div class="favorite-avatar color-3">🌮</div>
                        <div class="favorite-detail">
                            <div class="favorite-name">El Fuego</div>
                            <div class="favorite-cuisine">Mexicaine · Bordeaux</div>
                        </div>
                    </div>
                    <div class="favorite-rating">
                        <i class="fas fa-star"></i> 4.7 <span>(180)</span>
                    </div>
                </div>

                <div class="favorite-item">
                    <div class="favorite-info">
                        <div class="favorite-avatar color-4">🍝</div>
                        
                        <div class="favorite-detail">
                            <div class="favorite-name">Trattoria Roma</div>
                            <div class="favorite-cuisine">Italienne · Marseille</div>
                        </div>
                    </div>
                    <div class="favorite-rating">
                        <i class="fas fa-star"></i> 4.6 <span>(210)</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- ===== BOTTOM GRID ===== -->
        <div class="dashboard-client-bottom">

            <!-- ===== PROMOTIONS ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        Mes offres
                    </h3>
                    <a href="#" class="card-link">
                        <x-btnprimary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                <div class="promo-item">
                    <div class="promo-desc">
                        <strong>20% de réduction</strong> sur votre prochaine commande
                    </div>
                    <div class="promo-code">BIENVENUE20</div>
                    <div class="promo-expiry">
                        <i class="far fa-clock"></i> Valable jusqu'au 15 août 2026
                    </div>
                </div>

                <div class="promo-item secondary">
                    <div class="promo-desc">
                        <strong>Livraison offerte</strong> dès 30€ d'achat
                    </div>
                    <div class="promo-code">LIVRAISONFREE</div>
                    <div class="promo-expiry">
                        <i class="far fa-clock"></i> Valable jusqu'au 31 août 2026
                    </div>
                </div>

                <div class="promo-item green">
                    <div class="promo-desc">
                        <strong>1 plat offert</strong> pour 5 commandes
                    </div>
                    <div class="promo-code">FIDELITE5</div>
                    <div class="promo-expiry">
                        <i class="far fa-clock"></i> Valable jusqu'au 31 déc. 2026
                    </div>
                </div>
            </div>

            <!-- ===== ACTIVITÉ RÉCENTE ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Activité récente
                    </h3>
                    <a href="{{ route('client.activities') }}" class="card-link">
                        <x-btnprimary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                <div class="activity-item">
                    <span class="activity-icon order"><i class="fas fa-shopping-bag"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Commande passée</strong> chez La Bella Vita
                        </div>
                        <div class="activity-time">Il y a 2h</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon review"><i class="fas fa-star"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            Vous avez laissé un avis <strong>5 ⭐</strong> pour Sushi Omakase
                        </div>
                        <div class="activity-time">Il y a 1j</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon favorite"><i class="fas fa-heart"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            Vous avez ajouté <strong>El Fuego</strong> à vos favoris
                        </div>
                        <div class="activity-time">Il y a 3j</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon promo"><i class="fas fa-tag"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            Nouvelle offre : <strong>20% de réduction</strong> disponible
                        </div>
                        <div class="activity-time">Il y a 5j</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ===== ACTIONS RAPIDES ===== -->
        <section style="margin-top: 28px; margin-bottom: 20px;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Actions rapides
                    </h3>
                </div>
                <div class="quick-actions">
                    <a href="{{ route('client.resto.list') }}" class="quick-btn">
                        <i class="fas fa-search"></i>
                        <span>Explorer les restaurants</span>
                    </a>
                    <a href="{{ route('client.orders.index') }}" class="quick-btn">
                        <i class="fas fa-history"></i>
                        <span>Historique des commandes</span>
                    </a>
                    <a href="{{ route('client.createResto') }}" class="quick-btn">
                        <i class="fas fa-heart"></i>
                        <span>Crer un restaurant</span>
                    </a>
                    <a href="#" class="quick-btn">
                        <i class="fas fa-user-edit"></i>
                        <span>Modifier mon profil</span>
                    </a>
                </div>
            </div>
        </section>

    </div>
</x-client-layout>
