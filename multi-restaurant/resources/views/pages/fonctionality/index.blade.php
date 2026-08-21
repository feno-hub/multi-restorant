<x-app-layout>

    <section class="how">

        <!-- HERO -->
        <div class="how-header">
            
            <div class="how-header-hero" data-aos="fade-up">
                
                <h1>Comment ça marche ?</h1>
                
                <p>
                    Découvrez comment commander vos plats préférés ou développer votre
                    restaurant sur notre plateforme en quelques étapes simples.
                </p>
                
            </div>
            
        </div>

        <!-- CLIENT -->
        <div class="how-section">

            <div class="section-title" data-aos="fade-right">
                <h2>Commander un repas</h2>
                <p>Simple, rapide et sécurisé.</p>
            </div>

            <div class="steps">

                <div class="step" data-aos="zoom-in">
                    <i class="fa-solid fa-store"></i>
                    <h3>1. Choisissez un restaurant</h3>
                    <p>Parcourez la liste des restaurants disponibles près de chez vous.</p>
                </div>

                <div class="step" data-aos="zoom-in">
                    <i class="fa-solid fa-utensils"></i>
                    <h3>2. Sélectionnez vos plats</h3>
                    <p>Ajoutez vos repas préférés à votre panier.</p>
                </div>

                <div class="step" data-aos="zoom-in">
                    <i class="fa-solid fa-credit-card"></i>
                    <h3>3. Validez votre commande</h3>
                    <p>Passez votre commande en quelques clics.</p>
                </div>

                <div class="step" data-aos="zoom-in">
                    <i class="fa-solid fa-motorcycle"></i>
                    <h3>4. Recevez votre repas</h3>
                    <p>Suivez votre commande jusqu'à la livraison.</p>
                </div>

            </div>

        </div>

        <!-- VENDEUR -->
        <div class="how-section">

            <div class="section-title" data-aos="fade-right">

                <h2>Créer votre restaurant</h2>

                <p>Rejoignez notre plateforme et développez votre activité.</p>

            </div>

            <div class="steps">

                <div class="step">
                    <i class="fa-solid fa-user-plus"></i>

                    <h3>Créer un compte</h3>

                    <p>Inscrivez-vous gratuitement comme vendeur.</p>
                </div>

                <div class="step">
                    <i class="fa-solid fa-shop"></i>

                    <h3>Créer votre restaurant</h3>

                    <p>Ajoutez votre logo, votre adresse et vos informations.</p>
                </div>

                <div class="step">
                    <i class="fa-solid fa-book-open"></i>

                    <h3>Ajouter vos menus</h3>

                    <p>Publiez vos plats avec leurs prix et leurs photos.</p>
                </div>

                <div class="step">
                    <i class="fa-solid fa-chart-line"></i>

                    <h3>Recevoir des commandes</h3>

                    <p>Gérez facilement vos commandes depuis votre tableau de bord.</p>
                </div>

            </div>

        </div>

        <!-- AVANTAGES -->

        <div class="advantages">

            <h2>Pourquoi choisir notre plateforme ?</h2>

            <div class="advantages-grid">

                <div class="advantage">
                    <i class="fa-solid fa-shield"></i>
                    <h3>Paiement sécurisé</h3>
                </div>

                <div class="advantage">
                    <i class="fa-solid fa-clock"></i>
                    <h3>Commande rapide</h3>
                </div>

                <div class="advantage">
                    <i class="fa-solid fa-star"></i>
                    <h3>Restaurants vérifiés</h3>
                </div>

                <div class="advantage">
                    <i class="fa-solid fa-headset"></i>
                    <h3>Support 24/7</h3>
                </div>

            </div>

        </div>

        <!-- FAQ -->

        <div class="faq">

            <h2>Questions fréquentes</h2>

            <div class="faq-item">
                <h3>La création d'un restaurant est-elle gratuite ?</h3>
                <p>Oui, l'inscription est gratuite. Vous pourrez ensuite gérer votre restaurant depuis votre espace
                    vendeur.</p>
            </div>

            <div class="faq-item">
                <h3>Puis-je modifier mon menu ?</h3>
                <p>Oui, vous pouvez ajouter, modifier ou supprimer vos plats à tout moment.</p>
            </div>

            <div class="faq-item">
                <h3>Comment suivre ma commande ?</h3>
                <p>Depuis votre espace client, vous pouvez consulter l'état de votre commande en temps réel.</p>
            </div>

        </div>

        <!-- CTA -->

        <div class="cta">

            <h2>Prêt à commencer ?</h2>

            <p>Commandez vos plats préférés ou ouvrez votre restaurant dès aujourd'hui.</p>

            <div class="cta-buttons">

                <a href="{{ route('resto.list') }}" class="btn-primary">
                    Voir les restaurants
                </a>

                <a href="{{ route('client.createResto') }}" class="">
                    <x-btnsecondary-layout btn="Créer Un Restaurant " />
                </a>

            </div>

        </div>

    </section>

</x-app-layout>
