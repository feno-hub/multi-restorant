<x-admin-layout>

    @php
        $path = '/storage/';
    @endphp

    <header class="header">
        <div class="header-left">
            <h1><i class="fas fa-chart-pie"></i>Tableau de bord</h1>
            <div class="sub">
                <i class="fas fa-circle status-dot"></i> 9 restaurants actifs
                <span class="update-badge"><i class="far fa-clock"></i> Mis à jour à l'instant</span>
            </div>
        </div>
        <div class="header-right">
            <div class="date-badge">
                <i class="far fa-calendar-alt"></i>
                <span id="date">Monday, 1 January 2026</span>
            </div>
            <div class="date-badge">
                <i class="fa-solid fa-stopwatch"></i>
                <span id="time">00:00:00</span>
            </div>
            <div class="admin-profile">
                <h1>
                    {{ Auth::user()->name[0] }}
                    {{ Auth::user()->last_name[0] }}
                </h1>
                {{-- <img src="https://ui-avatars.com/api/?name=Super+Admin&background=C0382B&color=fff&size=36"
                    alt="avatar"> --}}
                <div>
                    <div class="name">
                        {{ Auth::user()->name }}
                        {{ ucfirst(Auth::user()->last_name)['0'] }}.
                    </div>
                    <div class="role">Super Admin</div>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </header>

    <div class="dashboard-superadmin">

        <div class="dashboard-superadmin-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Restaurants</span>
                    <span class="stat-icon orange"><i class="fas fa-store"></i></span>
                </div>
                <div class="stat-value">
                    {{ $countResto }}
                </div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +2 cette semaine</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Messages</span>
                    <span class="stat-icon blue"><i class="fas fa-shopping-bag"></i></span>
                </div>
                <div class="stat-value">1 284</div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +12%</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Chiffre d'affaires</span>
                    <span class="stat-icon green"><i class="fas fa-euro-sign"></i></span>
                </div>
                <div class="stat-value">42 800 €</div>
                <span class="stat-change up"><i class="fas fa-arrow-up"></i> +8%</span>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Utilisateurs</span>
                    <span class="stat-icon pink"><i class="fas fa-users"></i></span>
                </div>
                <div class="stat-value">
                    {{ $countUser }}
                </div>
                <span class="stat-change down"><i class="fas fa-arrow-down"></i> -3%</span>
            </div>
        </div>

        <!-- ===== GRID PRINCIPAL ===== -->
        <div class="dashboard-superadmin-grid">

            <!-- ===== RESTAURANTS RÉCENTS ===== -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-store"></i>
                        Restaurants récents
                    </h3>
                    <a href="{{ route('admin.restaurant') }}" class="card-link">
                        Voir tout
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                @foreach ($restos as $resto)
                    <div class="resto-item">
                        <div class="resto-info">
                            @if ($resto->logo == '')
                                <div class="resto-avatar">
                                    <h1>
                                        {{ $resto->name[0] }}{{ $resto->name[1] }}
                                    </h1>
                                </div>
                            @else
                                <div class="resto-avatar color-1">
                                    <img src="{{ $path . $resto->logo }}" alt="" class="resto-avatar-img">
                                </div>
                            @endif
                            <div class="resto-detail">
                                <div class="resto-name">
                                    {{ $resto->name }}
                                </div>
                                <div class="resto-meta">
                                    <i class="fas fa-map-pin"></i> {{ $resto->address }}
                                    <i class="fas fa-clock"></i> {{ $resto->open_time }}-{{ $resto->close_time }}
                                </div>
                            </div>
                        </div>
                        <div class="resto-status">
                            @if ($resto->status == 'en_attent')
                                <span class="status-badge pending">
                                    en_attent
                                </span>
                            @elseif ($resto->status == 'accepter')
                                <span class="status-badge">
                                    accépter
                                </span>
                            @else
                                <span class="status-badge inactive">
                                    réfuser
                                </span>
                            @endif
                            {{-- <button class="btn-action" id="btn-action" onclick="status()">
                                <i class="fas fa-ellipsis-h"></i>
                            </button> --}}
                            {{-- <form action="" method="post" id="status" class="status-form">
                                <button class="accepte" id="accepte">accépter</button>
                                <button class="refuse">réfuser</button>
                            </form> --}}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bolt"></i>
                        Activité récente
                    </h3>
                    <a href="#" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="activity-item">
                    <span class="activity-icon restaurant"><i class="fas fa-store"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouveau restaurant</strong> "Le Petit Maroc" ajouté
                        </div>
                        <div class="activity-time">Il y a 5 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon order"><i class="fas fa-shopping-bag"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouvelle commande</strong> #ORD-435 chez La Bella Vita
                        </div>
                        <div class="activity-time">Il y a 12 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon review"><i class="fas fa-star"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouvel avis</strong> 5 ⭐ de Marie D. pour Sushi Omakase
                        </div>
                        <div class="activity-time">Il y a 28 min</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon user"><i class="fas fa-user-plus"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Nouvel utilisateur</strong> Jean P. s'est inscrit
                        </div>
                        <div class="activity-time">Il y a 1h</div>
                    </div>
                </div>

                <div class="activity-item">
                    <span class="activity-icon warning"><i class="fas fa-exclamation-triangle"></i></span>
                    <div class="activity-content">
                        <div class="activity-text">
                            <strong>Stock critique</strong> Pâtes fraîches - La Bella Vita
                        </div>
                        <div class="activity-time">Il y a 2h</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="dashboard-superadmin-bottom">

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
                        <i class="fas fa-location-dot"></i>
                        Répartition régionale
                    </h3>
                    <a href="#" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="region-item">
                    <span class="region-name">
                        <i class="fas fa-circle" style="color: #C0382B;"></i> Île-de-France
                    </span>
                    <span class="region-count">8</span>
                </div>

                <div class="region-item">
                    <span class="region-name">
                        <i class="fas fa-circle" style="color: #3498DB;"></i> Auvergne-Rhône-Alpes
                    </span>
                    <span class="region-count">5</span>
                </div>

                <div class="region-item">
                    <span class="region-name">
                        <i class="fas fa-circle" style="color: #22C55E;"></i> Nouvelle-Aquitaine
                    </span>
                    <span class="region-count">4</span>
                </div>

                <div class="region-item">
                    <span class="region-name">
                        <i class="fas fa-circle" style="color: #7C3AED;"></i> Occitanie
                    </span>
                    <span class="region-count">3</span>
                </div>

                <div class="region-item">
                    <span class="region-name">
                        <i class="fas fa-circle" style="color: #F59E0B;"></i> Autres régions
                    </span>
                    <span class="region-count">4</span>
                </div>

                <div class="region-total">
                    <i class="fas fa-globe"></i> 24 restaurants dans 12 villes
                </div>
            </div>

        </div>

        <section style="margin-top: 28px;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-euro-sign"></i>
                        Revenus par jour
                    </h3>
                    <a href="#" class="card-link">Voir tout <i class="fas fa-arrow-right"></i></a>
                </div>

                <div class="revenue-item">
                    <div class="revenue-info">
                        <div class="revenue-day">Lundi 26 juil. 2026</div>
                        <div class="revenue-orders">24 commandes</div>
                    </div>
                    <div class="revenue-amount">680,00 €</div>
                </div>

                <div class="revenue-item">
                    <div class="revenue-info">
                        <div class="revenue-day">Mardi 27 juil. 2026</div>
                        <div class="revenue-orders">32 commandes</div>
                    </div>
                    <div class="revenue-amount">890,50 €</div>
                </div>

                <div class="revenue-item">
                    <div class="revenue-info">
                        <div class="revenue-day">Mercredi 28 juil. 2026</div>
                        <div class="revenue-orders">28 commandes</div>
                    </div>
                    <div class="revenue-amount">765,30 €</div>
                </div>

                <div class="revenue-item">
                    <div class="revenue-info">
                        <div class="revenue-day">Jeudi 29 juil. 2026</div>
                        <div class="revenue-orders">36 commandes</div>
                    </div>
                    <div class="revenue-amount">1 024,80 €</div>
                </div>
            </div>
        </section>

    </div>



</x-admin-layout>
