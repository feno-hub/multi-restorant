<x-client-layout>

    <div class="activities-page">

        <div class="activities-container">

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


            <div class="activities-card">

                <div class="activities-list">


                    @if (Auth::user()->activities)

                        @foreach (Auth::user()->activities as $activities)
                            <div class="activity-item">

                                @if ($activities->content == "Commande passée chez")
                                    <div class="activity-icon activity-success">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                @else
                                    <div class="activity-icon activity-success">
                                        <i class="fa-solid fa-pencil"></i>
                                    </div>
                                @endif

                                <div class="activity-content">

                                    <h2>
                                        {{ $activities->content }}
                                    </h2>

                                    @if ($activities->content == "Commande passée chez")
                                        <p>
                                            Vous avez une commande
                                            <strong>Chez {{ $activities->title }}</strong>.
                                        </p>

                                    @else
                                        <p>
                                            Vous avez envoyer une message à l' Admin
                                            <strong>Chez {{ $activities->title }}</strong>.
                                        </p>
                                    @endif

                                    <span class="activity-date">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ $activities->created_at->diffForHumans() }}
                                    </span>

                                </div>

                            </div>
                        @endforeach
                        
                    @endif


                    {{-- <div class="activity-icon activity-warning">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="activity-icon activity-success">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="activity-icon activity-info">
                    </div>
                    <div class="activity-icon activity-primary">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <div class="activity-icon activity-danger">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div> --}}
                
                </div>


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