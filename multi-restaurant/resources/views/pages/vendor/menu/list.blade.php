<x-vendeur-layout>
    <div class="menu-page">

        <div class="menu-header">

            <div class="menu-header-left">
                <div class="menu-icon">
                    <i class="fas fa-utensils"></i>
                </div>

                <div>
                    <h1>Mes menus</h1>
                    <p>Gérez les menus de votre restaurant</p>
                </div>
            </div>

            <a href="{{ route('vendeur.menu.create') }}" class="btn-add">
                <i class="fas fa-plus"></i>
                Ajouter un menu
            </a>
            <a href="{{ route('vendor.dashboard') }}" class="btn-add" style="background: gray">
                <i class="fa-solid fa-arrow-left"></i>
                Retour
            </a>

        </div>


        <div class="menu-stats">

            <div class="stat-card">

                <div class="stat-card-icon">
                    <i class="fas fa-book-open"></i>
                </div>

                <div>
                    <span>Total des menus</span>
                    <strong>{{ $menus->count() }}</strong>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-card-icon available">
                    <i class="fas fa-check-circle"></i>
                </div>

                <div>
                    <span>Menus disponibles</span>
                    <strong>
                        {{ $menus->where('stat', 'disponible')->count() }}
                    </strong>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-card-icon unavailable">
                    <i class="fas fa-times-circle"></i>
                </div>

                <div>
                    <span>Menus indisponibles</span>
                    <strong>
                        {{ $menus->where('stat', 'indisponible')->count() }}
                    </strong>
                </div>

            </div>

        </div>


        <div class="menu-toolbar">

            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Rechercher un menu...">
            </div>

            <div class="filter-box">

                <select>
                    <option value="">Tous les menus</option>
                    <option value="Disponible">Disponibles</option>
                    <option value="Indisponible">Indisponibles</option>
                </select>

            </div>

        </div>


        @if ($menus->count() > 0)

            <div class="menus-grid">

                @foreach ($menus as $menu)
                    <div class="menu-card">

                        <div class="menu-image">

                            @if ($menu->image)
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">
                            @else
                                <div class="no-image">
                                    <i class="fas fa-utensils"></i>
                                </div>
                            @endif


                            @if ($menu->stat == 'disponible')
                                <span class="menu-status available">
                                    Disponible
                                </span>
                            @else
                                <span class="menu-status unavailable">
                                    Indisponible
                                </span>
                            @endif

                        </div>


                        <div class="menu-content">

                            <h2>
                                {{ $menu->name }}
                            </h2>

                            <p>
                                {{ Str::limit($menu->description, 100) }}
                            </p>


                            <div class="menu-footer">

                                <a href="{{ route('vendeur.menu.edit', $menu->id) }}" class="btn-edit" style="background: rgb(124, 124, 3);">
                                    <i class="fas fa-edit"></i>
                                    Modifier
                                </a>

                            </div>

                            <div class="menu-footer" style="margin-top: 1rem;">

                                <a href="{{ route('vendeur.menu.show', $menu->id) }}" class="btn-view">
                                    <i class="fa-regular fa-eye"></i>
                                    Voir détail
                                </a>

                                <a href="" class="btn-edit">
                                    <i class="fa-solid fa-xmark"></i>
                                    Supprimmer
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="empty-menu">

                <div class="empty-icon">
                    <i class="fas fa-utensils"></i>
                </div>

                <h2>Aucun menu disponible</h2>

                <p>
                    Vous n'avez pas encore créé de menu pour votre restaurant.
                </p>

                <a href="{{ route('vendeur.menu.create') }}" class="btn-add">
                    <i class="fas fa-plus"></i>
                    Ajouter votre premier menu
                </a>

            </div>

        @endif

    </div>

</x-vendor-layout>
