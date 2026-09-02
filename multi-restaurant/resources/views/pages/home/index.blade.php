<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="container-home">


        <header class="container-home-header">

            <div class="header-parent">
                <h1 class="header-parent-title">
                    Découvrez vos réstaurants préférer
                </h1>
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

            <div class="header-parent-image">
                <img src="{{ asset('assets/images/resto/table1.jpg') }}" alt="">
            </div>

            <div class="header-parent-overlay"></div>


        </header>

        @if (isset($restos))
            <section class="container-home-section1">
                <h2 class="container-home-section1-title">Restaurants en vedette</h2>

                <div class="container-home-section1-card">

                    @foreach ($restos as $resto)
                        <div class="container-home-section1-card-link">

                            <div class="container-home-section1-card-link-image">
                                <img src="{{ $path . $resto->cover }}" alt="Le Bistrot" loading="lazy"
                                    class="container-home-section1-card-link-image-img">
                            </div>

                            <div class="about">

                                <div class="content">
                                    <h1>
                                        {{ $resto->name }}
                                    </h1>

                                    <p>
                                        <i class="fa-solid fa-utensils"></i>
                                        {{ $resto->category }}
                                    </p>

                                    <span>
                                        {{ $resto->open_time }} =>
                                        {{ $resto->close_time }}
                                    </span>


                                </div>

                                <a href="{{ route('resto.show', $resto->id) }}">
                                    <x-btnsecondary-layout btn="Voir profile" />
                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>
                <div class="container-home-section1-lien">
                    <a href="{{ route('resto.list') }}">
                        <x-btnsecondary-layout btn="Explorer" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>
            </section>
        @endif


        <section class="container-home-section2">

            <h1 class="container-home-section2-title">
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


        @if (isset($plats))
            <section class="container-home-section3">
                <h2 class="container-home-section3-title">Les meilleurs plats</h2>

                <div class="container-home-section3-card">

                    @foreach ($plats as $plat)
                        <div class="container-home-section3-card-link">
                            <div class="container-home-section3-card-link-image">
                                <a href="#">
                                    <img src="{{ $path . $plat->image }}" alt="Pizza Margherita"
                                        class="container-home-section3-card-link-image-img">
                                </a>
                            </div>
                            <div class="container-home-section3-card-link-content">
                                <h3 class="container-home-section3-card-link-content-name">
                                    {{ $plat->name }}
                                </h3>
                                <span class="container-home-section3-card-link-content-restaurant">
                                    {{ $plat->description }}
                                </span>
                            </div>

                            <div class=""
                                style="display: flex; justify-content:center;align-items:center; padding:1rem;">
                                <a href="{{ route('menu.index') }}">
                                    <x-btnprimary-layout btn='Voir détail' />
                                </a>
                            </div>

                        </div>
                    @endforeach

                </div>
                <div class="container-home-section3-btn">
                    <a href="{{ route('menu.index') }}">
                        <x-btnsecondary-layout btn="Voir tous" icon="fa-solid fa-arrow-right" />
                    </a>
                </div>

            </section>
        @endif

        {{-- <section class="container-home-section4">
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

        </section> --}}

    </div>

</x-app-layout>
