<x-app-layout>

    <section class="privacy">

        <!-- HERO -->
        <div class="privacy-hero" data-aos="fade-up">
            <h1>Politique de confidentialité</h1>

            <p>
                Nous accordons une grande importance à la protection de vos données
                personnelles. Cette politique explique comment notre plateforme
                multi-restaurants collecte, utilise, protège et partage vos informations.
            </p>
        </div>

        <!-- CONTENU -->
        <div class="privacy-content">

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-user-shield"></i>
                </div>

                <div class="privacy-text">
                    <h2>Collecte des informations</h2>

                    <p>
                        Lors de votre inscription, de la création d'un restaurant ou de
                        vos commandes, certaines informations sont collectées afin
                        d'assurer le bon fonctionnement de la plateforme.
                    </p>
                </div>
            </div>

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-database"></i>
                </div>

                <div class="privacy-text">
                    <h2>Utilisation des données</h2>

                    <ul>
                        <li>Gestion des comptes utilisateurs</li>
                        <li>Gestion des restaurants</li>
                        <li>Traitement des commandes</li>
                        <li>Amélioration des services</li>
                        <li>Support client</li>
                    </ul>
                </div>
            </div>

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="privacy-text">
                    <h2>Sécurité des données</h2>

                    <p>
                        Toutes les données sont protégées grâce à des mécanismes de
                        sécurité modernes afin d'empêcher les accès non autorisés.
                    </p>
                </div>
            </div>

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-share-nodes"></i>
                </div>

                <div class="privacy-text">
                    <h2>Partage des informations</h2>

                    <p>
                        Les informations sont uniquement partagées avec les vendeurs
                        concernés par une commande ou lorsque la loi l'exige.
                    </p>
                </div>
            </div>

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-cookie-bite"></i>
                </div>

                <div class="privacy-text">
                    <h2>Cookies</h2>

                    <p>
                        Des cookies sont utilisés afin d'améliorer votre navigation,
                        mémoriser vos préférences et réaliser des statistiques.
                    </p>
                </div>
            </div>

            <div class="privacy-card" data-aos="fade-up">
                <div class="privacy-icon">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>

                <div class="privacy-text">
                    <h2>Vos droits</h2>

                    <ul>
                        <li>Consulter vos données</li>
                        <li>Modifier vos informations</li>
                        <li>Supprimer votre compte</li>
                        <li>Demander une copie de vos données</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- CONTACT -->
        <div class="privacy-contact" data-aos="zoom-in">

            <h2>Une question ?</h2>

            <p>
                Pour toute demande concernant vos données personnelles,
                contactez notre équipe via la page de contact.
            </p>

            <a href="{{ route('contact.index') }}" class="privacy-btn">
                Nous contacter
            </a>

        </div>

    </section>

</x-app-layout>