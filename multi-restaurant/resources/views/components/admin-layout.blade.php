<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin · Multi-Restaurant</title>

    <link rel="stylesheet" href="{{ asset('assets/fontawesome-free-6.0.0-web/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/aos/dist/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .dash {
            display: flex;
            background: #F4F6F9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 14px;
            color: #2C3E50;
            line-height: 1.6;
            min-height: 100vh;
            
            
        }

        @media (max-width: 1024px) {
            .dash {
                justify-content: center;
            }
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

       
        @media (max-width: 576px) {
            .main-content {
                padding: 12px;
            }
        }

        .label-aside {
            font-size: 1.5rem;
            cursor: pointer;
            margin-left: 1rem;
            display: none;
        }

        
        .labelx-aside {
            margin-left: 1rem;
            font-size: 1.5rem;
            cursor: pointer;
            display: none;
        }
        
        @media (max-width: 1024px) {
            .label-aside {
                display: block;
            }
            .labelx-aside {
                display: block;
            }
        }

        .input-aside {
            display: none;
        }

        .input-aside:checked ~ .sidebar {
            left: 0;
            transition: .3s;
            z-index: 5;
        }

    </style>
</head>

<body class="dash">

    <label for="aside" class="label-aside">
        <i class="fa-solid fa-bars"></i>
    </label>

    <input type="checkbox" name="" id="aside" class="input-aside">

    <aside class="sidebar">
        <label for="aside" class="labelx-aside">
            <i class="fa-solid fa-xmark"></i>
        </label>
        <div class="sidebar-brand">
            <h2>
                <a href="{{ route('home') }}" class="logo-layout">
                    <x-logo-layout />
                </a>
            </h2>
            <div class="brand-sub">Super Admin · v2.4</div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-label">Général</li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-pie"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.restaurant') }}" class="">
                    <i class="fas fa-store"></i>
                    <span>Restaurants</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.notices') }}" class="">
                    <i class="fas fa-star"></i>
                    <span>Avis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user') }}" class="">
                    <i class="fas fa-user-cog"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subscription') }}" class="">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Abonnements</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Paramètres</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <div class="user-card">
                <h1>
                    {{ Auth::user()->name[0] }}{{ Auth::user()->last_name[0] }}
                </h1>
                <div class="user-info">
                    <div class="name">
                        {{ Auth::user()->name }}
                        {{ ucfirst(Auth::user()->last_name)['0'] }}.
                    </div>
                    <div class="role">Super Admin</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- ==========================================================
    MAIN CONTENT
    ========================================================== -->
    <div class="main-content">

        {{ $slot }}

        <!-- ===== FOOTER ===== -->
        <footer class="footer-bar">
            <span><i class="far fa-copyright"></i> 2026 MultiResto · Super Admin</span>
            <span><i class="fas fa-database"></i> 1 284 commandes ce mois · <i class="fas fa-circle status-dot"></i>
                système opérationnel</span>
        </footer>

    </div>
    <script>
        function updateClok() {
            const now = new Date();
            const time = now.toLocaleTimeString();
            const date = now.toLocaleDateString('en-US', {
                wedday: 'long',
                year: 'numeric',
                month: 'long',
                'day': 'numeric'
            });
            document.getElementById('time').innerHTML = time;
            document.getElementById('date').innerHTML = date;
        }
        setInterval(updateClok, 1000);
        updateClok();

        function status() {
            const btn = document.getElementById('status');
        }

    </script>
    
    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.js') }}"></script>

</body>

</html>
