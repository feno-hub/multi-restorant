<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi-Resto</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.0.0-web/css/all.min.css') }}">

    <!-- AOS Animation -->
    <link rel="stylesheet" href="{{ asset('assets/aos/dist/aos.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/js/password.js') }}">

    <link rel="stylesheet" href="/public/assets/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container">

        <div class="container-navresp">

            <div class="container-navresp-parent">
                <x-logo-layout />

                <label for="burger" class="container-navresp-label">
                    <i class="fa-solid fa-bars"></i>
                </label>
            </div>
        </div>


        <!-- ===== NAVIGATION ===== -->

        <input type="checkbox" name="burger" id="burger" class="container-input">

        <nav class="container-nav">
            
            <label for="burger" class="container-nav-label">
                <i class="fa-solid fa-xmark"></i>
            </label>
            <div class="container-nav-logo">
                <x-logo-layout />
            </div>

            <ul class="container-nav-card">
                <li>
                    <a href="{{ route('home') }}" class="container-nav-card-link">
                        <span class="container-nav-card-link-icon">
                            <i class="fa-solid fa-house-chimney"></i>
                        </span>
                        accueil
                    </a>
                </li>
                <li>
                    <a href="{{ route('fonctionality') }}" class="container-nav-card-link">
                        <span class="container-nav-card-link-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </span>
                        comment ça marche?
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact.index') }}" class="container-nav-card-link">
                        <span class="container-nav-card-link-icon">
                            <i class="fa-solid fa-mobile"></i>
                        </span>
                        contact
                    </a>
                </li>

                @if (Auth::user())
                    @if (Auth::user()->role == 'ADMIN')
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="container-nav-card-link">mon compte</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'USER')
                        <li>
                            <a href="{{ route('client.dashboard') }}" class="container-nav-card-link">mon compte</a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'VENDEUR')
                        <li>
                            <a href="{{ route('vendeur.dashboard') }}" class="container-nav-card-link">mon compte</a>
                        </li>
                    @endif
                @endif
            </ul>

            @guest
                <div class="container-nav-button">
                    <a href="{{ route('client.cart.index') }}" class="container-nav-button-card">
                        <span class="container-nav-button-card-notif">2</span>
                        <i class="fa-solid fa-cart-shopping"> @class(['p-4', 'font-bold' => true])</i>
                    </a>
                    <a href="{{ route('login') }}">
                        <x-btnprimary-layout icon="fa-solid fa-arrow-right-to-bracket" btn="Se connecter" />
                    </a>
                </div>
            @endguest

            @auth
                <div class="container-nav-button">
                    <a href="{{ route('client.cart.index') }}" class="container-nav-button-card">
                        <span class="container-nav-button-card-notif">2</span>
                        <i class="fa-solid fa-cart-shopping"> @class(['p-4', 'font-bold' => true])</i>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('POST')
                        <x-btnsecondary-layout icon="fa-solid fa-arrow-right-from-bracket" btn="Déconnecter" />
                    </form>
                </div>
            @endauth
        </nav>

        <hr>

        <!-- ===== CONTENU PRINCIPAL ===== -->
        <main>
            {{ $slot }}
        </main>

        <hr>

        <!-- ===== FOOTER ===== -->
        <div class="container-footer">
            <div class="container-footer-logo">
                <x-logo-layout />
                <p class="container-footer-logo-para">Votre plateforme multi-restaurants pour commander chez les
                    meilleurs chefs.</p>
            </div>
            <div class="container-footer-card">
                <h5 class="container-footer-card-title">découvrir</h5>
                <ul class="container-footer-card-list">
                    <li>
                        <a href="{{ route('resto.list') }}" class="container-footer-card-list-link">restaurants</a>
                    </li>
                    <li>
                        <a href="{{ route('menu.index') }}" class="container-footer-card-list-link">menu</a>
                    </li>
                    <li>
                        <a href="#" class="container-footer-card-list-link">avis clients</a>
                    </li>
                </ul>
            </div>
            <div class="container-footer-card">
                <h5 class="container-footer-card-title">à propos</h5>
                <ul class="container-footer-card-list">
                    <li>
                        <a href="{{ route('fonctionality') }}" class="container-footer-card-list-link">
                            Comment ça marche
                        </a>
                    </li>
                    <li>
                        <a href="#" class="container-footer-card-list-link">
                            créer un restaurant
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact.index') }}" class="container-footer-card-list-link">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="container-footer-card">
                <h5 class="container-footer-card-title">légal</h5>
                <ul class="container-footer-card-list">
                    <li>
                        <a href="{{ route('conditions') }}" class="container-footer-card-list-link">
                            Conditions générales
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}" class="container-footer-card-list-link">
                            Confidentialité
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('legal') }}" class="container-footer-card-list-link">
                            Mentions légales
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- ===== SCRIPTS ===== -->
    <script src="{{ asset('assets/fontawesome-free-6.0.0-web/js/all.min.js') }}"></script>
    <script src="{{ asset('assets/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script>
        // Initialisation AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
    <script src="{{ asset('assets/js/password.js') }}"></script>
</body>

</html>
