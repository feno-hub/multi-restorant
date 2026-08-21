<x-auth-layout>
    <div class="register-page">

        <div class="register-container" data-aos="fade-up">

            <!-- Logo et titre -->
            <div class="register-header">
                <div class="register-logo">
                    <x-logo-layout />
                </div>
                <h2 class="register-title">Créer un compte</h2>
                <p class="register-subtitle">Rejoignez MultiResto et commandez chez les meilleurs restaurants</p>
            </div>



            <!-- Formulaire d'inscription -->
            <form action="{{ route('register') }}" method="POST" class="register-form">
                @csrf

                <!-- Nom  -->
                <div class="form-group">
                    <label for="name">
                        <i class="fas fa-user"></i> Nom
                        <span class="required">*</span>
                    </label>
                    <input type="text" id="name" name="name" placeholder="ex: Jean "
                        value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                    <x-error-layout name="name" />
                </div>

                <!-- Adresse (optionnel) -->
                <div class="form-group">
                    <label for="lastname">
                        <i class="fas fa-user"></i> Prenom
                    </label>
                    <input type="text" id="last_name" name="last_name" placeholder="ex: Dupont"
                        value="{{ old('last_name') }}" class="@error('last_name') is-invalid @enderror">
                    <x-error-layout name="last_name" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope"></i> Adresse email
                        <span class="required">*</span>
                    </label>
                    <input type="email" id="email" name="email" placeholder="ex: contact@email.com"
                        value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                    <x-error-layout name="email" />
                </div>

                <!-- Mot de passe -->
                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock"></i> Mot de passe
                        <span class="required">*</span>
                    </label>
                    <input type="password" id="password" name="password" placeholder="6 caractères minimum"
                        class="@error('password') is-invalid @enderror">
                    <button type="button" class="toggle-password">

                        <i class="fa-solid fa-eye"></i>

                    </button>
                    <div class="hint">
                        <i class="fas fa-info-circle"></i>
                        Le mot de passe doit contenir au moins 6 caractères
                    </div>
                    <x-error-layout name="password" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="form-group">
                    <label for="password_confirmation">
                        <i class="fas fa-check-circle"></i> Confirmer le mot de passe
                        <span class="required">*</span>
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirmez votre mot de passe">
                    <x-error-layout name="password_confirmation" />
                </div>

                <!-- Bouton d'inscription -->
                <div class="form-btn">
                    <x-btnprimary-layout type="submit" icon="fa-solid fa-user-plus" btn="Créer mon compte" />
                </div>

                <p class="auth-redirect">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}" class="redirect-link">Connectez-vous</a>
                </p>
            </form>

        </div>

    </div>


</x-auth-layout>
