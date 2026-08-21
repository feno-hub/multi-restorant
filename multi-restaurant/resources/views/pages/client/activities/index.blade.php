<x-client-layout>

    <div class="activities-page">

        <div class="activities-container">

            {{-- En-tête --}}
            <div class="activities-header">

                <div class="activities-title">

                    <span class="activities-icon">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </span>

                    <div>
                        <h1>Activités récentes</h1>

                        <p>
                            Consultez les dernières activités effectuées sur votre compte.
                        </p>
                    </div>

                </div>

                <a href="{{ route('client.dashboard') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>

            </div>


            {{-- Liste des activités --}}
            <div class="activities-card">

                <div class="activities-list">


                    {{-- Activité 1 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-success">
                            <i class="fa-solid fa-plus"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Restaurant ajouté
                            </h2>

                            <p>
                                Vous avez ajouté le restaurant
                                <strong>Chez Mamy</strong>.
                            </p>

                            <span class="activity-date">
                                <i class="fa-regular fa-clock"></i>
                                Aujourd'hui à 14:35
                            </span>

                        </div>

                    </div>


                    {{-- Activité 2 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-warning">
                            <i class="fa-solid fa-clock"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Restaurant en attente de validation
                            </h2>

                            <p>
                                Le restaurant
                                <strong>Pizza House</strong>
                                est actuellement en attente de validation.
                            </p>

                            <span class="activity-date">
                                <i class="fa-regular fa-clock"></i>
                                Aujourd'hui à 11:20
                            </span>

                        </div>

                    </div>


                    {{-- Activité 3 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-success">
                            <i class="fa-solid fa-circle-check"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Restaurant validé
                            </h2>

                            <p>
                                L'administrateur a validé votre restaurant
                                <strong>Chez Mamy</strong>.
                            </p>

                            <span class="activity-date">
                                <i class="fa-regular fa-clock"></i>
                                Hier à 16:42
                            </span>

                        </div>

                    </div>


                    {{-- Activité 4 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-info">
                            <i class="fa-solid fa-pen"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Restaurant modifié
                            </h2>

                            <p>
                                Vous avez modifié les informations du restaurant
                                <strong>Chez Mamy</strong>.
                            </p>

                            <span class="activity-date">
                                <i class="fa-regular fa-clock"></i>
                                Hier à 10:15
                            </span>

                        </div>

                    </div>


                    {{-- Activité 5 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-primary">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Menu mis à jour
                            </h2>

                            <p>
                                Vous avez ajouté de nouveaux plats au menu de
                                <strong>Chez Mamy</strong>.
                            </p>

                            <span class="activity-date">
                                12 Août 2026 à 15:30
                            </span>

                        </div>

                    </div>


                    {{-- Activité 6 --}}
                    <div class="activity-item">

                        <div class="activity-icon activity-danger">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </div>

                        <div class="activity-content">

                            <h2>
                                Restaurant refusé
                            </h2>

                            <p>
                                Le restaurant
                                <strong>Grill 261</strong>
                                n'a pas été validé par l'administrateur.
                            </p>

                            <span class="activity-date">
                                10 Août 2026 à 09:45
                            </span>

                        </div>

                    </div>

                </div>


                {{-- Message fin de liste --}}
                <div class="activities-end">

                    <i class="fa-solid fa-check"></i>

                    <span>
                        Vous êtes à jour avec toutes vos activités récentes.
                    </span>

                </div>

            </div>

        </div>

    </div>

</x-client-layout>