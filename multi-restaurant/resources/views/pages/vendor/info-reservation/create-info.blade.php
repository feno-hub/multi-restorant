<x-vendeur-layout>
    <div class="page-reservation">
        
        <form 
            action="{{ route('vendor.reservation.info.store') }}" 
            method="POST"
            class="form"
        >

            @csrf
            @method('POST')

            <div class="form-tete">
                <div class="form-tete-round">
                    <div class="form-tete-round-point1"></div>
                    <div class="form-tete-round-point2"></div>
                    <div class="form-tete-round-point3"></div>
                </div>

                <a href="{{ route('vendor.dashboard') }}" class="form-tete-back">
                    <i class="fa-solid fa-arrow-left"></i>
                    retour
                </a>

            </div>

            <h1 class="form-title">Faite disponible la reservation</h1>
            
            <x-success-layout key="success" />

            <div class="group">
                <label for="table">Nombre du table</label>
                <input 
                    type="number" 
                    name="table" 
                    value="" 
                    placeholder="Entrer le nombre de table">
                <x-error-layout name="table" />
            </div>

            <div class="group">
                <label for="place">Nombre de siège par table</label>
                <input type="number" name="place" value="" placeholder="Entrer le nombre de siège">
                <x-error-layout name="place" />
            </div>

            <div class="group">
                <label for="table">Le prix d' un table</label>
                <input type="number" name="price" value="" placeholder="Entrer le prix">
                <x-error-layout name="price" />
            </div>

            <h2 class="title">Choisissez une délée</h2>

            <div class="disponibility">

                <label class="disponibility-status">

                    <input type="radio" name="delay" value="1">

                    <span class="status-choice__box">
                        <i class="fa-solid fa-clock"></i>

                        <span>
                            <strong>Par heure</strong>
                        </span>
                    </span>

                </label>

                
                <label class="disponibility-status">

                    <input type="radio" name="delay" value="0">

                    <span class="status-choice__box">
                        <i class="fa-solid fa-clock"></i>

                        <span>
                            <strong>Par minute</strong>
                        </span>
                    </span>

                </label>

            </div>

            <h2 class="title">Choisissez une status</h2>

            <div class="disponibility">

                <label class="disponibility-status">

                    <input type="radio" name="is_active" value="1">

                    <span class="status-choice__box">
                        <i class="fas fa-check-circle"></i>

                        <span>
                            <strong>Actif</strong>
                            <small>
                                L'abonnement est disponible.
                            </small>
                        </span>
                    </span>

                </label>

                
                <label class="disponibility-status">

                    <input type="radio" name="is_active" value="0">

                    <span class="status-choice__box">
                        <i class="fa-solid fa-circle-xmark"></i>

                        <span>
                            <strong>Inactif</strong>
                            <small>
                                L'abonnement est indisponible.
                            </small>
                        </span>
                    </span>

                </label>

            </div>

            <div class="button">
                <button type="submit" class="button-create">
                    <i class="fa-solid fa-check"></i>
                    Ajouter
                </button>
                <x-btnprimary-layout icon="fa-solid fa-xmark" type="reset" btn="Annuler" />
            </div>

        </form>

    </div>
</x-vendeur-layout>