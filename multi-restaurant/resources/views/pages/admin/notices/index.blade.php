<x-admin-layout>

    <!-- ==========================================================
    PAGE ADMIN NOTICES - SLOT
    ========================================================== -->
    <div class="page-admin-notices">

        <!-- ===== HEADER ===== -->
        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-star"></i>Gestion des avis</h1>
                <div class="sub">
                    <i class="fas fa-circle status-dot"></i> 1 284 avis au total
                    <span class="update-badge"><i class="far fa-clock"></i> Dernière mise à jour</span>
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

        <!-- ===== STATS ===== -->
        <div class="page-admin-notices-stats">
            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Total avis</span>
                    <span class="stat-icon blue"><i class="fas fa-star"></i></span>
                </div>
                <div class="stat-number">1 284</div>
                <div class="stat-sub">+45 ce mois</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">En attente</span>
                    <span class="stat-icon yellow"><i class="fas fa-clock"></i></span>
                </div>
                <div class="stat-number">23</div>
                <div class="stat-sub">À modérer</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Rejetés</span>
                    <span class="stat-icon red"><i class="fas fa-times"></i></span>
                </div>
                <div class="stat-number">12</div>
                <div class="stat-sub">Ce mois</div>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <span class="stat-label">Avis partager</span>
                    <span class="stat-icon purple"><i class="fas fa-smile"></i></span>
                </div>
                <div class="stat-number">856</div>
                <div class="stat-sub">4-5 ⭐</div>
            </div>
        </div>

        <!-- ===== FILTERS ===== -->
        <div class="page-admin-notices-filter">
            <div class="filter-left">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un avis, client ou restaurant...">
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option value="">Toutes les notes</option>
                        <option value="5">5 ⭐</option>
                        <option value="4">4 ⭐</option>
                        <option value="3">3 ⭐</option>
                        <option value="2">2 ⭐</option>
                        <option value="1">1 ⭐</option>
                    </select>
                    <select class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="published">Publié</option>
                        <option value="pending">En attente</option>
                        <option value="rejected">Rejeté</option>
                        <option value="featured">Mis en avant</option>
                    </select>
                    <select class="filter-select">
                        <option value="">Tous les restaurants</option>
                        <option value="bella">La Bella Vita</option>
                        <option value="sushi">Sushi Omakase</option>
                        <option value="fuego">El Fuego</option>
                        <option value="burger">Burger House</option>
                        <option value="roma">Trattoria Roma</option>
                    </select>
                </div>
                <div class="btn-export">
                    <x-btnsecondary-layout icon="fa-solid fa-filter" btn='filtrer' />
                </div>
            </div>
        </div>

        <!-- ===== REVIEWS LIST ===== -->
        <div class="page-admin-notices-list">

            @foreach ($notices as $notice)
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-user">
                            <div class="review-avatar color-1">
                                {{ $notice->user->name[0] }}{{ $notice->user->last_name[0] }}
                            </div>
                            <div class="user-info">
                                <div class="user-name">
                                    {{ $notice->user->name }}{{ $notice->user->last_name }}
                                </div>
                                <div class="user-meta">
                                    <span>
                                        <i class="fas fa-store"></i>
                                        {{ $notice->resto->name }}
                                    </span>
                                    <span>
                                        <i class="far fa-calendar-alt"></i>
                                        {{ $notice->created_at->day }}-{{ $notice->created_at->month }}-{{ $notice->created_at->year }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="review-status">
                            <span class="status-badge">Publié</span>
                        </div>
                    </div>
                    <div class="review-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="rating-score">5.0</span>
                        <span class="rating-date"><i class="far fa-clock"></i> Il y a
                            {{ $notice->created_at->diffForHumans() }} </span>
                    </div>
                    <div class="review-content">
                        <p>
                            {{ $notice->content }}
                        </p>
                    </div>
                    <div class="review-footer">
                        <div class="review-helpful">
                            <i class="fas fa-thumbs-up"></i>
                            <span class="helpful-count">24</span> personnes ont trouvé cet avis utile
                        </div>
                        {{-- <div class="review-actions">
                            <button class="btn-action btn-action-view" title="Voir">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn-action btn-action-featured" title="Mettre en avant">
                                <i class="fas fa-star"></i>
                            </button>
                            <button class="btn-action btn-action-update" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn-action btn-action-delete" title="Supprimer">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div> --}}
                    </div>
                </div>
            @endforeach

        </div>

        <!-- ===== PAGINATION ===== -->
        <div class="page-admin-notices-footer">
            <div class="table-info">
                Affichage de 1 à 6 sur 1 284 avis
            </div>
            <div class="pagination">
                {{ $notices->links() }}
            </div>
        </div>

    </div>
</x-admin-layout>
