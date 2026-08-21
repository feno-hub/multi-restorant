<x-client-layout>
    
    @php
        $path = '/storage/';
    @endphp
    
    <div class="restaurants-page">

        <div class="restaurants-container">

            {{-- En-tête --}}
            <div class="restaurants-header">

                <div class="restaurants-title">

                    <span class="restaurants-icon">
                        <i class="fa-solid fa-utensils"></i>
                    </span>

                    <div>
                        <h1>Tous les restaurants</h1>

                        <p>
                            Retrouvez ici tous les restaurants.
                        </p>
                    </div>

                </div>

                <a href="{{ route('client.dashboard') }}" class="btn-add">
                    <i class="fa-solid fa-arrow-left"></i>
                    retour
                </a>

            </div>


            {{-- Liste des restaurants --}}
            <div class="restaurants-list">

                {{-- Restaurant --}}
                @if (isset($restos))

                    @foreach ($restos as $resto)
                        <div class="restaurant-card">

                            <div class="restaurant-image">
                                <img
                                    src="{{ $path . $resto->cover }}"
                                    alt="{{ $resto->name }}"
                                >
                            </div>

                            <div class="restaurant-content">

                                <div class="restaurant-top">

                                    <div>
                                        <h2>
                                            {{ $resto->name }}
                                        </h2>

                                        <span class="restaurant-category">
                                            {{ $resto->category }}
                                        </span>
                                    </div>

                                </div>


                                <div class="restaurant-info">

                                    <p>
                                        <i class="fa-solid fa-location-dot"></i>
                                        {{ $resto->address }}, {{ $resto->city }}
                                    </p>

                                    <p>
                                        <i class="fa-solid fa-phone"></i>
                                        +261 {{ $resto->phone }}
                                    </p>

                                    <p>
                                        <i class="fa-solid fa-envelope"></i>
                                        {{ $resto->email }}
                                    </p>

                                </div>


                                <div class="restaurant-actions">

                                    <a href="{{ route('client.resto.show', $resto->id) }}" class="btn-view">
                                        <i class="fa-solid fa-eye"></i>
                                        Voir
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endforeach

                @endif

            </div>

        </div>

    </div>

</x-client-layout>