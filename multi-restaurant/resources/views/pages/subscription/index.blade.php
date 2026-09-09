<x-app-layout>

    <section class="subscription">

        <div class="subscription__header">

            <span class="subscription__header__subtitle">
                Nos offres
            </span>

            <h1 class="subscription__header__title">
                Choisissez votre abonnement
            </h1>

            <p class="subscription__header__description">
                Profitez de fonctionnalités supplémentaires
                en choisissant l'offre qui vous correspond.
            </p>

        </div>
        

        @if (session('success'))

            <div class="subscription__alert subscription__alert--success">

                <i class="fa-solid fa-circle-check"></i>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif



        @if (session('error'))

            <div class="subscription__alert subscription__alert--error">

                <i class="fa-solid fa-circle-exclamation"></i>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        @if (!Auth::user()->subscriptions)

            <div class="subscription__current subscription__current--free">

                <div class="subscription__current__icon">

                    <i class="fa-solid fa-user"></i>

                </div>


                <div class="subscription__current__content">

                    <span>
                        Votre statut
                    </span>

                    <strong>
                        Utilisateur gratuit
                    </strong>

                    <small>
                        Vous avez accès aux fonctionnalités de base
                        avec certaines limitations.
                    </small>

                </div>

            </div>

        @endif



        @if (Auth::user()->subscriptions)

            <div class="subscription__current">

                <div class="subscription__current__icon">

                    <i class="fa-solid fa-crown"></i>

                </div>


                <div class="subscription__current__content">

                    <span>
                        Abonnement actuel
                    </span>

                    @foreach (Auth::user()->subscriptions as $currentSubscription)
                            
                        <strong>
                            {{ $currentSubscription->plan->name }}
                        </strong>
                        
                        <small>
                            
                            Expire le
                            
                            {{ $currentSubscription->ends_at->format('d/m/Y') }}
                            
                        </small>
                    @endforeach

                </div>

            </div>

        @endif


        <div class="subscription__plans">

            @forelse ($plans as $plan)

                <article
                    class="
                        subscription__card
                        {{ $plan->slug === 'premium' ? 'subscription__card--popular' : '' }}
                    ">


                    @if ($plan->slug === 'premium')
                        <div class="subscription__card__badge">

                            <i class="fa-solid fa-star"></i>

                            Populaire

                        </div>
                    @endif



                    <div class="subscription__card__head">

                        <h2 class="subscription__card__name">

                            {{ $plan->name }}

                        </h2>


                        <p class="subscription__card__description">

                            {{ $plan->description }}

                        </p>

                    </div>



                    <div class="subscription__card__price">

                        @if ($plan->price == 0)
                            <span class="subscription__card__price__amount">

                                Gratuit

                            </span>
                        @else
                            <span class="subscription__card__price__amount">

                                {{ number_format($plan->price, 0, ',', ' ') }}

                            </span>


                            <span class="subscription__card__price__currency">

                                Ar

                            </span>
                        @endif


                        <span class="subscription__card__price__duration">

                            / {{ $plan->duration }} jours

                        </span>

                    </div>



                    <div class="subscription__card__separator"></div>



                    <ul class="subscription__card__features">

                        @foreach ($plan->features ?? [] as $feature)
                            <li>

                                <i class="fa-solid fa-check"></i>

                                <span>
                                    {{ $feature }}
                                </span>

                            </li>
                        @endforeach

                    </ul>



                    <form
                        action="{{ route('subscription.subscribe', $plan) }}"
                        method="POST" class="subscription__card__form">

                        @csrf


                        <button type="submit" class="subscription__card__button">

                            <span>

                                @if (Auth::user()->subscriptions = $plan)
                                    Abonnement actuel
                                @else
                                    Choisir cette offre
                                @endif

                            </span>


                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </form>

                </article>

            @empty

                <div class="subscription__empty">

                    <i class="fa-solid fa-box-open"></i>

                    <h3>
                        Aucun abonnement disponible
                    </h3>

                    <p>
                        Les offres d'abonnement seront bientôt disponibles.
                    </p>

                </div>

            @endforelse

        </div>



        <div class="subscription__history">

            <a href="{{ route('subscription.history') }}" class="subscription__history__link">

                <i class="fa-solid fa-clock-rotate-left"></i>

                Voir mon historique d'abonnement

            </a>

        </div>

    </section>

</x-app-layout>
