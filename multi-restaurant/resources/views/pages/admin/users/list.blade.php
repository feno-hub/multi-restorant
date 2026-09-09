<x-admin-layout>

    <div class="page-admin-users">

        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-user-cog"></i>Gestion des utilisateurs</h1>
                <div class="sub">
                    <i class="fas fa-circle status-dot"></i> {{ $countUser }} utilisateurs au total
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
                    <img src="https://ui-avatars.com/api/?name=Super+Admin&background=C0382B&color=fff&size=36"
                        alt="avatar">
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

        <div class="page-admin-users-stats">
            <div class="stat-item">
                <div class="stat-number">
                    {{ $countUser }}
                </div>
                <div class="stat-label">Total</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #22C55E;">
                    {{ $user_actif }}
                </div>
                <div class="stat-label">Actifs</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #F59E0B;">68</div>
                <div class="stat-label">En attente</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #EF4444;">84</div>
                <div class="stat-label">Bannis</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #3498DB;">
                    {{ $countAdmin }}
                </div>
                <div class="stat-label">Administrateurs</div>
            </div>
        </div>

        <div class="page-admin-users-filter">
            <div class="filter-left">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un utilisateur...">
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option value="">Tous les rôles</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="user">Utilisateur</option>
                    </select>
                    <select class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
                <div class="btn-export">
                    <x-btnsecondary-layout icon="fa-solid fa-filter" btn='filtrer' />
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="users-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="select-all"></th>
                            <th>Utilisateur</th>
                            <th>Rôle</th>
                            <th>Statut</th>
                            <th>Inscription</th>
                            <th>Commandes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar color-1">
                                            {{ $user->last_name[0] }}{{ $user->name[0] }}
                                        </div>
                                        <div>
                                            <div class="user-name">
                                                {{ $user->last_name }}
                                                {{ $user->name[0] }}.
                                            </div>
                                            <div class="user-email">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if (isset($user->resto) && $user->resto->status == "accepter")
                                        <span class="role-badge admin">
                                            Restaurant
                                        </span>
                                    @else
                                        <span class="role-badge super-admin">
                                            {{ $user->role }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge active">
                                        @if ($user_actif)
                                            Actif
                                        @else
                                            Inactif
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <div class="date-info">
                                        <div class="date-main">
                                            {{ $user->created_at->day }}-{{ $user->created_at->month }}-{{ $user->created_at->year }}
                                        </div>
                                        <div>Il y a {{ $user->created_at->diffForHumans() }}</div>
                                    </div>
                                </td>
                                <td>0</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-action-view" title="Voir">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-action-ban" title="Bannir">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ===== TABLE FOOTER ===== -->
            <div class="table-footer">
                <div class="table-info">
                    Affichage de 1 à 8 sur 1 432 utilisateurs
                </div>
                <div class="pagination">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
