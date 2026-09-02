<x-vendeur-layout>

    <div class="plat-create-page">

        <div class="plat-create-header">

            <div>
                <a href="{{ route('vendeur.menu.list') }}" class="back-button">
                    <i class="fas fa-arrow-left"></i>
                    Retour aux menus
                </a>

                <h1>Ajouter un plat</h1>

                <p>
                    Ajoutez un nouveau plat à votre menu.
                </p>
            </div>

        </div>


        <form action="{{ route('vendeur.plat.insert.store') }}" method="POST" enctype="multipart/form-data"
            class="plat-form">

            @method('POST')
            @csrf

            <div class="form-layout">

                <div class="form-main">

                    <div class="form-card">

                        <div class="form-card-header">

                            <div class="form-icon">
                                <i class="fas fa-utensils"></i>
                            </div>

                            <div>
                                <h2>Informations du plat</h2>
                                <p>Renseignez les informations principales.</p>
                            </div>

                        </div>


                        <div class="form-group">

                            <label for="name">
                                Nom du plat
                                <span>*</span>
                            </label>

                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Ex : Burger Gourmand au Bacon">

                            <x-error-layout name='name' />

                        </div>


                        <div class="form-group">

                            <label for="menu_id">
                                Menu
                                <span>*</span>
                            </label>

                            <select id="menu_id" name="menu_id">

                                <option value="">
                                    Sélectionner un menu
                                </option>

                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ old('menu_id', $selectedMenu ?? '') == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}
                                    </option>
                                @endforeach

                            </select>



                        </div>


                        <div class="form-group">

                            <label for="description">
                                Description
                                <span>*</span>
                            </label>

                            <textarea id="description" name="description" rows="6" placeholder="Décrivez votre plat...">{{ old('description') }}</textarea>

                            <x-error-layout name="description" />

                        </div>


                        <div class="form-row">

                            <div class="form-group">

                                <label for="price">
                                    Prix
                                    <span>*</span>
                                </label>

                                <div class="input-with-suffix">

                                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                                        placeholder="15000">

                                    <span>Ar</span>

                                </div>

                                <x-error-layout name="price" />

                            </div>


                            <div class="form-group">

                                <label for="quantity">
                                    Quantité en stock
                                    <span>*</span>
                                </label>

                                <input type="number" id="quantity" name="qty" value="{{ old('qty', 0) }}"
                                    placeholder="25">

                                <x-error-layout name='qty' />

                            </div>

                        </div>

                    </div>


                    <div class="form-card">

                        <div class="form-card-header">

                            <div class="form-icon">
                                <i class="fas fa-image"></i>
                            </div>

                            <div>
                                <h2>Image du plat</h2>
                                <p>Ajoutez une image attractive de votre plat.</p>
                            </div>

                        </div>


                        <div class="image-upload">

                            <label for="image" class="upload-area">

                                <div class="upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>

                                <strong>
                                    Ajouter une image
                                </strong>

                                <span>
                                    PNG, JPG ou JPEG
                                </span>

                                <small>
                                    Taille recommandée : 800 × 600 px
                                </small>

                            </label>

                            <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">

                            <x-error-layout name="image" />

                        </div>

                    </div>

                </div>


                <div class="form-side">

                    <div class="form-card">

                        <div class="form-card-header">

                            <div class="form-icon">
                                <i class="fas fa-toggle-on"></i>
                            </div>

                            <div>
                                <h2>Disponibilité</h2>
                                <p>État actuel du plat.</p>
                            </div>

                        </div>


                        <select name="status" style="width: 100%;padding: .5rem;border-radius: 10px;color:rgba(6, 6, 51, 0.967);">
                            <option value="">-- Sélectionner --</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Indisponible">Indisponible</option>
                        </select>

                        <x-error-layout name="status" />

                    </div>


                    <div class="form-card help-card">

                        <div class="help-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>

                        <h3>Conseil</h3>

                        <p>
                            Utilisez une photo claire et de bonne qualité pour
                            donner envie aux clients de découvrir votre plat.
                        </p>

                    </div>

                </div>

            </div>


            <div class="form-actions">

                <a href="{{ route('vendeur.menu.list') }}" class="cancel-button">
                    Annuler
                </a>

                <button type="submit" class="submit-button">
                    <i class="fas fa-plus"></i>
                    Ajouter le plat
                </button>

            </div>

        </form>

    </div>

</x-vendeur-layout>
