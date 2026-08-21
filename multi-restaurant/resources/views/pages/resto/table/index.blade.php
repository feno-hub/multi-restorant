<x-app-layout>

    @php
        $path = '/storage/';
    @endphp

    <section class="reservation">

        <div class="reservation-container">

            {{-- =========================
                 EN-TÊTE
            ========================== --}}
            <div class="reservation-header">

                <div class="reservation-header-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <div class="reservation-header-content">

                    <span>
                        RÉSERVATION
                    </span>

                    <h1>
                        Réserver une table
                    </h1>

                    <p>
                        Réservez votre table simplement et profitez
                        d'un agréable moment dans votre restaurant préféré.
                    </p>

                </div>

            </div>


            {{-- =========================
                 CONTENU
            ========================== --}}
            <div class="reservation-content">


                {{-- =========================
                     RESTAURANT
                ========================== --}}
                <aside class="reservation-restaurant">

                    <div class="reservation-restaurant-image">

                        <img src="{{ $path . $resto->cover }}" alt="Le Gourmet">

                        <span class="reservation-restaurant-image-badge">

                            <i class="fa-solid fa-star"></i>

                            4.8

                        </span>

                    </div>


                    <div class="reservation-restaurant-info">

                        <span class="reservation-restaurant-category">

                            {{ $resto->category }}

                        </span>


                        <h2>
                            {{ $resto->name }}
                        </h2>


                        <p class="reservation-restaurant-description">

                            {{ $resto->description }}

                        </p>


                        <div class="reservation-restaurant-details">

                            <div class="reservation-restaurant-detail">

                                <span>
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>

                                <div>

                                    <strong>
                                        Adresse
                                    </strong>

                                    <p>
                                        {{ $resto->address }}, {{ $resto->city }}
                                    </p>

                                </div>

                            </div>


                            <div class="reservation-restaurant-detail">

                                <span>
                                    <i class="fa-solid fa-phone"></i>
                                </span>

                                <div>

                                    <strong>
                                        Téléphone
                                    </strong>

                                    <p>
                                        +261 {{ $resto->phone }}
                                    </p>

                                </div>

                            </div>


                            <div class="reservation-restaurant-detail">

                                <span>
                                    <i class="fa-regular fa-clock"></i>
                                </span>

                                <div>

                                    <strong>
                                        Horaires
                                    </strong>

                                    <p>
                                        {{ $resto->open_time }} - {{ $resto->close_time }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        <div class="reservation-restaurant-footer">

                            <i class="fa-solid fa-circle-check"></i>

                            <span>
                                Réservation disponible
                            </span>

                        </div>

                    </div>

                </aside>

                {{-- =========================
                     LIST RESERVATION
                ========================== --}}
                <div class="reservation-form-card">

                    <h2 style="text-align: center; margin-bottom: 2rem;">
                        NOS RESERVATIONS
                    </h2>

                    <div class="reservation-form">

                        <div class="reservation-form-header">

                            <div>

                                <span>
                                    TABLE 1
                                </span>

                                <h2>
                                    17-08-20 à
                                    10:00
                                </h2>

                            </div>

                            <div class="reservation-form-header-icon">

                                <i class="fa-solid fa-utensils"></i>

                            </div>

                        </div>

                        {{-- =========================
                         BOUTON
                        ========================== --}}

                        <a href="#reservation">
                            <button type="submit" class="reservation-submit">

                                <i class="fa-solid fa-calendar-check"></i>

                                Réserver ma table

                            </button>
                        </a>

                    </div>

                </div>

            </div>

            {{-- =========================
                 FORMULAIRE
            ========================== --}}
            <div id="reservation" class="reservation-form-card">

                <div class="reservation-form-header">

                    <div>

                        <span>
                            VOTRE RÉSERVATION
                        </span>

                        <h2>
                            Choisissez votre table
                        </h2>

                    </div>

                    <div class="reservation-form-header-icon">

                        @if (isset($resto->logo))
                            <img src="{{ $path . $resto->logo }}" alt=""
                                class="reservation-form-header-icon-img">
                        @else
                            <i class="fa-solid fa-utensils"></i>
                        @endif

                    </div>

                </div>


                <form action="{{ route('resto.reservation.store', $resto->id) }}" method="POST" class="reservation-form">

                    @csrf
                    @method('POST')


                    {{-- =========================
                         DATE / HEURE
                    ========================== --}}
                    <div class="reservation-row">


                        <div class="reservation-field">

                            <label for="date">

                                <i class="fa-regular fa-calendar"></i>

                                Date de réservation

                            </label>

                            <div class="reservation-input">


                                <input type="date" name="date" id="date" value="2026-08-20">

                            </div>

                        </div>



                        <div class="reservation-field">

                            <label for="time">

                                <i class="fa-regular fa-clock"></i>

                                Heure

                            </label>

                            <div class="reservation-input">


                                <input type="time" name="time" id="time" value="19:30">

                            </div>

                        </div>

                    </div>



                    {{-- =========================
                         NOMBRE DE PERSONNES
                    ========================== --}}
                    <div class="reservation-field">

                        <label for="guests">

                            <i class="fa-solid fa-users"></i>

                            Nombre de personnes

                        </label>

                        <div class="reservation-input">


                            <select name="guests" id="guests">

                                <option value="1">
                                    1 personne
                                </option>

                                <option value="2" selected>
                                    2 personnes
                                </option>

                                <option value="3">
                                    3 personnes
                                </option>

                                <option value="4">
                                    4 personnes
                                </option>

                                <option value="5">
                                    5 personnes
                                </option>

                                <option value="6">
                                    6 personnes
                                </option>

                                <option value="7">
                                    7 personnes
                                </option>

                                <option value="8">
                                    8 personnes
                                </option>

                            </select>

                        </div>

                    </div>



                    {{-- =========================
                         INFORMATIONS CLIENT
                    ========================== --}}
                    <div class="reservation-form-section">

                        <div class="reservation-form-section-title">

                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>

                            <div>

                                <h3>
                                    Vos informations
                                </h3>

                                <p>
                                    Ces informations permettront au
                                    restaurant de vous contacter.
                                </p>

                            </div>

                        </div>


                        <div class="reservation-row">


                            <div class="reservation-field">

                                <label for="name">
                                    Nom complet
                                </label>

                                <input type="text" name="name" id="name" value="Jean Dupont"
                                    placeholder="Votre nom complet">

                            </div>


                            <div class="reservation-field">

                                <label for="email">
                                    Adresse email
                                </label>

                                <input type="email" name="email" id="email" value="jean.dupont@email.com"
                                    placeholder="exemple@email.com">

                            </div>

                        </div>


                        <div class="reservation-field">

                            <label for="phone">
                                Numéro de téléphone
                            </label>

                            <input type="tel" name="phone" id="phone" value="+261 34 12 345 67"
                                placeholder="+261 34 00 000 00">

                        </div>

                    </div>



                    {{-- =========================
                         MESSAGE
                    ========================== --}}
                    <div class="reservation-form-section">

                        <div class="reservation-form-section-title">

                            <span>
                                <i class="fa-regular fa-message"></i>
                            </span>

                            <div>

                                <h3>
                                    Demande particulière
                                </h3>

                                <p>
                                    Une demande spéciale pour votre table ?
                                </p>

                            </div>

                        </div>


                        <div class="reservation-field">

                            <textarea name="message" id="message" rows="4" placeholder="Exemple : table près de la fenêtre...">Nous souhaitons avoir une table près de la fenêtre.</textarea>

                        </div>

                    </div>



                    {{-- =========================
                         INFORMATION
                    ========================== --}}
                    <div class="reservation-info">

                        <div class="reservation-info-icon">

                            <i class="fa-solid fa-circle-info"></i>

                        </div>

                        <div>

                            <strong>
                                Confirmation de réservation
                            </strong>

                            <p>
                                Votre demande sera envoyée au restaurant.
                                Vous recevrez une confirmation après
                                validation de votre réservation.
                            </p>

                        </div>

                    </div>



                    {{-- =========================
                         BOUTON
                    ========================== --}}
                    <button type="submit" class="reservation-submit">

                        <i class="fa-solid fa-calendar-check"></i>

                        Réserver ma table

                    </button>


                </form>

            </div>

        </div>

    </section>

</x-app-layout>
