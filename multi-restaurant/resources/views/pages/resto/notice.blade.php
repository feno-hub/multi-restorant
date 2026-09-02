<x-app-layout>
    <div class="container-coment">
        <header class="container-coment-header">
            <h1 class="container-coment-header-title">Découvrez ce que les clients pensent de cet restaurant</h1>
            <p class="container-coment-header-para">Consultez les notes et les avis authentiques pour trouver le
                restaurant qui vouscorrespond.</p>
        </header>

        {{-- formulaire --}}
        <section class="container-coment-section1">
            <x-success-layout key="success" />
            <div class="container-coment-section1-card">
                <form action="{{ route('resto.notice-sotre') }}" class="container-coment-section1-card-form"
                    method="POST">
                    @csrf
                    @method('POST')
                    <div class="">
                        <textarea name="content" id="" cols="60" rows="2" placeholder="Entrer votre avie"></textarea>
                        <x-error-layout name="content" />
                    </div>
                    <input type="hidden" name="resto_id" value="{{ $resto_id }}">
                    <div class="">
                        <x-btnsecondary-layout type="submit" icon="fa-solid fa-paper-plane" btn="envoyer" />
                    </div>
                </form>
                {{-- <div class="container-coment-section1-card-notif">6 avis reçues.</div> --}}
            </div>
        </section>

        {{-- LIST --}}
        <section class="container-coment-list">

            @if ($notices)
                @foreach ($notices as $notice)
                    <div class="container-coment-list-card">
                        <div class="container-coment-list-card-profil">
                            <div class="container-coment-list-card-profil-parent">
                                <div class="container-coment-list-card-profil-parent-image">
                                    <h1>
                                        {{ $notice->user->name[0] }}{{ $notice->user->last_name[0] }}
                                    </h1>
                                    {{-- <img src="{{ asset('assets/images/fonts/inscrie.png') }}" alt=""
                                        class="container-coment-list-card-profil-parent-image-img"> --}}
                                </div>
                                <strong class="container-coment-list-card-profil-parent-name">
                                    {{ $notice->user->name }} {{ $notice->user->last_name[0] }}.
                                </strong>

                            </div>
                        </div>

                        <div class="container-coment-list-card-content">
                            <p class="container-coment-list-card-content-para">
                                {{ $notice->content }}
                            </p>
                            <span class="container-coment-list-card-content-icon">
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="container-coment-list-card-content-icon">
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="container-coment-list-card-content-icon">
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="container-coment-list-card-content-icon">
                                <i class="fa-solid fa-star"></i>
                            </span>
                            <span class="container-coment-list-card-content-icon">
                                <i class="fa-solid fa-star"></i>
                            </span>
                        </div>

                        <hr class="container-coment-list-card-hr">

                        <div class="container-coment-list-card-profil-time">
                            <span class="container-coment-list-card-resto">
                                {{ $notice->resto->name }}
                            </span>
                            <i>{{ $notice->created_at->diffForHumans() }} </i>
                        </div>

                    </div>
                @endforeach
            @endif

        </section>

    </div>


</x-app-layout>
