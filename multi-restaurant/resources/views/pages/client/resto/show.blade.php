<x-client-layout>

    @php
        $path = '/storage/';
    @endphp

    <div class="restaurant-detail-page">

        <div class="restaurant-detail-container">

            {{-- Retour --}}
            <div class="detail-back">
                <a href="{{ route('client.resto.list') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>
            </div>


            {{-- =========================
                 HEADER RESTAURANT
            ========================== --}}

            <div class="restaurant-detail-card">

                {{-- Image de couverture --}}
                <div class="restaurant-cover">

                    <img
                        src="{{ $path . $resto->cover }}"
                        alt="Chez Mamy"
                    >

                    <div class="cover-overlay"></div>

                </div>


                {{-- Informations principales --}}
                <div class="restaurant-main">

                    {{-- Logo --}}
                    <div class="restaurant-logo">

                        @if (isset($resto->logo))
                            <img
                                src="{{ $path . $resto->logo }}"
                                alt="{{ $resto->name }}"
                            >
                        @else
                            <h1>
                                {{ $resto->name[0] }}{{ $resto->name[1] }}
                            </h1>
                        @endif

                    </div>


                    <div class="restaurant-main-info">

                        <div class="restaurant-name">

                            <h1>
                                {{ $resto->name }}
                            </h1>

                            <span>
                                {{ $resto->category }}
                            </span>

                        </div>


                        <span class="status status-approved">
                            <i class="fa-solid fa-circle-check"></i>
                            Restaurant validé
                        </span>

                    </div>

                </div>


                {{-- =========================
                     CONTENU
                ========================== --}}

                <div class="restaurant-detail-content">


                    {{-- Informations --}}
                    <div class="detail-section">

                        <div class="section-title">

                            <i class="fa-solid fa-circle-info"></i>

                            <h2>Informations du restaurant</h2>

                        </div>


                        <div class="info-grid">

                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-utensils"></i>
                                </span>

                                <div>
                                    <small>Nom</small>
                                    <strong>
                                        {{ $resto->name }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-tags"></i>
                                </span>

                                <div>
                                    <small>Catégorie</small>
                                    <strong>
                                        {{ $resto->category }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </span>

                                <div>
                                    <small>Téléphone</small>
                                    <strong>
                                        +261 {{ $resto->phone }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>

                                <div>
                                    <small>Email professionnel</small>
                                    <strong>
                                        {{ $resto->email }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </span>

                                <div>
                                    <small>Adresse</small>
                                    <strong>
                                        {{ $resto->address }}, {{ $resto->city }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-globe"></i>
                                </span>

                                <a href="{{ $resto->website }}">
                                    <small>Site web</small>
                                    @if (isset($resto->website))
                                        <strong>
                                            {{ $resto->website }}
                                        </strong>
                                    @else
                                        <strong>
                                            Pas de site web
                                        </strong>                                        
                                    @endif
                                </a>

                            </div>

                        </div>

                    </div>


                    {{-- Description --}}
                    <div class="detail-section">

                        <div class="section-title">

                            <i class="fa-solid fa-align-left"></i>

                            <h2>Description</h2>

                        </div>

                        <p class="description">
                            {{ $resto->description }}
                        </p>

                    </div>


                    {{-- Horaires --}}
                    <div class="detail-section">

                        <div class="section-title">

                            <i class="fa-solid fa-clock"></i>

                            <h2>Horaires d'ouverture</h2>

                        </div>


                        <div class="opening-hours">

                            <div class="day">
                                <span>Lundi</span>
                                <strong>10:00 - 22:00</strong>
                            </div>

                            <div class="day">
                                <span>Mardi</span>
                                <strong>10:00 - 22:00</strong>
                            </div>

                            <div class="day">
                                <span>Mercredi</span>
                                <strong>10:00 - 22:00</strong>
                            </div>

                            <div class="day">
                                <span>Jeudi</span>
                                <strong>10:00 - 22:00</strong>
                            </div>

                            <div class="day">
                                <span>Vendredi</span>
                                <strong>10:00 - 23:00</strong>
                            </div>

                            <div class="day">
                                <span>Samedi</span>
                                <strong>09:00 - 23:00</strong>
                            </div>

                            <div class="day">
                                <span>Dimanche</span>
                                <strong>09:00 - 21:00</strong>
                            </div>

                        </div>

                    </div>


                    {{-- Informations administratives --}}
                    <div class="detail-section">

                        <div class="section-title">

                            <i class="fa-solid fa-file-lines"></i>

                            <h2>Informations administratives</h2>

                        </div>


                        <div class="info-grid">

                            <div class="info-item">

                                
                                <div>
                                    <div class="title">
                                        <span class="info-icon">
                                            <i class="fa-solid fa-id-card"></i>
                                        </span>
                                        <small>NIFSTAT</small>
                                    </div>
                                    <div  class="info-image">
                                        <img src="{{ $path . $resto->instat }}" alt="" class="info-image-img">
                                    </div>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-calendar"></i>
                                </span>

                                <div>
                                    <small>Date de création</small>
                                    <strong>
                                        {{ $resto->created_at }}
                                    </strong>
                                </div>

                            </div>


                            <div class="info-item">

                                <span class="info-icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>

                                <div>
                                    <small>Statut</small>
                                    <strong>Validé</strong>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-client-layout>