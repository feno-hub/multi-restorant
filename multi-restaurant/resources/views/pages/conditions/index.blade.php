<x-app-layout>

<section class="terms">

    <!-- HERO -->
    <div class="terms-hero" data-aos="fade-up">

        <h1>Conditions Générales d'Utilisation</h1>

        <p>
            En utilisant notre plateforme, vous acceptez les présentes Conditions
            Générales d'Utilisation. Elles définissent les droits et les obligations
            des utilisateurs, des vendeurs et de la plateforme.
        </p>

    </div>

    <div class="terms-content">

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-circle-info"></i>

            <h2>1. Objet</h2>

            <p>
                Les présentes conditions encadrent l'utilisation de la plateforme
                Multi-Resto permettant aux clients de commander des repas et aux
                restaurants de proposer leurs menus en ligne.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-user"></i>

            <h2>2. Compte utilisateur</h2>

            <p>
                Chaque utilisateur est responsable des informations renseignées lors
                de son inscription et de la confidentialité de son mot de passe.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-store"></i>

            <h2>3. Restaurants partenaires</h2>

            <p>
                Les vendeurs sont responsables des informations publiées concernant
                leur restaurant, leurs menus, leurs prix et leurs horaires.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-cart-shopping"></i>

            <h2>4. Commandes</h2>

            <p>
                Toute commande validée est considérée comme ferme. Le restaurant
                s'engage à préparer les plats conformément aux informations affichées.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-credit-card"></i>

            <h2>5. Paiement</h2>

            <p>
                Les paiements sont réalisés selon les moyens proposés par la
                plateforme. Les transactions sont sécurisées.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-ban"></i>

            <h2>6. Comportement interdit</h2>

            <ul>
                <li>Publier de fausses informations.</li>
                <li>Utiliser le site à des fins frauduleuses.</li>
                <li>Perturber le fonctionnement de la plateforme.</li>
                <li>Usurper l'identité d'un autre utilisateur.</li>
            </ul>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-shield-halved"></i>

            <h2>7. Protection des données</h2>

            <p>
                Les données personnelles sont traitées conformément à notre politique
                de confidentialité.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-scale-balanced"></i>

            <h2>8. Responsabilité</h2>

            <p>
                La plateforme agit comme intermédiaire entre les clients et les
                restaurants. Chaque vendeur reste responsable des produits proposés.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-rotate"></i>

            <h2>9. Modification des conditions</h2>

            <p>
                Les présentes conditions peuvent être modifiées à tout moment afin de
                respecter les évolutions techniques ou légales.
            </p>
        </div>

        <div class="terms-card" data-aos="fade-up">
            <i class="fa-solid fa-envelope"></i>

            <h2>10. Contact</h2>

            <p>
                Pour toute question concernant ces conditions, veuillez contacter
                notre équipe.
            </p>

            <a href="{{ route('contact.index') }}">
                <x-btnsecondary-layout btn="Nous contacter" />
            </a>

        </div>

    </div>

</section>

</x-app-layout>