
<x-client-layout>

    <section class="client-edit-profile">

        {{-- En-tête --}}
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


        {{-- Formulaire --}}
        <div class="client-edit-profile__card">

            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf


                {{-- Photo de profil --}}
                <div class="client-edit-profile__image-section">

                    <div class="client-edit-profile__image">

                        <img src="{{ asset('assets/images/client.jpg') }}"
                             alt="Photo de profil">

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
                            accept="image/png, image/jpeg, image/jpg"
                            hidden
                        >

                    </div>

                </div>


                {{-- Nom et prénom --}}
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
                                value="Jean"
                                placeholder="Votre nom"
                            >

                        </div>

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
                                value="Dupont"
                                placeholder="Votre prénom"
                            >

                        </div>

                    </div>

                </div>


                {{-- Email --}}
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
                            value="jean.dupont@gmail.com"
                            placeholder="Votre adresse email"
                        >

                    </div>

                </div>


                {{-- Informations --}}
                <div class="client-edit-profile__notice">

                    <i class="fa-solid fa-circle-info"></i>

                    <p>
                        Assurez-vous que vos informations sont correctes
                        avant d'enregistrer les modifications.
                    </p>

                </div>


                {{-- Boutons --}}
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

