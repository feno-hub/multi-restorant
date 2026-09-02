<x-app-layout>
    @php
        $path = '/storage/';
    @endphp

    <div class="detail-page">

        <div class="breadcrumb" data-aos="fade-down">
            <a href="{{ route('home') }}" class="breadcrumb-link">
                <i class="fas fa-home"></i> Accueil
            </a>
            <span class="breadcrumb-separator">
                <i class="fas fa-chevron-right"></i>
            </span>
            <a href="{{ route('resto.list') }}" class="breadcrumb-link">Restaurants</a>
            <span class="breadcrumb-separator">
                <i class="fas fa-chevron-right"></i>
            </span>
            <a href="" class="breadcrumb-link">
                {{ $resto->name }}
            </a>
            <span class="breadcrumb-separator">
                <i class="fas fa-chevron-right"></i>
            </span>
            <span class="breadcrumb-current">Notre Menu</span>
        </div>

        <div class="restaurant-header" data-aos="fade-up">
            <div class="restaurant-header-image">
                <img src="{{ $path . $resto->cover }}" alt="Le Petit Bistro">
                <div class="restaurant-header-overlay">
                    <div class="restaurant-header-content">
                        <div class="restaurant-info">
                            <span class="restaurant-badge">
                                <i class="fas fa-star"></i> 4.8
                            </span>
                            <span class="restaurant-status status-open">
                                <i class="fas fa-circle"></i> Ouvert
                            </span>
                        </div>
                        <h1 class="restaurant-name">
                            {{ $resto->name }}
                        </h1>
                        <div class="restaurant-meta">
                            <span class="meta-item">
                                <i class="fas fa-tag"></i>
                                {{ $resto->category }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-map-pin"></i>
                                {{ $resto->address }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-clock"></i>
                                {{ $resto->open_time }} - {{ $resto->close_time }}
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-euro-sign"></i> €€
                            </span>
                        </div>
                        <div class="restaurant-actions">
                            <a href="{{ route('resto.list') }}" class="btn-back-restaurant">
                                <i class="fas fa-arrow-left"></i> Retour au restaurant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-navigation" data-aos="fade-up">

            <ul class="menu-nav-list">

                @foreach ($menu_resto as $menus)
                    <li class="menu-nav-item">
                        <a href="#{{ $menus->name }}" class="menu-nav-link">
                            <i class="fas fa-leaf"></i> {{ $menus->name }}
                        </a>
                    </li>
                @endforeach

                <li class="menu-nav-item">
                    <a href="{{ route('client.reservation.create', $resto->id) }}" class="menu-nav-link">
                        <i class="fas fa-wine-glass-alt"></i> Tables
                    </a>
                </li>
            </ul>
        </div>

        <x-error-layout name="error" />
        <x-success-layout key="success" />

        @if (isset($menu_resto))

            @foreach ($menu_resto as $menus)
                <section id="{{ $menus->name }}" class="menu-section" data-aos="fade-up">
                    <div class="menu-section-header">
                        <h2 class="menu-section-title">
                            <i class="fas fa-leaf"></i> {{ $menus->name }}
                        </h2>
                        <span class="menu-section-count">{{ $menus->plat->count() }} plats</span>
                    </div>

                    <div class="menu-items-grid">
                        
                        @foreach ($menus->plat as $plat)
                            
                            <div class="menu-item-card">
                                <div class="menu-item-image">
                                    <img src="{{ $path . $plat->image }}"
                                        alt="{{ $plat->name }}">
                                    <div class="menu-item-badge">
                                        <i class="fas fa-utensil-spoon"></i>
                                    </div>
                                </div>
                                <div class="menu-item-body">

                                    <div class="menu-item-header">
                                        <h3 class="menu-item-name">
                                            {{ $plat->name }}
                                        </h3>
                                        <span class="menu-item-price">
                                            {{ $plat->price }} Ar
                                        </span>
                                    </div>

                                    <p class="menu-item-description">
                                        {{ $plat->description }}
                                    </p>

                                    <form action="{{ route('client.cart.add', $plat) }}" method="post">
                                        
                                        @csrf
                                        @method("POST")

                                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                                    </form>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </section>
            @endforeach
        @else
            <h1 style="text-align: center;font-weight:800;color:white;">
                Pas de menu disponible
            </h1>
        @endif


        <div class="menu-additional-info" data-aos="fade-up">
            <div class="info-card">
                <i class="fas fa-utensils"></i>
                <h4>Service à table</h4>
                <p>Service en salle assuré par notre équipe professionnelle</p>
            </div>
            <div class="info-card">
                <i class="fas fa-truck"></i>
                <h4>Livraison disponible</h4>
                <p>Commandez votre repas en ligne et recevez-le à domicile</p>
            </div>
            <div class="info-card">
                <i class="fas fa-wifi"></i>
                <h4>Wi-Fi gratuit</h4>
                <p>Connectez-vous à notre réseau gratuit pendant votre repas</p>
            </div>
            <div class="info-card">
                <i class="fas fa-parking"></i>
                <h4>Parking privé</h4>
                <p>Parking réservé aux clients du restaurant</p>
            </div>
        </div>

        <div class="menu-back-action" data-aos="fade-up">
            <a href="" class="btn-back-large">
                <i class="fas fa-arrow-left"></i>
                Retour au restaurant
            </a>
            <a href="{{ route('resto.notice', $resto->id) }}" class="btn-order">
                <i class="fa-solid fa-comment-sms"></i>
                Avis clients
            </a>
        </div>

    </div>
</x-app-layout>
