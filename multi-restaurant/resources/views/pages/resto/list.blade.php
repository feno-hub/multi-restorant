<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="restaurants-page">

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
                    <input type="text" id="" name="query" placeholder="Rechercher un restaurant..."
                        class="filter-input" @if (isset($_GET['query'])) value="{{ $_GET['query'] }}" @endif>
                    <x-btnsecondary-layout icon="fa-brands fa-searchengin" btn="chercher" type="submit" />
                </form>
            </div>

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


                            <div class="badge">
                                <span>
                                    {{ $resto->category }}
                                </span>
                            </div>

                        </div>


                        <div class="body">

                            <h3 class="resto-card-name">
                                {{ $resto->name }}
                            </h3>

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

                                
                                <form action="{{ route('favorite') }}" method="POST" class="button">

                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="resto_id" value="{{ $resto->id }}">

                                    <button type="submit" class="favorite">
                                        <i class="fa-regular fa-heart"></i>
                                        Ajouter au favorie
                                    </button>

                                    <a href="{{ route('resto.show', $resto->id) }}" class="btn">
                                        voir restaurant
                                    </a>
                                </form>
                                {{-- <form action="{{ route('favorite.destroy', $resto->id) }}" method="POST" class="button">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="favorite-cancelled">
                                        <i class="fa-regular fa-heart"></i>
                                        favorie
                                    </button>

                                    <a href="{{ route('resto.show', $resto->id) }}" class="btn">
                                        voir restaurant
                                    </a>
                                </form> --}}


                        </div>

                    </article>
                @endif
            @endforeach

        </div>

        @if ($restos)
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
