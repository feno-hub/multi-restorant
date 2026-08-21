<x-client-layout>

    <section class="client-orders">

        <div class="client-orders-container">

            {{-- =========================
                HEADER
            ========================== --}}
            <div class="client-orders-header">

                <div class="client-orders-header-content">

                    <h1>
                        Mes commandes
                    </h1>

                    <p>
                        Retrouvez ici l'historique de toutes vos commandes
                        passées sur Multi-Resto.
                    </p>

                </div>

                <a
                    href="{{ route('client.dashboard') }}"
                    class="client-orders-header-back"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour au dashboard
                </a>

            </div>


            {{-- =========================
                STATISTIQUES
            ========================== --}}
            <div class="client-orders-stats">

                <div class="client-orders-stat">

                    <div class="client-orders-stat-icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>

                    <div>
                        <span>Total commandes</span>
                        <strong>12</strong>
                    </div>

                </div>


                <div class="client-orders-stat">

                    <div class="client-orders-stat-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div>
                        <span>Commandes terminées</span>
                        <strong>9</strong>
                    </div>

                </div>


                <div class="client-orders-stat">

                    <div class="client-orders-stat-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>

                    <div>
                        <span>En cours</span>
                        <strong>2</strong>
                    </div>

                </div>


                <div class="client-orders-stat">

                    <div class="client-orders-stat-icon">
                        <i class="fa-solid fa-xmark"></i>
                    </div>

                    <div>
                        <span>Annulées</span>
                        <strong>1</strong>
                    </div>

                </div>

            </div>


            {{-- =========================
                LISTE COMMANDES
            ========================== --}}
            <div class="client-orders-list">

                <div class="client-orders-list-header">

                    <div>

                        <span>
                            HISTORIQUE
                        </span>

                        <h2>
                            Vos dernières commandes
                        </h2>

                    </div>

                    <button type="button">
                        <i class="fa-solid fa-filter"></i>
                        Filtrer
                    </button>

                </div>


                {{-- COMMANDE 1 --}}
                <article class="client-order">

                    <div class="client-order-number">

                        <span>
                            Commande
                        </span>

                        <strong>
                            #CMD-0012
                        </strong>

                    </div>


                    <div class="client-order-restaurant">

                        <div class="client-order-restaurant-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                        <div>

                            <strong>
                                Le Gourmet
                            </strong>

                            <span>
                                Analakely, Antananarivo
                            </span>

                        </div>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Date
                        </span>

                        <strong>
                            14 Août 2026
                        </strong>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Articles
                        </span>

                        <strong>
                            3 articles
                        </strong>

                    </div>


                    <div class="client-order-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            48 000 Ar
                        </strong>

                    </div>


                    <div class="client-order-status client-order-status--completed">

                        <i class="fa-solid fa-circle-check"></i>

                        Terminée

                    </div>


                    <a
                        href="#"
                        class="client-order-action"
                    >
                        <i class="fa-solid fa-eye"></i>
                        Détails
                    </a>

                </article>


                {{-- COMMANDE 2 --}}
                <article class="client-order">

                    <div class="client-order-number">

                        <span>
                            Commande
                        </span>

                        <strong>
                            #CMD-0011
                        </strong>

                    </div>


                    <div class="client-order-restaurant">

                        <div class="client-order-restaurant-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                        <div>

                            <strong>
                                Chez Marco
                            </strong>

                            <span>
                                Behoririka, Antananarivo
                            </span>

                        </div>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Date
                        </span>

                        <strong>
                            13 Août 2026
                        </strong>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Articles
                        </span>

                        <strong>
                            2 articles
                        </strong>

                    </div>


                    <div class="client-order-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            32 000 Ar
                        </strong>

                    </div>


                    <div class="client-order-status client-order-status--pending">

                        <i class="fa-solid fa-clock"></i>

                        En cours

                    </div>


                    <a
                        href="#"
                        class="client-order-action"
                    >
                        <i class="fa-solid fa-eye"></i>
                        Détails
                    </a>

                </article>


                {{-- COMMANDE 3 --}}
                <article class="client-order">

                    <div class="client-order-number">

                        <span>
                            Commande
                        </span>

                        <strong>
                            #CMD-0010
                        </strong>

                    </div>


                    <div class="client-order-restaurant">

                        <div class="client-order-restaurant-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                        <div>

                            <strong>
                                La Terrasse
                            </strong>

                            <span>
                                Ivandry, Antananarivo
                            </span>

                        </div>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Date
                        </span>

                        <strong>
                            10 Août 2026
                        </strong>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Articles
                        </span>

                        <strong>
                            4 articles
                        </strong>

                    </div>


                    <div class="client-order-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            67 500 Ar
                        </strong>

                    </div>


                    <div class="client-order-status client-order-status--completed">

                        <i class="fa-solid fa-circle-check"></i>

                        Terminée

                    </div>


                    <a
                        href="#"
                        class="client-order-action"
                    >
                        <i class="fa-solid fa-eye"></i>
                        Détails
                    </a>

                </article>


                {{-- COMMANDE 4 --}}
                <article class="client-order">

                    <div class="client-order-number">

                        <span>
                            Commande
                        </span>

                        <strong>
                            #CMD-0009
                        </strong>

                    </div>


                    <div class="client-order-restaurant">

                        <div class="client-order-restaurant-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                        <div>

                            <strong>
                                Saveurs d'Antananarivo
                            </strong>

                            <span>
                                Ambohimanarina
                            </span>

                        </div>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Date
                        </span>

                        <strong>
                            08 Août 2026
                        </strong>

                    </div>


                    <div class="client-order-info">

                        <span>
                            Articles
                        </span>

                        <strong>
                            1 article
                        </strong>

                    </div>


                    <div class="client-order-total">

                        <span>
                            Total
                        </span>

                        <strong>
                            18 000 Ar
                        </strong>

                    </div>


                    <div class="client-order-status client-order-status--cancelled">

                        <i class="fa-solid fa-circle-xmark"></i>

                        Annulée

                    </div>


                    <a
                        href="#"
                        class="client-order-action"
                    >
                        <i class="fa-solid fa-eye"></i>
                        Détails
                    </a>

                </article>

            </div>


            {{-- =========================
                RETOUR DASHBOARD
            ========================== --}}
            <div class="client-orders-footer">

                <a
                    href="{{ route('client.dashboard') }}"
                    class="client-orders-footer-button"
                >

                    <i class="fa-solid fa-arrow-left"></i>

                    Retour à mon dashboard

                </a>

            </div>

        </div>

    </section>

</x-client-layout>