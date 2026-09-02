<x-app-layout>
    @php
        $path = '/storage/';
    @endphp

    <div class="page-categories">

        <div class="" style="display: flex;align-items:center;gap:4rem;">
            <div class="page-categories-header">
                <h1 class="page-title">
                    <i class="fas fa-tags"></i>
                    Voicie tous les menus
                </h1>
                <p class="page-subtitle">Voir toutes les menus, plats</p>
            </div>

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

        <div class="page-categories-grid">
            @foreach ($menus as $menu)
                @if (!isset($_GET['query']) || $_GET['query'] == '')
                    <div class="category-card">

                        <div class="category-card-image">
                            <a href="{{ route('menu.show', $menu->id) }}">
                                <img src="{{ $path . $menu->image }}" alt="" class="category-card-image-img">
                            </a>
                        </div>

                        <div class="category-card-body">

                            <div class="category-card-header">
                                <h3 class="category-name">
                                    <a href="{{ route('menu.show', $menu->id) }}">
                                        {{ $menu->name }}
                                    </a>
                                </h3>

                                <span class="category-icon">
                                    <i class="fas fa-pizza-slice"></i>
                                </span>
                            </div>

                            <div class="category-card-info">
                                
                                <span class="info-item">
                                    <strong class="" style="color: red">❤</strong>
                                    {{ $menu->like->count() }}
                                    p aimes
                                </span>
                                
                                <span class="info-item">
                                    <i class=""></i>
                                    {{ $menu->stat }}
                                </span>

                                <span class="info-item">
                                    <i class=""></i>
                                    {{ $menu->plat->count() }} plats
                                </span>
                                
                            </div>

                            <div class="category-card-footer">
                                
                                <span class="resto-count">
                                    <a href="{{ route('menu.show', $menu->id) }}" class="btn-action btn-action-view">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </span>

                                <form action="{{ route('menu.like') }}" method="post">
                                    @csrf
                                    @method('POST')

                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <button type="submit" class="btn-action btn-action-view">
                                        <i class="fa-regular fa-thumbs-up"></i>
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
                @endif
            @endforeach

        </div>

        <div>
            {{ $menus->links() }}
        </div>

    </div>
</x-app-layout>
