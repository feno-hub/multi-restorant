<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="container-home">

        <section class="home-hero">
            
            <video class="home-hero-video" autoplay muted loop playsinline>
                <source src="{{ asset('/assets/videos/cuisinier.mp4') }}" type="video/mp4">
            </video>
            
            <div class="home-hero-overlay"></div>

            <div class="home-hero-content">
                
                <span class="home-hero-badge" data-aos="fade-up">
                    Votre plateforme multi-restaurants
                </span>

                <h1 data-aos="fade-up" data-aos-delay="100">
                    Découvrez les meilleurs restaurants et savourez vos plats
                    préférés
                </h1>

                <p data-aos="fade-up" data-aos-delay="200">
                    Explorez une sélection de restaurants, découvrez de nouvelles
                    saveurs et profitez d'une expérience simple et agréable.
                </p>

                <div class="home-hero-buttons" data-aos="fade-up" data-aos-delay="300">
                    <a href="{{ route('resto.list') }}" class="home-btn home-btn-primary">
                        Découvrir les restaurants
                    </a>
                    <a href="{{ route('menu.index') }}" class="home-btn home-btn-secondary">
                        Explorer les menus
                    </a>
                </div>

            </div>
        </section>

        <section class="home-advantages section-padding">
            <div class="container">
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Pourquoi choisir Multi-Resto ?</span>
                    <h2 class="home-section-title">Une expérience culinaire <br>pensée pour vous</h2>
                </div>

                <div class="home-advantages-grid">
                    <div class="home-advantage-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="home-advantage-icon"><i class="fa-solid fa-utensils"></i></div>
                        <h3>Large choix</h3>
                        <p>Plusieurs restaurants réunis sur une seule plateforme.</p>
                    </div>
                    <div class="home-advantage-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="home-advantage-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                        <h3>Commande facile</h3>
                        <p>Trouvez vos plats préférés et commandez simplement.</p>
                    </div>
                    <div class="home-advantage-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="home-advantage-icon"><i class="fa-solid fa-calendar-check"></i></div>
                        <h3>Réservation rapide</h3>
                        <p>Réservez facilement une table dans votre restaurant préféré.</p>
                    </div>
                    <div class="home-advantage-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="home-advantage-icon"><i class="fa-solid fa-star"></i></div>
                        <h3>Expérience agréable</h3>
                        <p>Une plateforme pensée pour rendre votre expérience simple et rapide.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-restaurants section-padding">
            <div class="container">
                
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Nos restaurants</span>
                    <h2 class="home-section-title">Découvrez nos <br>restaurants populaires</h2>
                </div>

                @if ($forResto)
                    <div class="home-restaurants-grid">

                        @foreach ($forResto as $resto)
                            <div class="home-restaurant-card" data-aos="fade-up" data-aos-delay="100">
                                
                                <div class="home-restaurant-image">
                                    <img src="{{ $path . $resto->cover }}"
                                        alt="Le Jardin des Saveurs">
                                    <span class="home-restaurant-badge">
                                        {{ $resto->category }}
                                    </span>
                                </div>

                                <div class="home-restaurant-body">
                                    <h3>
                                        {{ $resto->name }}
                                    </h3>
                                    <p class="home-restaurant-location">
                                        <i class="fa-solid fa-location-dot"></i> 
                                        {{ $resto->city }}
                                    </p>
                                    <div class="home-restaurant-rating">
                                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                            class="fa-solid fa-star"></i>
                                        <span>4.8</span>
                                    </div>
                                    <a href="{{ route('resto.show', $resto->id) }}" class="home-btn home-btn-outline">
                                        Voir le restaurant
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                     <span class="home-section-subtitle">Aucun restaurant disponible</span>                   
                @endif

            </div>
        </section>

        <section class="home-categories">
            <div class="container">
                
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Catégories</span>
                    <h2 class="home-section-title">Que souhaitez-vous <br>manger ?</h2>
                </div>

                @if ($sixCategory)
                    <div class="home-categories-grid">
                        @foreach ($sixCategory as $categories)
                            <div class="home-category-card" data-aos="zoom-in" data-aos-delay="350">
                                <i class="fa-solid fa-utensils"></i>
                                <span>
                                    {{ $categories->category }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </section>

        <section class="home-dishes section-padding">
            <div class="container">
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Nos plats</span>
                    <h2 class="home-section-title">Les plats les plus <br>appréciés</h2>
                </div>

                @if ($threePlat)
                    <div class="home-dishes-grid">

                        @foreach ($threePlat as $plat)
                            <div class="home-dish-card" data-aos="fade-up" data-aos-delay="100">
                                <div class="home-dish-image">
                                    <img src="{{ $path . $plat->image }}" alt="Burger Gourmet">
                                </div>
                                <div class="home-dish-body">
                                    
                                    <h3>
                                        {{ $plat->name }}
                                    </h3>

                                    <p class="home-dish-restaurant">
                                        {{ $plat->menu->resto->name }}
                                    </p>

                                    <p class="home-dish-description">
                                        {{ $plat->description }}
                                    </p>
                                    <div class="home-dish-footer">
                                        <span class="home-dish-price">
                                            {{ $plat->price }} Ar
                                        </span>
                                        
                                        <form 
                                            action="{{ route('client.cart.add', $plat) }}" 
                                            method="post"
                                        >
                                            @csrf
                                            @method("POST")

                                            <button type="submit" class="home-btn home-btn-primary home-btn-sm">
                                                Ajouter au panier
                                            </button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                @else
                    
                @endif
            </div>
        </section>

        <section class="home-steps">
            <div class="container">
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Comment ça marche</span>
                    <h2 class="home-section-title">Votre repas en <br>quelques étapes</h2>
                </div>

                <div class="home-steps-wrapper">
                    <div class="home-step" data-aos="fade-right" data-aos-delay="100">
                        <div class="home-step-number">01</div>
                        <div class="home-step-content">
                            <h3>Choisissez votre restaurant</h3>
                            <p>Parcourez notre sélection et trouvez l'inspiration.</p>
                        </div>
                    </div>
                    <div class="home-step" data-aos="fade-right" data-aos-delay="200">
                        <div class="home-step-number">02</div>
                        <div class="home-step-content">
                            <h3>Explorez le menu</h3>
                            <p>Découvrez les plats proposés par chaque restaurant.</p>
                        </div>
                    </div>
                    <div class="home-step" data-aos="fade-right" data-aos-delay="300">
                        <div class="home-step-number">03</div>
                        <div class="home-step-content">
                            <h3>Passez votre commande</h3>
                            <p>Ajoutez vos plats au panier et validez en quelques clics.</p>
                        </div>
                    </div>
                    <div class="home-step" data-aos="fade-right" data-aos-delay="400">
                        <div class="home-step-number">04</div>
                        <div class="home-step-content">
                            <h3>Profitez de votre repas</h3>
                            <p>Dégustez vos plats préférés confortablement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-testimonials section-padding">
            <div class="container">
                <div class="home-section-header" data-aos="fade-up">
                    <span class="home-section-subtitle">Témoignages</span>
                    <h2 class="home-section-title">Ils parlent de <br>Multi-Resto</h2>
                </div>

                <div class="home-testimonials-grid">
                    <div class="home-testimonial-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="home-testimonial-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                        </div>
                        <p class="home-testimonial-text">"Une plateforme très pratique pour découvrir de nouveaux
                            restaurants."</p>
                        <div class="home-testimonial-author">
                            <img src="{{ asset('assets/images/avatars/avatar-1.jpg') }}" alt="Sarah">
                            <div>
                                <strong>Sarah</strong>
                                <span>Client régulier</span>
                            </div>
                        </div>
                    </div>
                    <div class="home-testimonial-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="home-testimonial-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                        </div>
                        <p class="home-testimonial-text">"J'ai trouvé facilement mon restaurant préféré et la commande
                            était simple."</p>
                        <div class="home-testimonial-author">
                            <img src="{{ asset('assets/images/avatars/avatar-2.jpg') }}" alt="Jonathan">
                            <div>
                                <strong>Jonathan</strong>
                                <span>Amateur de cuisine</span>
                            </div>
                        </div>
                    </div>
                    <div class="home-testimonial-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="home-testimonial-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                        </div>
                        <p class="home-testimonial-text">"Une très belle expérience, avec beaucoup de choix."</p>
                        <div class="home-testimonial-author">
                            <img src="{{ asset('assets/images/avatars/avatar-3.jpg') }}" alt="Marie">
                            <div>
                                <strong>Marie</strong>
                                <span>Gourmande</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="home-cta">
            <div class="home-cta-content" data-aos="zoom-in">
                <h2>
                    Votre prochaine expérience culinaire commence ici
                </h2>

                <p>
                    Découvrez de nouveaux restaurants, explorez leurs menus et profitez pleinement de vos repas.
                </p>

                <div class="home-cta-buttons">
                    <a href="{{ route('resto.list') }}" class="home-btn home-btn-cta-primary">
                        Découvrir les restaurants
                    </a>
                    <a href="{{ route('menu.index') }}" class="home-btn home-btn-cta-secondary">
                        Explorer les menus
                    </a>
                </div>

            </div>
        </section>

    </div>

</x-app-layout>
