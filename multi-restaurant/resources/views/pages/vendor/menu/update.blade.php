<x-vendeur-layout>

<div class="edit-menu">

    <!-- HEADER -->
    <div class="edit-menu-header">

        <div>
            <h1>Modifier le menu</h1>
            <p>Modifiez les informations de votre menu.</p>
        </div>

        <a href="{{ route('vendeur.menu.list') }}" class="btn-back">
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

            <div class="form-group">

                <label>Nom du menu</label>

                <input
                    type="text"
                    name="name"
                    value="{{ $menu->name }}">

            </div>

            <div class="form-group">

                <label>Disponibilité</label>

                <select name="status">

                    <option value="{{ $menu->stat }}" selected disabled>{{ $menu->stat }}</option>
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

            <div class="form-group full">

                <label>Image actuelle</label>

                <div class="current-image">

                    <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">

                </div>

            </div>


            <div class="form-group full">

                <label>Changer l'image</label>

                <input
                    type="file"
                    name="image">

            </div>

            <div class="form-group full">

                <label>Description</label>

                <textarea
                    rows="6"
                    name="description"> {{ $menu->description }} </textarea>

            </div>

        </div>

        <div class="form-footer">

            <a href="{{ route('vendeur.menu.list') }}"
               class="btn-cancel">

                Annuler

            </a>

            <button
                class="button"
                type="submit"
                class="btn-update">

                <i class="fa-solid fa-floppy-disk"></i>

                Enregistrer

            </button>

        </div>

    </form>

</div>

</x-vendeur-layout>