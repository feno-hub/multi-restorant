<x-vendeur-layout>

<div class="add-menu">

    <div class="add-menu-header">

        <div>
            <h1>Ajouter un menu</h1>
            <p>Ajoutez un nouveau menu à votre restaurant.</p>
        </div>

        <a href="{{ route('vendeur.menu.list') }}" class="btn-back">
            <i class="fa-solid fa-arrow-left"></i>
            Retour
        </a>

    </div>


    <form action="{{ route('vendeur.menu.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="add-menu-form">

        @csrf
        @method("POST")

        <x-success-layout key="success" />

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