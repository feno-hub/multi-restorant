
<x-client-layout>

    <section class="client-edit-profile">

        <div class="client-edit-profile__header">

            <div class="client-edit-profile__header-icon">
                <i class="fa-solid fa-user-pen"></i>
            </div>

            <div>
                <h1>Modifier mon profil</h1>

                <p>
                    Modifiez vos informations personnelles
                </p>
            </div>

        </div>

        <div class="client-edit-profile__card">

            <form action="{{ route('client.profil.update') }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')


                <div class="client-edit-profile__image-section">

                    <div class="client-edit-profile__image flex justify-center items-center">

                        @if ($user->image)
                            <img src="{{ asset('assets/images/resto/resto1.jpg') }}"
                                alt="Photo de profil">
                        @else
                            <h1 class="text-center font-bold text-2xl">
                                {{ $user->name[0] }}{{ $user->last_name[0] }}
                            </h1>
                        @endif

                    </div>

                    <div class="client-edit-profile__image-content">

                        <h2>Photo de profil</h2>

                        <p>
                            Choisissez une image JPG, JPEG ou PNG.
                        </p>

                        <label for="image"
                               class="client-edit-profile__image-btn">

                            <i class="fa-solid fa-camera"></i>

                            Modifier la photo

                        </label>

                        <input
                            type="file"
                            name="image"
                            id="image"
                            value="{{ $user->image }}"
                            hidden
                        >

                    </div>

                    <x-error-layout name="image" />

                </div>


                <div class="client-edit-profile__row">

                    <div class="client-edit-profile__group">

                        <label for="name">
                            Nom
                        </label>

                        <div class="client-edit-profile__input">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ $user->name }}"
                                placeholder="Votre nom"
                            >

                        </div>

                        <x-error-layout name="name" />

                    </div>


                    <div class="client-edit-profile__group">

                        <label for="last_name">
                            Prénom
                        </label>

                        <div class="client-edit-profile__input">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                name="last_name"
                                id="last_name"
                                value="{{ $user->last_name }}"
                                placeholder="Votre prénom"
                            >

                        </div>

                    </div>

                    <x-error-layout name="last_name" />

                </div>

                <div class="client-edit-profile__row">

                    <div class="client-edit-profile__group">

                        <label for="phone">
                            Téléphone
                        </label>

                        <div class="client-edit-profile__input">

                            <span>+261 </span>

                            <input
                                type="text"
                                name="number"
                                id="phone"
                                value="{{ $user->phone }}"
                                placeholder="XX 87 977 29"
                            >

                        </div>

                        <x-error-layout name="phone" />

                    </div>


                    <div class="client-edit-profile__group">

                        <label for="address">
                            Adresse
                        </label>

                        <div class="client-edit-profile__input">

                            <i class="fa-solid fa-map"></i>

                            <input
                                type="text"
                                name="address"
                                id="address"
                                value="{{ $user->address }}"
                                placeholder="Antananarivo, Atsimondrano"
                            >

                        </div>

                        <x-error-layout name="address" />

                    </div>

                </div>

                <div class="client-edit-profile__group">

                    <label for="email">
                        Adresse email
                    </label>

                    <div class="client-edit-profile__input">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ $user->email }}"
                            placeholder="Votre adresse email"
                        >

                    </div>

                    <x-error-layout name="email" />

                </div>


                <div class="client-edit-profile__notice">

                    <i class="fa-solid fa-circle-info"></i>

                    <p>
                        Assurez-vous que vos informations sont correctes
                        avant d'enregistrer les modifications.
                    </p>

                </div>


                <div class="client-edit-profile__actions">

                    <a href="{{ route('client.profil.index') }}"
                       class="client-edit-profile__btn client-edit-profile__btn--cancel">

                        <i class="fa-solid fa-arrow-left"></i>

                        Annuler

                    </a>


                    <button
                        type="submit"
                        class="client-edit-profile__btn client-edit-profile__btn--save">

                        <i class="fa-solid fa-check"></i>

                        Enregistrer les modifications

                    </button>

                </div>

            </form>

        </div>

    </section>

</x-client-layout>

