<x-app-layout>
    <div class="container-contact">

        <div class="container-contact-text">
            <h1 class="container-contact-text-title">📬 Contacter nous</h1>

            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <strong class="container-contact-text-bio-title">Nom :</strong>
                <i class="container-contact-text-bio-nom">Super Admin</i>
            </div>

            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <span class="container-contact-text-bio-icon-tel">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                </span>
                <strong class="container-contact-text-bio-title">Téléphone :</strong>
                <i class="container-contact-text-bio-nom">+33 1 23 45 67 89</i>
            </div>

            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-regular fa-envelope"></i>
                </span>
                <strong class="container-contact-text-bio-title">Email :</strong>
                <i class="container-contact-text-bio-nom">contact@multiresto.com</i>
            </div>

            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </span>
                <strong class="container-contact-text-bio-title">Adresse :</strong>
                <i class="container-contact-text-bio-nom">123 Avenue des Restaurants, 75001 Paris</i>
            </div>

            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-regular fa-clock"></i>
                </span>
                <strong class="container-contact-text-bio-title">Horaires :</strong>
                <i class="container-contact-text-bio-nom">Lun - Ven : 09h00 - 20h00</i>
            </div>

            <div class="container-contact-text-deco">
                <h3 class="container-contact-text-deco-title">💡 Besoin d'aide ?</h3>
                <p class="container-contact-text-deco-para">
                    Notre équipe est disponible pour répondre à toutes vos questions 
                    concernant les restaurants, les commandes ou votre compte.
                </p>
            </div>
        </div>

        <form action="{{ route('contact.store') }}" method="POST" class="container-contact-form">
            @csrf
            @method('POST')
            
            @if(session('success'))
                <div class="success-layout">
                    <i class="fa-solid fa-check-circle"></i> 
                    {{ session('success') }}
                </div>
            @endif

            @error('content')
                <div class="error-layout">
                    <i class="fa-solid fa-exclamation-circle"></i> 
                    {{ $message }}
                </div>
            @enderror

            <span class="container-contact-form-icon">
                <i class="fa-solid fa-comment-sms"></i>
            </span>

            <p class="container-contact-form-para">
                <i class="fa-solid fa-pen"></i> Envoyer un message à la Super Admin
            </p>

            <textarea name="content" 
                      id="content" 
                      cols="30" 
                      rows="8" 
                      placeholder="Votre message ..."
                      class="container-contact-form-input"
                      >{{ old('content') }}</textarea>

            <div class="container-contact-form-text">
                <i class="fa-regular fa-face-smile"></i>
                <span>Votre message sera traité dans les plus brefs délais</span>
            </div>

            <x-btnsecondary-layout type="submit" icon="fa-solid fa-paper-plane" btn="Envoyer le message" />

        </form>

    </div>
</x-app-layout>