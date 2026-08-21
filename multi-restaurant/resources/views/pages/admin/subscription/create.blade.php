<x-admin-layout>

    <div class="subscription-form">

        {{-- En-tête --}}
        <div class="subscription-form__header">
            <div>
                <h1>
                    {{ isset($subscriptionPlan) ? 'Modifier l’abonnement' : 'Ajouter un abonnement' }}
                </h1>

                <p>
                    {{ isset($subscriptionPlan)
                        ? 'Modifiez les informations de cet abonnement.'
                        : 'Créez un nouvel abonnement pour les restaurants.' }}
                </p>
            </div>

            <a href="{{ route('admin.subscription') }}" class="subscription-form__back">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>


        {{-- Messages de validation --}}
        @if ($errors->any())
            <div class="subscription-form__errors">
                <div class="subscription-form__errors-title">
                    <i class="fas fa-exclamation-circle"></i>
                    Veuillez corriger les erreurs suivantes :
                </div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- Formulaire --}}
        <form
            action="{{ isset($subscriptionPlan)
                ? route('admin.subscription.update', $subscriptionPlan->id)
                : route('admin.subscription.store') }}"
            method="POST" class="subscription-form__content">

            @csrf

            @if (isset($subscriptionPlan))
                @method('PUT')
            @endif


            {{-- Informations générales --}}
            <div class="subscription-form__card">

                <div class="subscription-form__card-header">
                    <div class="subscription-form__card-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>

                    <div>
                        <h2>Informations générales</h2>
                        <p>Définissez les informations principales de l’abonnement.</p>
                    </div>
                </div>


                <div class="subscription-form__grid">

                    {{-- Nom --}}
                    <div class="form-group">
                        <label for="name">
                            Nom de l'abonnement
                            <span>*</span>
                        </label>

                        <input type="text" id="name" name="name"
                            value="{{ old('name', $subscriptionPlan->name ?? '') }}" placeholder="Ex : Premium"
                            required>

                        @error('name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- Slug --}}
                    <div class="form-group">
                        <label for="slug">
                            Slug
                            <span>*</span>
                        </label>

                        <input type="text" id="slug" name="slug"
                            value="{{ old('slug', $subscriptionPlan->slug ?? '') }}" placeholder="Ex : premium"
                            required>

                        @error('slug')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- Prix --}}
                    <div class="form-group">
                        <label for="price">
                            Prix
                            <span>*</span>
                        </label>

                        <div class="input-price">
                            <input type="number" id="price" name="price"
                                value="{{ old('price', $subscriptionPlan->price ?? '') }}" placeholder="0.00"
                                min="0" step="0.01" required>

                            <span>Ar</span>
                        </div>

                        @error('price')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- Durée --}}
                    <div class="form-group">
                        <label for="duration">
                            Durée
                            <span>*</span>
                        </label>

                        <div class="input-duration">
                            <input type="number" id="duration" name="duration"
                                value="{{ old('duration', $subscriptionPlan->duration ?? 30) }}" placeholder="30"
                                min="1" required>

                            <span>jours</span>
                        </div>

                        @error('duration')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                </div>


                {{-- Description --}}
                <div class="form-group form-group--full">
                    <label for="description">
                        Description
                    </label>

                    <textarea id="description" name="description" rows="5" placeholder="Décrivez les avantages de cet abonnement...">{{ old('description', $subscriptionPlan->description ?? '') }}</textarea>

                    @error('description')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

            </div>


            {{-- Fonctionnalités --}}
            <div class="subscription-form__card">

                <div class="subscription-form__card-header">
                    <div class="subscription-form__card-icon">
                        <i class="fas fa-star"></i>
                    </div>

                    <div>
                        <h2>Fonctionnalités</h2>
                        <p>Indiquez les avantages inclus dans cet abonnement.</p>
                    </div>
                </div>


                <div class="form-group">
                    <label for="features">
                        Fonctionnalités
                    </label>

                    <textarea id="features" name="features" rows="6"
                        placeholder="Ex :
Gestion complète du restaurant
Ajout de 50 plats
Statistiques avancées
Support prioritaire">{{ old(
    'features',
    isset($subscriptionPlan) && is_array($subscriptionPlan->features) ? implode("\n", $subscriptionPlan->features) : '',
) }}</textarea>

                    <div class="form-help">
                        <i class="fas fa-info-circle"></i>
                        Écrivez une fonctionnalité par ligne.
                    </div>

                    @error('features')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

            </div>


            {{-- Statut --}}
            <div class="subscription-form__card">

                <div class="subscription-form__card-header">
                    <div class="subscription-form__card-icon">
                        <i class="fas fa-toggle-on"></i>
                    </div>

                    <div>
                        <h2>Statut</h2>
                        <p>Définissez si cet abonnement peut être proposé aux restaurants.</p>
                    </div>
                </div>


                <div class="status-choice">

                    <label class="status-choice__item">

                        <input type="radio" name="is_active" value="1"
                            {{ old('is_active', $subscriptionPlan->is_active ?? true) ? 'checked' : '' }}>

                        <span class="status-choice__box">
                            <i class="fas fa-check-circle"></i>

                            <span>
                                <strong>Actif</strong>
                                <small>
                                    L'abonnement est disponible.
                                </small>
                            </span>
                        </span>

                    </label>


                    <label class="status-choice__item">

                        <input type="radio" name="is_active" value="0"
                            {{ old('is_active', $subscriptionPlan->is_active ?? true) ? '' : 'checked' }}>

                        <span class="status-choice__box">
                            <i class="fas fa-times-circle"></i>

                            <span>
                                <strong>Inactif</strong>
                                <small>
                                    L'abonnement n'est pas disponible.
                                </small>
                            </span>
                        </span>

                    </label>

                </div>

            </div>


            {{-- Boutons --}}
            <div class="subscription-form__actions">

                <a href="{{ route('admin.subscription') }}" class="btn btn--cancel">
                    Annuler
                </a>

                <button type="submit" class="btn btn--submit">
                    <i class="fas fa-save"></i>

                    {{ isset($subscriptionPlan) ? 'Modifier l’abonnement' : 'Créer l’abonnement' }}
                </button>

            </div>

        </form>

    </div>

</x-admin-layout>
