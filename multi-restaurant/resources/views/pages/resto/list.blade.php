<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="restaurants-page">

        <div class="restaurants-header">

            @if (isset($restos))
                <h1 class="restaurants-title">
                    <i class="fas fa-tags"></i>
                    Pas Restaurants
                </h1>
            @else
                <div class="restaurants-header-content">
                    <h1 class="restaurants-title">
                        <i class="fas fa-tags"></i>
                        Nos Restaurants
                    </h1>
                    <p class="restaurants-subtitle">
                        Découvrez les meilleurs restaurants de votre région
                    </p>
                </div>

                <div class="restaurants-filter">
                    <form action="{{ route('resto.search') }}" class="filter-group" method="GET">
                        <input type="text" id="" name="query" placeholder="Rechercher un restaurant..."
                            class="filter-input" @if (isset($_GET['query'])) value="{{ $_GET['query'] }}" @endif>
                        <x-btnsecondary-layout icon="fa-brands fa-searchengin" btn="chercher" type="submit" />
                    </form>
                </div>
            @endif

        </div>

        <div class="restaurants-grid">

            @foreach ($restos as $resto)
                @if (
                    !request()->filled('query') ||
                        str_contains(strtolower($resto->name), strtolower(request('query'))) ||
                        str_contains(strtolower($resto->category), strtolower(request('query'))) ||
                        str_contains(strtolower($resto->city), strtolower(request('query'))))
                    <article class="resto-card">

                        <div class="resto-card-image">

                            <img src="{{ $path . $resto->cover }}" alt="{{ $resto->name }}">

                            <div class="resto-card-rating">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>

                            <div class="resto-card-status">
                                <span>OUVERT</span>
                            </div>

                        </div>


                        <div class="resto-card-content">

                            <h2 class="resto-card-name">
                                {{ $resto->name }}
                            </h2>


                            <div class="resto-card-category">

                                <i class="fas fa-tag"></i>

                                {{ $resto->category }}

                            </div>


                            <div class="resto-card-hours">

                                <i class="fas fa-clock"></i>

                                <span>
                                    Ouvert de
                                    <strong>{{ $resto->open_time }}</strong>
                                    à
                                    <strong>{{ $resto->close_time }}</strong>
                                </span>

                            </div>

                            <div class="resto-card-actions">

                                <a href="{{ route('resto.show', $resto->id) }}" class="btn-detail">
                                    <i class="fas fa-eye"></i>
                                    Voir détail
                                </a>

                                <a href="#" class="btn-follow">
                                    <i class="far fa-heart"></i>
                                    À suivre
                                </a>

                            </div>

                            <div class="resto-card-location">

                                <div class="location-item">

                                    <div class="location-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>

                                    <div class="location-text">

                                        <span>Adresse</span>

                                        <p>
                                            {{ $resto->address ?? 'Adresse non renseignée' }}
                                        </p>

                                    </div>

                                </div>


                                <div class="location-item">

                                    <div class="location-icon">
                                        <i class="fas fa-city"></i>
                                    </div>

                                    <div class="location-text">

                                        <span>Ville</span>

                                        <p>
                                            {{ $resto->city }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </article>
                @endif
            @endforeach

        </div>

        @if (!isset($restos))
            <div class="restaurants-stats" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-number"> {{ $countResto }} +</div>
                    <div class="stat-label">Restaurants partenaires</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12 000+</div>
                    <div class="stat-label">Plats disponibles</div>
                </div>
            </div>
        @else
            <div class="restaurants-stats" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-label">Pas restaurants partenaires</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Aucun plats disponibles</div>
                </div>
            </div>
        @endif

        <div class="restaurants-pagination" id="pagine" data-aos="fade-up">

            {{ $restos->links() }}

        </div>

    </div>


</x-app-layout>
