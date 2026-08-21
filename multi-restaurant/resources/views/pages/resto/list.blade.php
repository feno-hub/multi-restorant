<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="restaurants-page">
        <!-- En-tête de la page -->
        <div class="restaurants-header">
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
                    <input 
                        type="text" 
                        id="" 
                        name="query" 
                        placeholder="Rechercher un restaurant..."
                        class="filter-input"
                        @if (isset($_GET['query']))
                            value="{{ $_GET['query'] }}"
                        @endif
                    >
                    <x-btnsecondary-layout icon="fa-brands fa-searchengin" btn="chercher" type="submit" />
                    {{-- @if (!isset($_GET['query']))
                    @else    
                        <a href="{{ route('resto.list') }}">
                            <x-btnsecondary-layout icon="fa-solid fa-xmark" btn="Annuler"/>
                        </a>
                    @endif --}}
                </form>
            </div>
        </div>

        <!-- Grille des restaurants -->
        <div class="restaurants-grid">
            @foreach ($restos as $resto)
                @if (!isset($_GET['query']) || $_GET['query'] == "")
                    <div class="restaurant-card" id="results" data-aos="fade-up" data-aos-delay="100">
                        <div class="restaurant-card-image">
                            <img src="{{ $path . $resto->cover }}" alt="Le Petit Bistro">
                            <div class="restaurant-card-badge">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>
                            <div class="restaurant-card-status">
                                <span class="status-open">Ouvert</span>
                            </div>
                        </div>
                        <div class="restaurant-card-body">
                            <h3 class="restaurant-card-name" id="RestoName">
                                {{ $resto->name }}
                            </h3>
                            <p class="restaurant-card-cuisine">
                                <i class="fas fa-tag"></i>
                                {{ $resto->category }}
                            </p>
                            <div class="restaurant-card-info">
                                <div class="info-item">
                                    <i class="fas fa-utensil-spoon"></i>
                                    <span>24 plats</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-pin"></i>
                                    <span>
                                        {{ $resto->city }}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $resto->open_time }} - {{ $resto->close_time }} </span>
                                </div>
                            </div>
                            <div class="restaurant-card-footer">
                                <span class="restaurant-card-price">
                                    À suivre
                                </span>
                                <a href="{{ route('resto.show', $resto->id) }}">
                                    <x-btnsecondary-layout icon="fas fa-arrow-right" btn="Voir profil" />
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif ($_GET['query'] == $resto->name)
                    <div class="restaurant-card" id="results" data-aos="fade-up" data-aos-delay="100">
                        <div class="restaurant-card-image">
                            <img src="{{ $path . $resto->cover }}" alt="Le Petit Bistro">
                            <div class="restaurant-card-badge">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>
                            <div class="restaurant-card-status">
                                <span class="status-open">Ouvert</span>
                            </div>
                        </div>
                        <div class="restaurant-card-body">
                            <h3 class="restaurant-card-name" id="RestoName">
                                {{ $resto->name }}
                            </h3>
                            <p class="restaurant-card-cuisine">
                                <i class="fas fa-tag"></i>
                                {{ $resto->category }}
                            </p>
                            <div class="restaurant-card-info">
                                <div class="info-item">
                                    <i class="fas fa-utensil-spoon"></i>
                                    <span>24 plats</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-pin"></i>
                                    <span>
                                        {{ $resto->city }}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $resto->open_time }} - {{ $resto->close_time }} </span>
                                </div>
                            </div>
                            <div class="restaurant-card-footer">
                                <span class="restaurant-card-price">
                                    À suivre
                                </span>
                                <a href="{{ route('resto.show', $resto->id) }}">
                                    <x-btnprimary-layout icon="fas fa-arrow-right" btn="Voir profil" />
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif ($_GET['query'] == $resto->category)
                    <div class="restaurant-card" id="results" data-aos="fade-up" data-aos-delay="100">
                        <div class="restaurant-card-image">
                            <img src="{{ $path . $resto->cover }}" alt="Le Petit Bistro">
                            <div class="restaurant-card-badge">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>
                            <div class="restaurant-card-status">
                                <span class="status-open">Ouvert</span>
                            </div>
                        </div>
                        <div class="restaurant-card-body">
                            <h3 class="restaurant-card-name" id="RestoName">
                                {{ $resto->name }}
                            </h3>
                            <p class="restaurant-card-cuisine">
                                <i class="fas fa-tag"></i>
                                {{ $resto->category }}
                            </p>
                            <div class="restaurant-card-info">
                                <div class="info-item">
                                    <i class="fas fa-utensil-spoon"></i>
                                    <span>24 plats</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-pin"></i>
                                    <span>
                                        {{ $resto->city }}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $resto->open_time }} - {{ $resto->close_time }} </span>
                                </div>
                            </div>
                            <div class="restaurant-card-footer">
                                <span class="restaurant-card-price">
                                    À suivre
                                </span>
                                <a href="{{ route('resto.show', $resto->id) }}">
                                    <x-btnprimary-layout icon="fas fa-arrow-right" btn="Voir profil" />
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif ($_GET['query'] == $resto->city)
                    <div class="restaurant-card" id="results" data-aos="fade-up" data-aos-delay="100">
                        <div class="restaurant-card-image">
                            <img src="{{ $path . $resto->cover }}" alt="Le Petit Bistro">
                            <div class="restaurant-card-badge">
                                <i class="fas fa-star"></i>
                                4.8
                            </div>
                            <div class="restaurant-card-status">
                                <span class="status-open">Ouvert</span>
                            </div>
                        </div>
                        <div class="restaurant-card-body">
                            <h3 class="restaurant-card-name" id="RestoName">
                                {{ $resto->name }}
                            </h3>
                            <p class="restaurant-card-cuisine">
                                <i class="fas fa-tag"></i>
                                {{ $resto->category }}
                            </p>
                            <div class="restaurant-card-info">
                                <div class="info-item">
                                    <i class="fas fa-utensil-spoon"></i>
                                    <span>24 plats</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-map-pin"></i>
                                    <span>
                                        {{ $resto->city }}
                                    </span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ $resto->open_time }} - {{ $resto->close_time }} </span>
                                </div>
                            </div>
                            <div class="restaurant-card-footer">
                                <span class="restaurant-card-price">
                                    À suivre
                                </span>
                                <a href="{{ route('resto.show', $resto->id) }}">
                                    <x-btnprimary-layout icon="fas fa-arrow-right" btn="Voir profil" />
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Section de statistiques -->
        <div class="restaurants-stats" data-aos="fade-up">
            <div class="stat-item">
                <div class="stat-number"> {{ $countResto }} +</div>
                <div class="stat-label">Restaurants partenaires</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">12 000+</div>
                <div class="stat-label">Plats disponibles</div>
            </div>
            {{-- <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Satisfaction client</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Service disponible</div>
            </div> --}}
        </div>

        <!-- Pagination -->
        <div class="restaurants-pagination" id="pagine" data-aos="fade-up">
            {{-- <a href="#" class="pagination-btn">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a href="#" class="pagination-btn active">1</a>
            <a href="#" class="pagination-btn">2</a>
            <a href="#" class="pagination-btn">3</a>
            <span class="pagination-dots">...</span>
            <a href="#" class="pagination-btn">10</a>
            <a href="#" class="pagination-btn">
                <i class="fas fa-chevron-right"></i>
            </a> --}}

            {{ $restos->links() }}

        </div>

    </div>


</x-app-layout>
