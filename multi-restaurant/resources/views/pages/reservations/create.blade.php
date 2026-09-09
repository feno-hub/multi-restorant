<x-auth-layout>

    <div class="reservation-page">

        <div class="reservation-container">

            <div class="reservation-header">

                <span class="reservation-label">
                    RÉSERVATION
                </span>

                <h1>
                    Réserver une table
                </h1>

                <p>
                    Réservez votre table dans votre restaurant préféré.
                </p>

            </div>

            <div class="reservation-restaurant">

                <small>
                    RESTAURANT
                </small>

                <h2>
                    {{ $resto->name }}
                </h2>

                @if ($resto->address)
                    <p>
                        <i class="fa-solid fa-map-pin"></i>
                        {{ $resto->address }}
                    </p>
                @endif

            </div>

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('client.reservation.store', $resto->id) }}" method="POST" class="reservation-form">

                @csrf
                @method('POST')

                <div class="">

                    <div class="reservation-grid">

                        <div class="form-group">

                            <label for="name" style="color: white;">
                                Nom complet
                            </label>

                            <input type="text" id="name" name="name"
                                value="{{ old('name', Auth::user()->name) }}" placeholder="Votre nom complet" required>

                            @error('name')
                                <small class="error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="email" style="color: white;">
                                Adresse email
                            </label>

                            <input type="email" id="email" name="email"
                                value="{{ old('email', Auth::user()->email) }}" placeholder="exemple@email.com" required>

                            @error('email')
                                <small class="error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>


                    <div class="reservation-grid">

                        <div class="form-group">

                            <label for="phone" style="color: white;">
                                Téléphone
                            </label>

                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="034 00 000 00">

                            @error('phone')
                                <small class="error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="guests" style="color: white;">
                                Nombre de personnes
                            </label>

                            <input type="number" id="guests" name="guests" value="{{ old('guests', 2) }}"
                                min="1" max="50" required>

                            @error('guests')
                                <small class="error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                    <div class="reservation-grid">

                        <div class="form-group">

                            <label for="date" style="color: white;">
                                Date
                            </label>

                            <input type="date" id="date" name="date" value="{{ old('date') }}"
                                min="{{ date('Y-m-d') }}">

                            @error('date')
                                <small class="error bg-red-300 p-4 rounded-2xl">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        <div class="form-group">

                            <label for="time" style="color: white;">
                                Heure
                            </label>

                            <input type="time" id="time" name="time" value="{{ old('time') }}">

                            @error('time')
                                <small class="error">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>


                </div>

                <div class="form-group">

                    <label for="message" style="color: white;">
                        Message
                    </label>

                    <textarea id="message" name="message" rows="5" maxlength="500" placeholder="Une demande particulière ?">{{ old('message') }}</textarea>

                    @error('message')
                        <small class="error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="reservation-info">

                    <h3>
                        Informations
                    </h3>

                    <p>
                        Votre réservation sera envoyée au restaurant.
                        Le restaurant devra confirmer votre réservation.
                    </p>

                </div>

                <div class="reservation-actions">

                    <a href="{{ route('resto.show', $resto->id) }}" class="multi-button-secondary">
                        ← Retour
                    </a>

                    <button type="submit" class="multi-button-primary">
                        Réserver maintenant
                    </button>

                </div>

            </form>

        </div>

    </div>


</x-auth-layout>

