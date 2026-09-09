<x-auth-layout>

    <div class="login-page">

        <div class="login-container" data-aos="fade-up">

            <div class="login-header">
                <div class="login-logo">
                    <x-logo-layout />
                </div>
                <h2 class="login-title">Connexion</h2>
                <p class="login-subtitle">Connectez-vous pour commander chez les meilleurs restaurants</p>
            </div>

            <x-success-layout key="success" />

            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf

                <div class="form-groupa">

                    <label for="email" class="form-groupa-label">
                        <i class="fa-solid fa-envelope"></i>
                        Adresse email
                        <span class="required">*</span>
                    </label>

                    <div class="input-group">


                        <input type="email" id="email" name="email" placeholder="ex: contact@email.com"
                            value="{{ old('email') }}" class="@error('email') is-invalid @enderror">

                    </div>

                    <x-error-layout name="email" />

                </div>

                <div class="form-groupa">

                    <label for="password" class="form-groupa-label">
                        <i class="fa-solid fa-lock"></i>
                        Mot de passe
                        <span class="required">*</span>
                    </label>

                    <div class="input-group password-group">


                        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe"
                            class="@error('password') is-invalid @enderror">

                        <button type="button" class="toggle-password">

                            <i class="fa-solid fa-eye"></i>

                        </button>

                    </div>

                    <x-error-layout name="password" />

                </div>

                <div class="form-btn">
                    <x-btnprimary-layout type="submit" icon="fa-solid fa-arrow-right-to-bracket" btn="Se connecter" />
                </div>

                <p class="auth-redirect">
                    Vous n'avez pas de compte ?
                    <a href="{{ route('register') }}" class="redirect-link">Inscrivez-vous</a>
                </p>
            </form>

        </div>

    </div>

</x-auth-layout>
