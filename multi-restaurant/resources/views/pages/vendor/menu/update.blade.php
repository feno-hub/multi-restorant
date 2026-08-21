<x-vendeur-layout>

<div class="edit-menu">

    <!-- HEADER -->
    <div class="edit-menu-header">

        <div>
            <h1>Modifier le plat</h1>
            <p>Modifiez les informations de votre plat.</p>
        </div>

        <a href="{{ route('vendor.dashboard') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Retour
        </a>

    </div>

    <form action=""
          method="POST"
          enctype="multipart/form-data"
          class="edit-menu-form">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <!-- Nom -->

            <div class="form-group">

                <label>Nom du plat</label>

                <input
                    type="text"
                    name="name"
                    value="">

            </div>

            <!-- Catégorie -->

            <div class="form-group">

                <label>Catégorie</label>

                <select name="category">

                    <option value="Pizza" >Pizza</option>

                    <option value="Burger" >Burger</option>

                    <option value="Dessert">Dessert</option>

                    <option value="Boisson">Boisson</option>

                    <option value="Plat principal">Plat principal</option>

                </select>

            </div>

            <!-- Prix -->

            <div class="form-group">

                <label>Prix (Ar)</label>

                <input
                    type="number"
                    name="price"
                    value="">

            </div>

            <!-- Stock -->

            <div class="form-group">

                <label>Stock</label>

                <input
                    type="number"
                    name="stock"
                    value="">

            </div>

            <!-- Temps -->

            <div class="form-group">

                <label>Temps de préparation (min)</label>

                <input
                    type="number"
                    name="preparation_time"
                    value="">

            </div>

            <!-- Disponibilité -->

            <div class="form-group">

                <label>Disponibilité</label>

                <select name="status">

                    <option value="Disponible"
                        >
                        Disponible
                    </option>

                    <option value="Indisponible"
                        >
                        Indisponible
                    </option>

                </select>

            </div>

            <!-- IMAGE -->

            <div class="form-group full">

                <label>Image actuelle</label>

                <div class="current-image">

                    <img src="">

                </div>

            </div>

            <!-- Nouvelle image -->

            <div class="form-group full">

                <label>Changer l'image</label>

                <input
                    type="file"
                    name="image">

            </div>

            <!-- Description -->

            <div class="form-group full">

                <label>Description</label>

                <textarea
                    rows="6"
                    name="description"></textarea>

            </div>

        </div>

        <div class="form-footer">

            <a href="{{ route('vendeur.menu.create') }}"
               class="btn-cancel">

                Annuler

            </a>

            <button
                type="submit"
                class="btn-update">

                <i class="fa-solid fa-floppy-disk"></i>

                Enregistrer

            </button>

        </div>

    </form>

</div>

</x-vendeur-layout>