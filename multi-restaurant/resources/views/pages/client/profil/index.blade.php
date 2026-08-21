
<x-client-layout>

    <section class="client-profile">

        {{-- En-tête du profil --}}
        <div class="client-profile__header">

            <div class="client-profile__header-content">

                <div class="client-profile__avatar">
                    <img src="{{ asset('assets/images/client.jpg') }}"
                         alt="Photo de profil">
                </div>

                <div class="client-profile__identity">

                    <h1>Jean Dupont</h1>

                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        jean.dupont@gmail.com
                    </p>

                    <span class="client-profile__status">
                        <i class="fa-solid fa-circle"></i>
                        Client actif
                    </span>

                </div>

            </div>


            <div class="client-profile__actions">

                <a href="{{ route('client.profil.edit') }}" class="client-profile__btn client-profile__btn--edit">
                    <i class="fa-solid fa-pen"></i>
                    Modifier le profil
                </a>

                <a href="{{ route('client.dashboard') }}" class="client-profile__btn client-profile__btn--password">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>

            </div>

        </div>


        {{-- Statistiques --}}
        <div class="client-profile__stats">

            <div class="client-profile__stat">

                <div class="client-profile__stat-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <div>
                    <span class="client-profile__stat-number">
                        24
                    </span>

                    <span class="client-profile__stat-label">
                        Commandes
                    </span>
                </div>

            </div>


            <div class="client-profile__stat">

                <div class="client-profile__stat-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div>
                    <span class="client-profile__stat-number">
                        8
                    </span>

                    <span class="client-profile__stat-label">
                        Réservations
                    </span>
                </div>

            </div>


            <div class="client-profile__stat">

                <div class="client-profile__stat-icon">
                    <i class="fa-solid fa-heart"></i>
                </div>

                <div>
                    <span class="client-profile__stat-number">
                        12
                    </span>

                    <span class="client-profile__stat-label">
                        Restaurants favoris
                    </span>
                </div>

            </div>

        </div>


        {{-- Contenu --}}
        <div class="client-profile__content">


            {{-- Informations personnelles --}}
            <div class="client-profile__card">

                <div class="client-profile__card-header">

                    <div>
                        <h2>Informations personnelles</h2>

                        <p>
                            Consultez vos informations personnelles
                        </p>
                    </div>

                    <i class="fa-solid fa-user-pen"></i>

                </div>


                <div class="client-profile__information">

                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-user"></i>
                            Nom complet
                        </span>

                        <strong>
                            Jean Dupont
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-envelope"></i>
                            Adresse email
                        </span>

                        <strong>
                            jean.dupont@gmail.com
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-phone"></i>
                            Téléphone
                        </span>

                        <strong>
                            +261 34 12 345 67
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-location-dot"></i>
                            Adresse
                        </span>

                        <strong>
                            Antananarivo, Madagascar
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-calendar"></i>
                            Date d'inscription
                        </span>

                        <strong>
                            15 janvier 2026
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-shield-halved"></i>
                            Statut du compte
                        </span>

                        <strong class="client-profile__account-status">
                            Actif
                        </strong>

                    </div>

                </div>

            </div>


            {{-- Sécurité --}}
            <div class="client-profile__card">

                <div class="client-profile__card-header">

                    <div>
                        <h2>Sécurité</h2>

                        <p>
                            Gérez la sécurité de votre compte
                        </p>
                    </div>

                    <i class="fa-solid fa-shield-halved"></i>

                </div>


                <div class="client-profile__security-item">

                    <div class="client-profile__security-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="client-profile__security-info">

                        <strong>
                            Mot de passe
                        </strong>

                        <span>
                            Dernière modification il y a 2 mois
                        </span>

                    </div>

                    <a href="#">
                        Modifier
                    </a>

                </div>


                <div class="client-profile__security-item">

                    <div class="client-profile__security-icon">
                        <i class="fa-solid fa-envelope-circle-check"></i>
                    </div>

                    <div class="client-profile__security-info">

                        <strong>
                            Adresse email
                        </strong>

                        <span>
                            Votre adresse email est vérifiée
                        </span>

                    </div>

                    <span class="client-profile__verified">

                        <i class="fa-solid fa-check"></i>
                        Vérifié

                    </span>

                </div>


                <div class="client-profile__security-item">

                    <div class="client-profile__security-icon">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>

                    <div class="client-profile__security-info">

                        <strong>
                            Téléphone
                        </strong>

                        <span>
                            Votre numéro est associé au compte
                        </span>

                    </div>

                    <span class="client-profile__verified">

                        <i class="fa-solid fa-check"></i>
                        Vérifié

                    </span>

                </div>

            </div>

        </div>

    </section>

</x-client-layout>

