<x-admin-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="page-admin-restaurants">

        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-store"></i>Gestion des restaurants</h1>
                <div class="sub">
                    <i class="fas fa-circle status-dot"></i> {{ $countResto }} restaurants au total
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

        <div class="page-admin-restaurants-stats">
            <div class="stat-item">
                <div class="stat-number">
                    {{ $countResto }}
                </div>
                <div class="stat-label">Total</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #22C55E;">
                    {{ $restoAccept }}
                </div>
                <div class="stat-label">Accépter</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #F59E0B;">
                    {{ $restoAttent }}
                </div>
                <div class="stat-label">En attente</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" style="color: #EF4444;">
                    {{ $restoRefus }}
                </div>
                <div class="stat-label">Réfuser</div>
            </div>
        </div>

        <div class="page-admin-restaurants-filter">
            <div class="filter-left">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Rechercher un restaurant...">
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option value="">Tous les statuts</option>
                        <option value="accepter">Accepter</option>
                        <option value="en attente">En attente</option>
                        <option value="refuser">Réfuser</option>
                    </select>
                    <select class="filter-select">
                        <option value="">Toutes les régions</option>
                        <option value="occ">
                        </option>
                    </select>
                </div>
                <div class="btn-export">
                    <x-btnsecondary-layout icon="fa-solid fa-filter" btn='filtrer' />
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive">
                <table class="resto-table">
                    <thead>
                        <tr>
                            <th>Restaurant</th>
                            <th>Localisation</th>
                            <th>Contact</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restos as $resto)
                            <tr>
                                <td>
                                    <div class="resto-cell">
                                        @if ($resto->logo == '')
                                            <div class="resto-avatar">
                                                <h1>
                                                    {{ $resto->name[0] }}{{ $resto->name[1] }}
                                                </h1>
                                            </div>
                                        @else
                                            <div class="resto-avatar color-1">
                                                <img src="{{ $path . $resto->logo }}" alt=""
                                                    class="resto-avatar-img">
                                            </div>
                                        @endif
                                        <div>
                                            <div class="resto-name">
                                                {{ $resto->name }}
                                            </div>
                                            <div class="resto-cuisine">
                                                {{ $resto->cuisine }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $resto->address }}
                                </td>
                                <td>
                                    <div class="contact-info">
                                        <div>
                                            <i class="fas fa-phone"></i>
                                            {{ $resto->phone }}
                                        </div>
                                        <div>
                                            <i class="fas fa-envelope"></i>
                                            {{ $resto->email }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($resto->status == 'en_attent')
                                        <span style="en_attent">
                                            en attent
                                        </span>
                                    @elseif ($resto->status == 'accepter')
                                        <span class="accepter">
                                            accepter
                                        </span>
                                    @else
                                        <span class="anuler">
                                            réfuser
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.restaurant.show', $resto->user_id) }}">
                                            <button class="btn-action btn-action-view" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </a>

                                        @if ($resto->status == "en_attent")
                                            <form action="{{ route('admin.resto.accepter', $resto->id) }}" method="post">
                                                @csrf
                                                @method("PATCH")
                                                <button type="submit" class="btn-action btn-action-view" title="Accepter">
                                                    <i class="fa-regular fa-square-check"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.resto.refuser', $resto->id) }}" method="post">
                                                
                                                @csrf
                                                @method("PATCH")
                                                
                                                <button type="submit" class="btn-action btn-action-delete" title="Refuser">
                                                    <i class="fa-solid fa-square-xmark"></i>
                                                </button>

                                            </form>
                                        @endif

                                        <button class="btn-action btn-action-delete" title="Supprimer">
                                            <i class="fas fa-trash"></i>
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
                    Affichage de 1 à 8 sur 24 restaurants
                </div>
                <div class="pagination">
                    {{ $restos->links() }}
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
