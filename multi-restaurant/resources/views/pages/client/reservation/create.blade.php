<x-app-layout>

    <section class="reservation">

        <!-- HERO -->
        <div class="reservation-hero" data-aos="fade-up">

            <h1>Réserver une table</h1>

            <p>
                Réservez votre table en quelques clics et profitez d'une expérience
                culinaire dans votre restaurant préféré.
            </p>

        </div>

        <div class="reservation-content">

            <!-- INFORMATIONS RESTAURANT -->
            <div class="restaurant-card" data-aos="fade-right">

                <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="{{ $restaurant->name }}">

                <div>

                    <h2>{{ $restaurant->name }}</h2>

                    <p>
                        <i class="fa-solid fa-location-dot"></i>
                        {{ $restaurant->address }}
                    </p>

                    <p>
                        <i class="fa-solid fa-phone"></i>
                        {{ $restaurant->phone }}
                    </p>

                    <p>
                        <i class="fa-solid fa-clock"></i>
                        {{ $restaurant->open_time }}
                        -
                        {{ $restaurant->close_time }}
                    </p>

                </div>

            </div>

            <!-- FORMULAIRE -->
            <form action="{{ route('reservation.store') }}" method="POST" class="reservation-form"
                data-aos="fade-left">

                @csrf

                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">

                <div class="form-grid">

                    <div class="form-group">

                        <label>Nom complet</label>

                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}">

                    </div>

                    <div class="form-group">

                        <label>Téléphone</label>

                        <input type="text" name="phone">

                    </div>

                    <div class="form-group">

                        <label>Date</label>

                        <input type="date" name="date">

                    </div>

                    <div class="form-group">

                        <label>Heure</label>

                        <input type="time" name="time">

                    </div>

                    <div class="form-group">

                        <label>Nombre de personnes</label>

                        <input type="number" min="1" max="20" name="guests">

                    </div>

                    <div class="form-group">

                        <label>Type de table</label>

                        <select name="table_type">

                            <option>Intérieur</option>

                            <option>Terrasse</option>

                            <option>VIP</option>

                        </select>

                    </div>

                    <div class="form-group full">

                        <label>Message (optionnel)</label>

                        <textarea rows="5" name="message" placeholder="Anniversaire, allergies, demande particulière..."></textarea>

                    </div>

                </div>

                <button class="btn-reservation" type="submit">

                    <i class="fa-solid fa-calendar-check"></i>

                    Réserver maintenant

                </button>

            </form>

        </div>

    </section>

</x-app-layout>
