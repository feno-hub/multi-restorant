<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="container-home">


        {{-- HEADER --}}
        <header class="container-home-header">

            <div class="header-parent">
                <h1 class="header-parent-title">multi-restaurants</h1>
                <p class="header-parent-para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quas quidem exercitationem nemo
                    aperiam vero, officia odio asperiores a quaerat?
                </p>
                <div class="header-parent-button">
                    <a href="{{ route('resto.list') }}" class="button-resto">
                        restaurants
                    </a>
                    <a href="{{ route('menu.index') }}" class="button-menu">
                        menu
                    </a>
                </div>
            </div>

            <video class="header-parent-video" autoplay muted loop playsinline>
                <source src="{{ asset('/assets/videos/cuisinier.mp4') }}" type="video/mp4">
            </video>

            <div class="header-parent-overlay"></div>


        </header>

        {{-- RESTAURANTS EN VEDETTE --}}
        <section class="container-home-section1">
            @if (isset($restos))
                <h2 class="container-home-section1-title">Restaurants en vedette</h2>

                <div class="container-home-section1-card">

                    @foreach ($restos as $resto)
                        <div class="container-home-section1-card-link">
                            <div class="container-home-section1-card-link-image">
                                <img src="{{ $path . $resto->cover }}" alt="Le Bistrot" loading="lazy"
                                    class="container-home-section1-card-link-image-img">
                            </div>
                            <div class="container-home-section1-card-link-about">
                                <h3 class="container-home-section1-card-link-about-name">
                                    {{ $resto->name }}
                                </h3>
                                <div class="container-home-section1-card-link-about-cuisine">
                                    <span class="container-home-section1-card-link-about-cuisine-icon">
                                        <i class="fa-solid fa-bell-concierge"></i>
                                    </span>
                                    <span class="container-home-section1-card-link-about-cuisine-type">
                                        {{ $resto->category }}
                                    </span>
                                </div>
                            </div>

                            <hr>

                            <div class="container-home-section1-card-link-stat">
                                <span class="container-home-section1-card-link-stat-note">
                                    <i class="fa-solid fa-thumbs-up"></i>
                                    (230)
                                </span>
                                <span class="container-home-section1-card-link-stat-time">
                                    {{ $resto->open_time }} -> {{ $resto->close_time }}
                                </span>
                            </div>
                            <a href="{{ route('resto.show', $resto->id) }}"
                                class="container-home-section1-card-link-lien">
                                <x-btnprimary-layout icon="fa-solid fa-utensils" btn="Voir profil" />
                            </a>
                        </div>
                    @endforeach

                </div>
                <div class="container-home-section1-lien">
                    <a href="{{ route('resto.list') }}">
                        <x-btnsecondary-layout btn="Explorer" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>
            @endif
        </section>

        {{-- AVANTAGES --}}

        <section class="container-home-section2">

            <h1 class="container-home-section2-title" data-aos="fade-right" data-aos-offset="300"
                data-aos-easing="ease-in-sine">
                ✨ Quelques avantages
            </h1>

            <div class="container-home-section2-card">
                <div class="container-home-section2-card-link">
                    <span class="container-home-section2-card-link-icon">
                        <i class="fa-regular fa-credit-card"></i>
                    </span>
                    <h6 class="container-home-section2-card-link-title">Paiement sécurisé</h6>
                </div>
                <div class="container-home-section2-card-link">
                    <span class="container-home-section2-card-link-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </span>
                    <h6 class="container-home-section2-card-link-title">Commande rapide</h6>
                </div>
                <div class="container-home-section2-card-link">
                    <span class="container-home-section2-card-link-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </span>
                    <h6 class="container-home-section2-card-link-title">Suivi en temps réel</h6>
                </div>
                <div class="container-home-section2-card-link">
                    <span class="container-home-section2-card-link-icon">
                        <i class="fa-regular fa-star"></i>
                    </span>
                    <h6 class="container-home-section2-card-link-title">Restaurants vérifiés</h6>
                </div>
            </div>
        </section>

        {{-- MEILLEURS PLATS --}}
        <section class="container-home-section3">
            <h2 class="container-home-section3-title">Les meilleurs plats</h2>
            @if (!isset($menus))

                <div class="container-home-section3-card">

                    {{-- Plat --}}
                    @foreach ($menus as $menu)
                        <div class="container-home-section3-card-link">
                            <div class="container-home-section3-card-link-image">
                                <a href="#">
                                    <img src="{{ $path . $menu->image }}" alt="Pizza Margherita"
                                        class="container-home-section3-card-link-image-img">
                                </a>
                            </div>
                            <div class="container-home-section3-card-link-content">
                                <h3 class="container-home-section3-card-link-content-name">
                                    {{ $menu->name }}
                                </h3>
                                <span class="container-home-section3-card-link-content-price">
                                    {{ $menu->price }} Ar
                                </span>
                                <h5 class="container-home-section3-card-link-content-restaurant">
                                    {{-- {{ $menu->resto->name }} --}}
                                    Nom du resto
                                </h5>
                                <form action="#" class="container-home-section3-card-link-content-btn">
                                    <x-btnprimary-layout icon="fa-solid fa-cart-shopping" btn="Ajouter au panier" />
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="container-home-section3-btn">
                    <a href="">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>
            @endif

        </section>

        {{-- ABONNEMENT --}}
        <section class="container-home-section4">
            <h1 class="container-home-section4-title"> Abonnez vous</h1>
            <div class="container-home-section4-content">
                <strong class="container-home-section4-content-subtitle">
                    Développez votre restaurant avec Multi-Resto
                </strong>
                <strong class="container-home-section4-content-subtitle">
                    Choisissez l'offre adaptée à vos besoins.
                </strong>
                <div class="container-home-section4-content-form">

                    <a href="{{ route('subscription.index') }}">
                        <x-btnsecondary-layout icon="fa-solid fa-paper-plane" btn="Voir les abonnements" />
                    </a>


                </div>

            </div>

        </section>

    </div>

</x-app-layout>
