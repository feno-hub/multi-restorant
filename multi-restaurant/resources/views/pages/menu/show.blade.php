<x-app-layout>

    <div class="menu-detail-page">

        <div class="menu-detail-container">

            <div class="menu-detail-back">

                <a href="{{ url()->previous() }}">
                    <i class="fas fa-arrow-left"></i>
                    Retour aux menus
                </a>

            </div>


            <div class="menu-detail-card">

                <div class="menu-detail-image">

                    <img
                        src="{{ asset('storage/' . $menu->image) }}"
                        alt="{{ $menu->name }}"
                    >

                </div>


                <div class="menu-detail-content">

                    <div class="menu-detail-restaurant">

                        <i class="fas fa-store"></i>

                        <a href="{{ route('resto.show', $resto->id) }}">
                            <span>
                                {{ $resto->name ?? 'Restaurant' }}
                            </span>
                        </a>

                    </div>


                    <h1 class="menu-detail-name">
                        {{ $menu->name }}
                    </h1>


                    <div class="menu-detail-like">

                        <i class="fas fa-heart"></i>

                        <span>
                            {{ $menu->like->count() ?? 0 }}
                            J'aime
                        </span>

                    </div>


                    <div class="menu-detail-description">

                        <h3>Description</h3>

                        <p>
                            {{ $menu->description }}
                        </p>

                    </div>


                    <div class="menu-detail-infos">

                        <div class="menu-info-item">

                            <div class="menu-info-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>

                            <div>
                                <span>Disponibilité</span>

                                @if($menu->stat == "disponible")
                                    <strong>Disponible</strong>
                                @else
                                    <strong>Indisponible</strong>
                                @endif
                            </div>

                        </div>


                        <div class="menu-info-item">

                            <div class="menu-info-icon">
                                <i class="fas fa-utensils"></i>
                            </div>

                            <div>
                                <span>Nombre de plats</span>

                                <strong>
                                    {{ $menu->plat->count() ?? 0 }} plats
                                </strong>
                            </div>

                        </div>


                        <div class="menu-info-item">

                            <div class="menu-info-icon">
                                <i class="fas fa-store"></i>
                            </div>

                            <div>
                                <span>Restaurant</span>

                                <strong>
                                    {{ $menu->restaurant->name ?? 'Non renseigné' }}
                                </strong>
                            </div>

                        </div>

                    </div>


                    <form
                        action="{{ route('menu.like') }}"
                        method="POST" 
                        class="menu-detail-actions"
                    >

                        @csrf
                        @method('POST')

                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                        <button
                            type="submit"
                            class="menu-follow-btn"
                        >
                            <i class="far fa-heart"></i>
                            J'aime ce plat
                        </button>

                        <a href="{{ route('menu.index') }}" class="menu-follow-btn" style="background: rgb(2, 36, 77);color:white;">
                            <i class="fa-solid fa-arrow-left"></i>
                            Retour
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>