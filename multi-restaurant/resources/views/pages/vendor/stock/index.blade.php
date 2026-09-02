<x-dashboard-vendeur-layout>

    <div class="stock">

        <div class="stock-header">

            <div>
                <h1>Gestion du stock</h1>
                <p>Gérez les quantités disponibles de vos plats.</p>
            </div>

            <a href="{{ route('vendeur.menu.create') }}" class="btn-add-stock">
                <i class="fa-solid fa-plus"></i>
                Ajouter un plat
            </a>

        </div>

        <div class="stock-stats">

            <div class="stat-card">
                <i class="fa-solid fa-utensils"></i>
                <div>
                    <h3>42</h3>
                    <span>Plats</span>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-check"></i>
                <div>
                    <h3>35</h3>
                    <span>Disponibles</span>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <div>
                    <h3>5</h3>
                    <span>Stock faible</span>
                </div>
            </div>

            <div class="stat-card">
                <i class="fa-solid fa-circle-xmark"></i>
                <div>
                    <h3>2</h3>
                    <span>Rupture</span>
                </div>
            </div>

        </div>

        <div class="stock-table">

            <table>

                <thead>

                    <tr>
                        <th>Image</th>
                        <th>Plat</th>
                        <th>Catégorie</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($menus as $menu)
                        <tr>

                            <td>
                                <img src="{{ asset('storage/' . $menu->image) }}" alt="">
                            </td>

                            <td>{{ $menu->name }}</td>

                            <td>{{ $menu->category }}</td>

                            <td>{{ number_format($menu->price, 0, ',', ' ') }} Ar</td>

                            <td>

                                <input type="number" value="{{ $menu->stock }}" class="stock-input">

                            </td>

                            <td>

                                @if ($menu->stock > 10)
                                    <span class="status available">
                                        Disponible
                                    </span>
                                @elseif($menu->stock > 0)
                                    <span class="status warning">
                                        Stock faible
                                    </span>
                                @else
                                    <span class="status danger">
                                        Rupture
                                    </span>
                                @endif

                            </td>

                            <td>

                                <div class="action">

                                    <a href="#">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </a>

                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-dashboard-vendeur-layout>
