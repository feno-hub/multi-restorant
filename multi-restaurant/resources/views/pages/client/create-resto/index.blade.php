<x-client-layout>
    <div class="restaurant-container">

        <div class="form-card">

            <div class="top-back">
                <a href="{{ route('client.dashboard') }}">
                    <i class="fa-solid fa-arrow-left"></i>
                    Retour
                </a>
            </div>

            <div class="form-header">
                <h2>Ajouter un Restaurant</h2>
                <p>Complétez les informations ci-dessous.</p>
            </div>

            <x-success-layout key="success" />

            <form action="{{ route('client.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('POST')

                <div class="form">

                    <div class="form-group">
                        <label>Nom du restaurant</label>
                        <input type="text" name="name" placeholder="Nom du restaurant"
                            value="{{ old('name') }}">
                        <x-error-layout name="name" />
                    </div>

                    <div class="form-group">
                        <label>Catégorie</label>
                        <select name="category">
                            <option value="{{ old('category') }}">
                                {{ old('category') }}
                            </option>
                            <option value="">Choisir une catégorie</option>
                            <option value="Fast Food">
                                Fast Food
                            </option>
                            <option value="Restaurant Malagasy">
                                Restaurant Malagasy
                            </option>
                            <option class="Restaurant Français">
                                Restaurant Français
                            </option>
                            <option value="Pizzeria">
                                Pizzeria
                            </option>
                            <option value="Snack">
                                Snack
                            </option>
                            <option value="Grill">
                                Grill
                            </option>
                        </select>
                        <x-error-layout name="category" />
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="phone" placeholder="+261 XX XX XXX XX"
                            value="{{ old('phone') }}">
                        <x-error-layout name="phone" />
                    </div>

                    <div class="form-group">
                        <label>Email proffessionel</label>
                        <input type="email" name="email" placeholder="restaurant@email.com"
                            value="{{ old('email') }}">
                        <x-error-layout name="email" />
                    </div>

                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" name="address" placeholder="Adresse du restaurant"
                            value="{{ old('address') }}">
                        <x-error-layout name="address" />
                    </div>

                    <div class="form-group">
                        <label>Ville</label>
                        <input type="text" name="city" placeholder="Antananarivo" value="{{ old('city') }}">
                        <x-error-layout name="city" />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea 
                            name="description" 
                            rows="5" 
                            placeholder="Description du restaurant
                        ">{{ old('description') }}</textarea>
                        <x-error-layout name="description" />
                    </div>

                    <div class="form-group">
                        <label>Horaire d'ouverture</label>
                        <input type="time" name="open_time" value="{{ old('open_time') }}">
                        <x-error-layout name="open_time" />
                    </div>

                    <div class="form-group">
                        <label>Horaire de fermeture</label>
                        <input type="time" name="close_time" value="{{ old('close_time') }}">
                        <x-error-layout name="close_time" />
                    </div>

                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" value="{{ old('logo') }}">
                        <x-error-layout name="logo" />
                    </div>

                    <div class="form-group">
                        <label>Image de couverture</label>
                        <input type="file" name="cover" value="{{ old('cover') }}">
                        <x-error-layout name="cover" />
                    </div>

                    <div class="form-group">
                        <label>Nifstat</label>
                        <input type="file" name="nifstat" value="{{ old('nifstat') }}">
                        <x-error-layout name="nifstat" />
                    </div>

                    <div class="form-group">
                        <label>Site url</label>
                        <input 
                            type="text" 
                            name="website"
                            value="{{ old('website') }}"
                            placeholder="http://127.0.0.1:8000/client/creation-restaurant">
                        <x-error-layout name="website" />
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="">
                        <x-error-layout name="" />
                    </div>

                </div>

                <div class="button-group">
                    <button type="submit" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Ajouter
                    </button>

                    <button type="reset" class="btn-back">
                        <a href="{{ route('client.dashboard') }}">
                            <i class="fa-solid fa-xmark"></i>
                            Annuler
                        </a>
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-client-layout>
