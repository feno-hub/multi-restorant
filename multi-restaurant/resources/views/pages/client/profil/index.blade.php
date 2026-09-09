
<x-client-layout>

    <section class="client-profile">

        <div class="client-profile__header">

            <div class="client-profile__header-content">

                <div class="client-profile__avatar">
                    @if (isset(Auth::user()->image))
                        <img src="{{ asset('assets/images/client.jpg') }}"
                            alt="Photo de profil">
                    @else
                        <div style="display: flex;align-items:center;justify-content:center;padding-top:1rem;">
                            <h1>
                                {{ Auth::user()->name[0] }}{{ Auth::user()->last_name[0] }}
                            </h1>                        
                        </div>
                    @endif
                </div>

                <div class="client-profile__identity">

                    <h1>{{ Auth::user()->name }} {{ Auth::user()->last_name }}</h1>

                    <p>
                        <i class="fa-solid fa-envelope"></i>
                        {{ Auth::user()->email }}
                    </p>

                </div>

            </div>


            <div class="client-profile__actions">

                <a href="{{ route('client.profil.edit', Auth::user()->id) }}" class="client-profile__btn client-profile__btn--edit">
                    <i class="fa-solid fa-pen"></i>
                    Modifier le profil
                </a>

                <a href="{{ route('client.dashboard') }}" class="client-profile__btn client-profile__btn--password">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>

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
                            {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-envelope"></i>
                            Adresse email
                        </span>

                        <strong>
                            {{ Auth::user()->email }}
                        </strong>

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-phone"></i>
                            Téléphone
                        </span>

                        @if (Auth::user()->phone)
                            <strong>
                                +261 {{ Auth::user()->phone }}
                            </strong>
                        @else
                            <strong>
                                Pas de numéro téléphone
                            </strong>
                        @endif

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-location-dot"></i>
                            Adresse
                        </span>

                        @if (Auth::user()->phone)
                            <strong>
                                {{ Auth::user()->address }}, {{ Auth::user()->city }}
                            </strong>
                        @else
                            <strong>
                                Pas d' adresse
                            </strong>
                        @endif

                    </div>


                    <div class="client-profile__field">

                        <span class="client-profile__field-label">
                            <i class="fa-solid fa-calendar"></i>
                            Date d'inscription
                        </span>

                        <strong>
                            {{ Auth::user()->created_at }}
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

                </div>

            </div>

        </div>

    </section>

</x-client-layout>

