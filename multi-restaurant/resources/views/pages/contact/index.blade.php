<x-app-layout>
    <div class="container-contact">

        {{-- PARTIE GAUCHE : INFORMATIONS DE CONTACT --}}
        <div class="container-contact-text">
            <h1 class="container-contact-text-title">📬 Contacter nous</h1>

            {{-- Nom --}}
            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-solid fa-user"></i>
                </span>
                <strong class="container-contact-text-bio-title">Nom :</strong>
                <i class="container-contact-text-bio-nom">Super Admin</i>
            </div>

            {{-- Téléphone --}}
            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <span class="container-contact-text-bio-icon-tel">
                        <i class="fa-solid fa-phone"></i>
                    </span>
                </span>
                <strong class="container-contact-text-bio-title">Téléphone :</strong>
                <i class="container-contact-text-bio-nom">+33 1 23 45 67 89</i>
            </div>

            {{-- Email --}}
            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-regular fa-envelope"></i>
                </span>
                <strong class="container-contact-text-bio-title">Email :</strong>
                <i class="container-contact-text-bio-nom">contact@multiresto.com</i>
            </div>

            {{-- Adresse --}}
            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </span>
                <strong class="container-contact-text-bio-title">Adresse :</strong>
                <i class="container-contact-text-bio-nom">123 Avenue des Restaurants, 75001 Paris</i>
            </div>

            {{-- Horaires --}}
            <div class="container-contact-text-bio">
                <span class="container-contact-text-bio-icon">
                    <i class="fa-regular fa-clock"></i>
                </span>
                <strong class="container-contact-text-bio-title">Horaires :</strong>
                <i class="container-contact-text-bio-nom">Lun - Ven : 09h00 - 20h00</i>
            </div>

            {{-- Carte de décoration --}}
            <div class="container-contact-text-deco">
                <h3 class="container-contact-text-deco-title">💡 Besoin d'aide ?</h3>
                <p class="container-contact-text-deco-para">
                    Notre équipe est disponible pour répondre à toutes vos questions 
                    concernant les restaurants, les commandes ou votre compte.
                </p>
            </div>
        </div>

        {{-- PARTIE DROITE : FORMULAIRE --}}
        <form action="#" method="POST" class="container-contact-form">
            @csrf
            @method('POST')
            
            {{-- Message de succès --}}
            @if(session('success'))
                <div class="success-layout">
                    <i class="fa-solid fa-check-circle"></i> 
                    {{ session('success') }}
                </div>
            @endif

            {{-- Erreur --}}
            @error('content')
                <div class="error-layout">
                    <i class="fa-solid fa-exclamation-circle"></i> 
                    {{ $message }}
                </div>
            @enderror

            {{-- Icône --}}
            <span class="container-contact-form-icon">
                <i class="fa-solid fa-comment-sms"></i>
            </span>

            {{-- Texte --}}
            <p class="container-contact-form-para">
                <i class="fa-solid fa-pen"></i> Envoyer un message à la Super Admin
            </p>

            {{-- Zone de texte --}}
            <textarea name="content" 
                      id="content" 
                      cols="30" 
                      rows="8" 
                      placeholder="Votre message ..."
                      class="container-contact-form-input"
                      required>{{ old('content') }}</textarea>

            {{-- Indicateur de caractères --}}
            <div class="container-contact-form-text">
                <i class="fa-regular fa-face-smile"></i>
                <span>Votre message sera traité dans les plus brefs délais</span>
            </div>

            {{-- Bouton d'envoi --}}
            <x-btnsecondary-layout icon="fa-solid fa-paper-plane" btn="Envoyer le message" />

        </form>

    </div>
</x-app-layout>