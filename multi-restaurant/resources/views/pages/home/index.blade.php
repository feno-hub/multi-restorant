<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="container-home">


        <header class="hero">
            <div class="hero-slider">
                <div class="hero-slide">
                    <img src="{{ asset('assets/images/resto/table1.jpg') }}" alt="Restaurant">
                </div>

                <div class="hero-slide">
                    <img src="{{ asset('assets/images/resto/menu1.jpg') }}" alt="Plat">
                </div>

                <div class="hero-slide">
                    <img src="{{ asset('assets/images/resto/resto1.jpg') }}" alt="Cuisine">
                </div>
            </div>

            <div class="hero-content">
                <h1 class="font-bold title">Bienvenue sur MultiResto</h1>
                <p>Découvrez les meilleurs restaurants</p>
                <a href="{{ route('resto.list') }}" class="hero-btn">Découvrir</a>
            </div>
        </header>


        <section class="container-home-section1">
            @if ($restos)
                <h2 class="container-home-section1-title">Restaurants en vedette</h2>

                <div class="container-home-section1-card">

                    @foreach ($restos as $resto)
                        <div class="m-h-[50vh] flex-1 rounded-2xl overflow-hidden shadow-2xl shadow-black">

                            <div class="h-[25vh]">
                                <img src="{{ $path . $resto->cover }}" alt="Le Bistrot" loading="lazy"
                                    class="h-full w-full object-cover">
                            </div>

                            <div class="content">

                                <h1 class="text-white font-bold text-[1.5rem]">
                                    {{ $resto->name }}
                                </h1>

                                <p class="text-yellow-500">
                                    <i class="fa-solid fa-utensils"></i>
                                    {{ $resto->category }}
                                </p>

                                <p class="text-white">
                                    {{ $resto->description }}
                                </p>

                                <a href="{{ route('resto.show', $resto->id) }}" class="text-yellow-500 font-bold">
                                    voir profile <i class="fa-solid fa-arrow-right"></i>
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
            @else
                <h1 class="">
                    pas de restaurant disponible
                </h1>
            @endif
        </section>



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


        @if ($threePlat)
            <section class="container-home-section3">
                <h2 class="container-home-section3-title">Les meilleurs plats</h2>

                <div class="container-home-section3-card">

                    @foreach ($threePlat as $plat)
                        <div class="content flex items-start h-[40vh] shadow-black rounded-2xl overflow-hidden flex-1">
                            <div class="h-full flex-1">
                                <a href="#">
                                    <img src="{{ $path . $plat->image }}" alt="Pizza Margherita"
                                        class="w-full h-full object-cover">
                                </a>
                            </div>

                            <div class="flex-1 info">
                                <h3 class="font-bold text-white capitalize text-[1.5rem]">
                                    {{ $plat->name }}
                                </h3>

                                <span class="text-white font-light text-[13px] mt-3 mb-5">
                                    {{ $plat->description }}
                                </span>

                                <strong class="text-white block">
                                    {{ $plat->price }} Ar
                                </strong>

                                <form action="{{ route('client.cart.add', $plat) }}" method="POST">

                                    @csrf
                                    @method('POST')

                                    <button type="submit"
                                        class="text-yellow-500 font-bold border-2 border-yellow-500 p-2 rounded-2xl lien cursore-pointer">
                                        Ajouté au panier
                                    </button>

                                </form>

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
