<x-client-layout>

    <div class="favorites-page">

        <div class="favorites-container">

            {{-- =========================
                 HEADER
            ========================== --}}

            <div class="favorites-header">

                <div class="favorites-title">

                    <span class="favorites-icon">
                        <i class="fa-solid fa-heart"></i>
                    </span>

                    <div>
                        <h1>Mes favoris</h1>

                        <p>
                            Retrouvez les restaurants que vous avez ajoutés à vos favoris.
                        </p>
                    </div>

                </div>

                <a
                    href="{{ route('client.dashboard') }}"
                    class="btn-back"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>

            </div>


            {{-- =========================
                 NOMBRE DE FAVORIS
            ========================== --}}

            <div class="favorites-count">

                <i class="fa-solid fa-heart"></i>

                <span>
                    3 restaurants favoris
                </span>

            </div>


            {{-- =========================
                 LISTE DES FAVORIS
            ========================== --}}

            <div class="favorites-list">


                {{-- FAVORI 1 --}}
                <div class="favorite-card">

                    <div class="favorite-image">

                        <img
                            src="{{ asset('assets/images/restaurants/restaurant-1.jpg') }}"
                            alt="Chez Mamy"
                        >

                        <button
                            type="button"
                            class="favorite-btn"
                            title="Retirer des favoris"
                        >
                            <i class="fa-solid fa-heart"></i>
                        </button>

                    </div>


                    <div class="favorite-content">

                        <div class="favorite-top">

                            <div>

                                <h2>Chez Mamy</h2>

                                <span class="favorite-category">
                                    Restaurant Malagasy
                                </span>

                            </div>

                            <span class="favorite-status">
                                Ouvert
                            </span>

                        </div>


                        <div class="favorite-info">

                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                Analakely, Antananarivo
                            </p>

                            <p>
                                <i class="fa-solid fa-phone"></i>
                                +261 34 12 345 67
                            </p>

                        </div>


                        <div class="favorite-rating">

                            <span>
                                <i class="fa-solid fa-star"></i>
                                <strong>4.8</strong>
                            </span>

                            <small>
                                125 avis
                            </small>

                        </div>


                        <div class="favorite-actions">

                            <a href="#" class="btn-view">
                                <i class="fa-solid fa-eye"></i>
                                Voir le restaurant
                            </a>

                            <a href="#" class="btn-order">
                                <i class="fa-solid fa-utensils"></i>
                                Voir le menu
                            </a>

                        </div>

                    </div>

                </div>


                {{-- FAVORI 2 --}}
                <div class="favorite-card">

                    <div class="favorite-image">

                        <img
                            src="{{ asset('assets/images/restaurants/restaurant-2.jpg') }}"
                            alt="Pizza House"
                        >

                        <button
                            type="button"
                            class="favorite-btn"
                            title="Retirer des favoris"
                        >
                            <i class="fa-solid fa-heart"></i>
                        </button>

                    </div>


                    <div class="favorite-content">

                        <div class="favorite-top">

                            <div>

                                <h2>Pizza House</h2>

                                <span class="favorite-category">
                                    Pizzeria
                                </span>

                            </div>

                            <span class="favorite-status">
                                Ouvert
                            </span>

                        </div>


                        <div class="favorite-info">

                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                Behoririka, Antananarivo
                            </p>

                            <p>
                                <i class="fa-solid fa-phone"></i>
                                +261 32 45 678 90
                            </p>

                        </div>


                        <div class="favorite-rating">

                            <span>
                                <i class="fa-solid fa-star"></i>
                                <strong>4.6</strong>
                            </span>

                            <small>
                                98 avis
                            </small>

                        </div>


                        <div class="favorite-actions">

                            <a href="#" class="btn-view">
                                <i class="fa-solid fa-eye"></i>
                                Voir le restaurant
                            </a>

                            <a href="#" class="btn-order">
                                <i class="fa-solid fa-utensils"></i>
                                Voir le menu
                            </a>

                        </div>

                    </div>

                </div>


                {{-- FAVORI 3 --}}
                <div class="favorite-card">

                    <div class="favorite-image">

                        <img
                            src="{{ asset('assets/images/restaurants/restaurant-3.jpg') }}"
                            alt="Grill 261"
                        >

                        <button
                            type="button"
                            class="favorite-btn"
                            title="Retirer des favoris"
                        >
                            <i class="fa-solid fa-heart"></i>
                        </button>

                    </div>


                    <div class="favorite-content">

                        <div class="favorite-top">

                            <div>

                                <h2>Grill 261</h2>

                                <span class="favorite-category">
                                    Grill
                                </span>

                            </div>

                            <span class="favorite-status closed">
                                Fermé
                            </span>

                        </div>


                        <div class="favorite-info">

                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                Ivandry, Antananarivo
                            </p>

                            <p>
                                <i class="fa-solid fa-phone"></i>
                                +261 33 56 789 01
                            </p>

                        </div>


                        <div class="favorite-rating">

                            <span>
                                <i class="fa-solid fa-star"></i>
                                <strong>4.4</strong>
                            </span>

                            <small>
                                74 avis
                            </small>

                        </div>


                        <div class="favorite-actions">

                            <a href="#" class="btn-view">
                                <i class="fa-solid fa-eye"></i>
                                Voir le restaurant
                            </a>

                            <a href="#" class="btn-order">
                                <i class="fa-solid fa-utensils"></i>
                                Voir le menu
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                 AUCUN FAVORI
            ========================== --}}

            <!--
            <div class="empty-favorites">

                <div class="empty-icon">
                    <i class="fa-regular fa-heart"></i>
                </div>

                <h2>Aucun favori</h2>

                <p>
                    Vous n'avez pas encore ajouté de restaurant à vos favoris.
                </p>

                <a href="#" class="btn-discover">
                    <i class="fa-solid fa-utensils"></i>
                    Découvrir les restaurants
                </a>

            </div>
            -->

        </div>

    </div>

</x-client-layout>