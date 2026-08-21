<x-app-layout>
    @php
        $path = '/storage/';
    @endphp

    <div class="page-categories">

        <div class="" style="display: flex;align-items:center;gap:4rem;">
            {{-- HEADER --}}
            <div class="page-categories-header">
                <h1 class="page-title">
                    <i class="fas fa-tags"></i>
                    Voicie tous les menus
                </h1>
                <p class="page-subtitle">Voir toutes les menus, plats</p>
            </div>

            {{-- FILTERS --}}
            <div class="page-categories-filter">
                <form action="{{ route('menu.search') }}" method="GET" class="filter-left">

                    @method('GET')

                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" name="query" placeholder="Une catégorie , un restaurant,..."
                            @if (isset($_GET['query'])) {{ $_GET['query'] }} @endif>
                    </div>
                    <div class="filter-group">
                        <x-btnsecondary-layout type="submit" icon='fa-brands fa-searchengin' btn='chercher' />
                    </div>

                </form>
            </div>
        </div>

        {{-- CATEGORIES GRID --}}
        <div class="page-categories-grid">
            @foreach ($menus as $menu)
                @if (!isset($_GET['query']) || $_GET['query'] == '')
                    <div class="category-card">

                        <div class="category-card-image">
                            <a href="{{ route('menu.category', $menu->name) }}">
                                <img src="{{ $path . $menu->image }}" alt="" class="category-card-image-img">
                            </a>
                        </div>

                        <div class="category-card-body">

                            <div class="category-card-header">
                                <h3 class="category-name">
                                    <a href="{{ route('menu.category', $menu->name) }}">
                                        {{ $menu->name }}
                                    </a>
                                </h3>

                                <span class="category-icon">
                                    <i class="fas fa-pizza-slice"></i>
                                </span>
                            </div>

                            <div class="category-card-info">
                                <span class="info-item">
                                    <i class="fas fa-star"></i>
                                    nom resto
                                    {{-- {{ $menu->resto->name }} --}}
                                </span>
                                <span class="info-item">
                                    <i class=""></i>
                                    {{ $menu->stat }}
                                    {{-- {{ $menu->resto->name }} --}}
                                </span>
                            </div>

                            <div class="category-card-footer">
                                <span class="resto-count">
                                    <a href="" class="btn-action btn-action-view">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </span>
                                <form action="{{ route('menu.like') }}" method="post">
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <button type="submit" class="resto-count">
                                        <i class="fa-regular fa-thumbs-up"></i>
                                    </button>
                                </form>
                                <form class="card-actions">
                                    <button class="btn-action btn-action-view">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                @elseif ($_GET['query'] == $menu->name)
                    <div class="category-card">
                        <div class="category-card-image">
                            <img src="{{ $path . $menu->image }}" alt="" class="category-card-image-img">
                        </div>

                        <div class="category-card-body">

                            <div class="category-card-header">
                                <h3 class="category-name">
                                    <a href="{{ route('menu.category', $menu->name) }}">
                                        {{ $menu->name }}
                                    </a>
                                </h3>
                                <span class="category-icon">
                                    <i class="fas fa-pizza-slice"></i>
                                </span>
                            </div>

                            <div class="category-card-info">
                                <span class="info-item">
                                    <i class="fas fa-star"></i>
                                    nom resto
                                    {{-- {{ $menu->resto->name }} --}}
                                </span>
                            </div>

                            <div class="category-card-footer">
                                <span class="resto-count">
                                    <a href="" class="btn-action btn-action-view">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </span>
                                <span class="resto-count">
                                    <a href="" class="btn-action btn-action-view">
                                        <i class="fa-regular fa-thumbs-up"></i>
                                    </a>
                                </span>
                                <form method="POST" class="card-actions">
                                    <button class="btn-action btn-action-view">
                                        <i class="fa-solid fa-cart-arrow-down"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                    </div>
                    {{-- @elseif ($_GET['query'] == $menu->) --}}
                @endif
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="page-categories-footer">
            <div class="table-info">
                Affichage de 1 à 12 sur 12 catégories
            </div>
            <div class="pagination">
                <a href="#" class="page-btn">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a href="#" class="page-btn active">1</a>
                <a href="#" class="page-btn">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>

    </div>
</x-app-layout>
