<x-vendeur-layout>

<div class="add-menu">

    <!-- Header -->
    <div class="add-menu-header">

        <div>
            <h1>Ajouter un plat</h1>
            <p>Ajoutez un nouveau plat à votre menu.</p>
        </div>

        <a href="{{ route('vendor.dashboard') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Retour
        </a>

    </div>

    <x-success-layout key="success" />

    <form action="{{ route('vendeur.menu.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="add-menu-form">

        @csrf
        @method("POST")

        <div class="form-grid">

            <!-- Nom -->
            <div class="form-group">

                <label>Nom du plat</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Ex : Pizza Royale">
                <x-error-layout name="name" />

            </div>

            <!-- Catégorie -->

            <div class="form-group">

                <label>Catégorie</label>

                <select name="category">

                    <option value="">Sélectionner</option>

                    <option value="boisson">Boisson</option>
                    <option value="dessert">Dessert</option>
                    <option value="entrée">Entrée</option>
                    <option value="plat principal">Plat principal</option>

                </select>
                <x-error-layout name="category" />

            </div>

            <!-- Prix -->

            <div class="form-group">

                <label>Prix (Ar)</label>

                <input
                    type="number"
                    name="price"
                    value="{{ old('price') }}"
                    placeholder="25000">
                <x-error-layout name="price" />

            </div>

            <!-- Temps -->

            <div class="form-group">

                <label>Temps de préparation</label>

                <input
                    type="number"
                    name="preparation_time"
                    value="{{ old('preparation_time') }}"
                    placeholder="30 min">
                <x-error-layout name="preparation_time" />

            </div>

            <!-- Disponibilité -->

            <div class="form-group">

                <label>Disponibilité</label>

                <select name="stat">

                    <option value="disponible">Disponible</option>

                    <option value="indisponible">Indisponible</option>

                </select>
                <x-error-layout name="stat" />

            </div>

            <!-- Image -->

            <div class="form-group">

                <label>Image du plat</label>

                <input
                    type="file"
                    name="image">
                <x-error-layout name="image" />

            </div>

            <!-- Description -->

            <div class="form-group full">

                <label>Description</label>

                <textarea
                    rows="6"
                    name="description"
                    placeholder="Décrivez votre plat...">{{ old('description') }}</textarea>
                <x-error-layout name="description" />
            </div>

        </div>

        <div class="form-footer">

            <button type="reset" class="btn-cancel">

                Réinitialiser

            </button>

            <button type="submit" class="btn-save">

                <i class="fa-solid fa-plus"></i>

                Ajouter le plat

            </button>

        </div>

    </form>

</div>

</x-vendeur-layout>