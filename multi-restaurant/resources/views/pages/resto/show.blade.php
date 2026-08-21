<x-app-layout>
    @php
        $path = '/storage/'
    @endphp

    <div class="menu-detail-page">

        <!-- Fil d'Ariane -->
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

        <!-- En-tête du restaurant -->
        <div class="restaurant-header" data-aos="fade-up">
            <div class="restaurant-header-image">
                <img src="{{ $path . $resto->cover }}"
                    alt="Le Petit Bistro">
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

        <!-- Navigation du menu -->
        <div class="menu-navigation" data-aos="fade-up">
            <ul class="menu-nav-list">
                <li class="menu-nav-item active">
                    <a href="#entrees" class="menu-nav-link">
                        <i class="fas fa-leaf"></i> Entrées
                    </a>
                </li>
                <li class="menu-nav-item">
                    <a href="#plats" class="menu-nav-link">
                        <i class="fas fa-utensils"></i> Plats principaux
                    </a>
                </li>
                <li class="menu-nav-item">
                    <a href="#desserts" class="menu-nav-link">
                        <i class="fas fa-cake"></i> Desserts
                    </a>
                </li>
                <li class="menu-nav-item">
                    <a href="#boissons" class="menu-nav-link">
                        <i class="fas fa-wine-glass-alt"></i> Boissons
                    </a>
                </li>
                <li class="menu-nav-item">
                    <a href="{{ route('resto.reservation', $resto->id ) }}" class="menu-nav-link">
                        <i class="fas fa-wine-glass-alt"></i> Tables
                    </a>
                </li>
            </ul>
        </div>

        <!-- Section Entrées -->
        <section id="entrees" class="menu-section" data-aos="fade-up">
            <div class="menu-section-header">
                <h2 class="menu-section-title">
                    <i class="fas fa-leaf"></i> Entrées
                </h2>
                <span class="menu-section-count">6 plats</span>
            </div>

            <div class="menu-items-grid">
                <!-- Plat 1 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=250&fit=crop"
                            alt="Soupe à l'oignon">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Soupe à l'oignon</h3>
                            <span class="menu-item-price">€12.50</span>
                        </div>
                        <p class="menu-item-description">
                            Soupe traditionnelle à l'oignon gratinée avec du fromage Comté, servie avec des croûtons.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Entrée chaude
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 320 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 2 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=400&h=250&fit=crop"
                            alt="Salade César">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Salade César</h3>
                            <span class="menu-item-price">€14.00</span>
                        </div>
                        <p class="menu-item-description">
                            Laitue romaine, poulet grillé, parmesan, croûtons et sauce César maison.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Entrée froide
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 450 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 3 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?w=400&h=250&fit=crop"
                            alt="Foie gras">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Foie gras poêlé</h3>
                            <span class="menu-item-price">€18.50</span>
                        </div>
                        <p class="menu-item-description">
                            Foie gras frais poêlé, servi avec un chutney de figues et pain d'épices.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Entrée chaude
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 520 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Plats principaux -->
        <section id="plats" class="menu-section" data-aos="fade-up">
            <div class="menu-section-header">
                <h2 class="menu-section-title">
                    <i class="fas fa-utensils"></i> Plats principaux
                </h2>
                <span class="menu-section-count">8 plats</span>
            </div>

            <div class="menu-items-grid">
                <!-- Plat 1 -->
                <div class="menu-item-card featured">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=400&h=250&fit=crop"
                            alt="Boeuf Bourguignon">
                        <div class="menu-item-badge featured-badge">
                            <i class="fas fa-crown"></i> Plat signature
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Bœuf Bourguignon</h3>
                            <span class="menu-item-price">€24.50</span>
                        </div>
                        <p class="menu-item-description">
                            Bœuf mijoté dans du vin rouge, accompagné de champignons, oignons et pommes de terre.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Plat principal
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 680 kcal
                            </span>

                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 2 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1551326844-4df70f78d0e1?w=400&h=250&fit=crop"
                            alt="Saumon grillé">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Saumon grillé</h3>
                            <span class="menu-item-price">€22.00</span>
                        </div>
                        <p class="menu-item-description">
                            Saumon frais grillé, sauce beurre citronné, servi avec des légumes de saison.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Plat principal
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 520 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 3 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1555949258-eb67b1ef0ce4?w=400&h=250&fit=crop"
                            alt="Magret de canard">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Magret de canard</h3>
                            <span class="menu-item-price">€26.00</span>
                        </div>
                        <p class="menu-item-description">
                            Magret de canard rôti, sauce au miel et aux épices, servi avec des pommes de terre.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Plat principal
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 750 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 4 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1514326640560-7d063ef2aed5?w=400&h=250&fit=crop"
                            alt="Pâtes fraîches">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Pâtes fraîches</h3>
                            <span class="menu-item-price">€19.00</span>
                        </div>
                        <p class="menu-item-description">
                            Pâtes fraîches maison, sauce tomate-basilic et parmesan râpé.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Plat principal
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 580 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Desserts -->
        <section id="desserts" class="menu-section" data-aos="fade-up">
            <div class="menu-section-header">
                <h2 class="menu-section-title">
                    <i class="fas fa-cake"></i> Desserts
                </h2>
                <span class="menu-section-count">5 plats</span>
            </div>

            <div class="menu-items-grid">
                <!-- Plat 1 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=250&fit=crop"
                            alt="Crème brûlée">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Crème brûlée</h3>
                            <span class="menu-item-price">€10.50</span>
                        </div>
                        <p class="menu-item-description">
                            Crème vanille onctueuse avec une fine couche de caramel croustillant.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Dessert
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 380 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 2 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9588?w=400&h=250&fit=crop"
                            alt="Tarte au citron">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Tarte au citron</h3>
                            <span class="menu-item-price">€9.50</span>
                        </div>
                        <p class="menu-item-description">
                            Tarte citron meringuée, croustillante et acidulée.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Dessert
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 320 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Plat 3 -->
                <div class="menu-item-card">
                    <div class="menu-item-image">
                        <img src="https://images.unsplash.com/photo-1587314168486-3d6d6f7d1ae4?w=400&h=250&fit=crop"
                            alt="Fondant au chocolat">
                        <div class="menu-item-badge">
                            <i class="fas fa-utensil-spoon"></i>
                        </div>
                    </div>
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Fondant au chocolat</h3>
                            <span class="menu-item-price">€11.00</span>
                        </div>
                        <p class="menu-item-description">
                            Fondant au chocolat noir, cœur coulant, servi avec une boule de glace vanille.
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Dessert
                            </span>
                            <span class="menu-item-calories">
                                <i class="fas fa-fire"></i> 450 kcal
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Boissons -->
        <section id="boissons" class="menu-section" data-aos="fade-up">
            <div class="menu-section-header">
                <h2 class="menu-section-title">
                    <i class="fas fa-wine-glass-alt"></i> Boissons
                </h2>
                <span class="menu-section-count">8 plats</span>
            </div>

            <div class="menu-items-grid drinks-grid">
                <!-- Boisson 1 -->
                <div class="menu-item-card drink-item">
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Vin rouge</h3>
                            <span class="menu-item-price">€6.00</span>
                        </div>
                        <p class="menu-item-description">
                            Bordeaux rouge, millésime 2020, 12.5°
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Vin
                            </span>
                            <span class="menu-item-volume">
                                <i class="fas fa-flask"></i> 12.5 cl
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Boisson 2 -->
                <div class="menu-item-card drink-item">
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Vin blanc</h3>
                            <span class="menu-item-price">€6.00</span>
                        </div>
                        <p class="menu-item-description">
                            Chardonnay, millésime 2021, 11.5°
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Vin
                            </span>
                            <span class="menu-item-volume">
                                <i class="fas fa-flask"></i> 12.5 cl
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Boisson 3 -->
                <div class="menu-item-card drink-item">
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Champagne</h3>
                            <span class="menu-item-price">€12.00</span>
                        </div>
                        <p class="menu-item-description">
                            Champagne Brut, cuvée prestige, 12°
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Champagne
                            </span>
                            <span class="menu-item-volume">
                                <i class="fas fa-flask"></i> 10 cl
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>

                <!-- Boisson 4 -->
                <div class="menu-item-card drink-item">
                    <div class="menu-item-body">
                        <div class="menu-item-header">
                            <h3 class="menu-item-name">Jus de fruits</h3>
                            <span class="menu-item-price">€4.50</span>
                        </div>
                        <p class="menu-item-description">
                            Jus d'orange ou de pomme, frais pressé
                        </p>
                        <div class="menu-item-footer">
                            <span class="menu-item-category">
                                <i class="fas fa-tag"></i> Jus
                            </span>
                            <span class="menu-item-volume">
                                <i class="fas fa-flask"></i> 25 cl
                            </span>
                        </div>
                        <x-btnsecondary-layout icon="fa-solid fa-cart-arrow-down" btn="Ajouter au panier" />
                    </div>
                </div>
            </div>
        </section>

        <!-- Informations complémentaires -->
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

        <!-- Bouton retour -->
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
