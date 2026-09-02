<x-vendeur-layout>

    <div class="menu-detail-page">

        <div class="detail-header">

            <div>
                <a href="{{ route('vendeur.menu.list') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Retour aux menus
                </a>

                <h1>Détail du menu</h1>

                <p>
                    Consultez les informations et les plats de ce menu.
                </p>
            </div>

            <div class="detail-actions">

                <a href="{{ route('vendeur.menu.edit', $menu->id) }}" class="edit-button">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>

            </div>

        </div>


        <div class="menu-detail-card">

            <div class="menu-detail-image">

                @if ($menu->image)
                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">
                @else
                    <div class="detail-no-image">
                        <i class="fas fa-utensils"></i>
                    </div>
                @endif

            </div>


            <div class="menu-detail-content">

                <div class="detail-title-row">

                    <h2>{{ $menu->name }}</h2>

                    @if ($menu->stat === 'Disponible')
                        <span class="status available">
                            <i class="fas fa-check-circle"></i>
                            Disponible
                        </span>
                    @else
                        <span class="status unavailable">
                            <i class="fas fa-times-circle"></i>
                            Indisponible
                        </span>
                    @endif

                </div>


                <div class="restaurant-name">

                    <i class="fas fa-store"></i>

                </div>


                <div class="description">

                    <h3>Description</h3>

                    <p>
                        {{ $menu->description ?: 'Aucune description disponible pour ce menu.' }}
                    </p>

                </div>


                <div class="menu-information">

                    <div class="information-item">

                        <div class="information-icon">
                            <i class="fas fa-utensils"></i>
                        </div>

                        <div>
                            <span>Nombre de plats</span>
                            <strong>{{ $menu->plat->count() }}</strong>
                        </div>

                    </div>


                    <div class="information-item">

                        <div class="information-icon">
                            <i class="fas fa-calendar"></i>
                        </div>

                        <div>
                            <span>Créé le</span>
                            <strong>
                                {{ $menu->created_at->format('d/m/Y') }}
                            </strong>
                        </div>

                    </div>


                    <div class="information-item">

                        <div class="information-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>

                        <div>
                            <span>Dernière modification</span>
                            <strong>
                                {{ $menu->updated_at->format('d/m/Y') }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="plats-section">

            <div class="section-title">

                <div>
                    <h2>Plats du menu</h2>

                    <p>
                        Les plats disponibles dans ce menu
                    </p>
                </div>

                <span class="plats-count">
                    {{ $menu->plat->count() }} plats
                </span>

            </div>


            @if ($menu->plat->count() > 0)

                <div class="plats-grid">

                    @foreach ($menu->plat as $plat)
                        <div class="plat-card">

                            <div class="plat-image">

                                @if ($plat->image)
                                    <img src="{{ asset('storage/' . $plat->image) }}" alt="{{ $plat->name }}">
                                @else
                                    <div class="plat-no-image">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                @endif

                            </div>


                            <div class="plat-content">

                                <div class="plat-title">

                                    <h3>
                                        {{ $plat->name }}
                                    </h3>

                                    @if ($plat->status === 'Disponible')
                                        <span class="plat-status available">
                                            Disponible
                                        </span>
                                    @else
                                        <span class="plat-status unavailable">
                                            Indisponible
                                        </span>
                                    @endif

                                </div>


                                <p>
                                    {{ Str::limit($plat->description, 90) }}
                                </p>


                                <div class="plat-bottom">

                                    <strong>
                                        {{ number_format($plat->price, 0, ',', ' ') }} Ar
                                    </strong>

                                    <span>
                                        Stock : {{ $plat->quantity }}
                                    </span>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="empty-plats">

                    <div class="empty-plats-icon">
                        <i class="fas fa-utensils"></i>
                    </div>

                    <h3>Aucun plat dans ce menu</h3>

                    <p>
                        Aucun plat n'a encore été ajouté à ce menu.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-vendeur-layout>
