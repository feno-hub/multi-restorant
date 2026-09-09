<x-client-layout>

    <div class="dashboard-client">

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

        <div class="dashboard-client-stats">
            <div class="stat-card">
                
                <div class="stat-header">
                    <span class="stat-label">Commandes</span>
                    <span class="stat-icon orange">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </span>
                </div>
                
                <div class="stat-value">
                    {{ Auth::user()->orders->count() }}
                </div>

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
                <div class="stat-value">
                    {{ Auth::user()->notice->count() }}
                </div>
                <div class="stat-sub">Note moyenne : 4.7 ⭐</div>
            </div>
        </div>

        <div class="dashboard-client-grid">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-receipt"></i>
                        Mes commandes
                    </h3>
                    <a href="{{ route('client.orders.index') }}" class="card-link">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                @if (!isset(Auth::user()->orders))

                    @foreach (Auth::user()->orders as $orders)
                        
                        <div class="order-item">
                            <div class="order-info">
                                <div class="order-restaurant">
                                    <i class="fas fa-store"></i> 
                                    {{ $orders->resto->name }}
                                </div>
                                <div class="order-meta">
                                    <span>
                                        <i class="fas fa-calendar"></i> 
                                        {{ ucFirst($orders->created_at) }}
                                    </span>
                                    <span>
                                        {{-- <i class="fas fa-clock"></i>
                                        12:30 --}}
                                    </span>
                                </div>
                            </div>
                            
                            @if ($orders->status == 'confirmed')
                                <span class="order-status delivered">confirmée</span>
                            @elseif ($orders->status == 'pending')
                                <span class="order-status pending">en attent</span>
                            @elseif ($orders->status == 'preparing')
                                <span class="order-status preparing">En préparation</span>
                            @elseif ($orders->status == 'delivered')
                                <span class="order-status delivered">Livrée</span>
                            @elseif ($orders->status == 'cancelled')
                                <span class="order-status cancelled">Annulée</span>
                            @endif
                            
                            <span class="text-blue-950 font-medium">
                                {{ $orders->total }} Ar
                            </span>
                        </div>

                    @endforeach

                @else 

                    <h1 class="text-center font-bold text-red-800">
                        Pas de commande fait
                    </h1>

                @endif

            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-heart"></i>
                        Mes favoris
                    </h3>
                    <a href="{{ route('client.favorites') }}" class="card-link">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
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
                    <a href="" class="card-link">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Activité récente
                    </h3>
                    <a href="{{ route('client.activities') }}" class="card-link">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

                @if (Auth::user()->activities)

                    @foreach (Auth::user()->activities as $activites)
                        <div class="activity-item">
                            <span class="activity-icon order"><i class="fas fa-shopping-bag"></i></span>
                            <div class="activity-content">
                                <div class="activity-text">
                                    <strong>
                                        {{ $activites->content }}
                                    </strong> 
                                    {{ $activites->title }}
                                </div>
                                <div class="text-[10px] font-bold text-blue-950">
                                    Il y a {{ $activites->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>

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
                    <a href="{{ route('client.profil.edit', Auth::user()->id) }}" class="quick-btn">
                        <i class="fas fa-user-edit"></i>
                        <span>Modifier mon profil</span>
                    </a>
                </div>
            </div>
        </section>

    </div>
</x-client-layout>
