
const searchInput = document.querySelector("#search");
const results = document.querySelector("#results");

if (searchInput) {

    let timeout;

    searchInput.addEventListener("input", () => {

        clearTimeout(timeout);

        timeout = setTimeout(async () => {

            const response = await fetch(
                `/restaurant/recherche?search=${encodeURIComponent(searchInput.value)}`
            );

            const users = await response.json();

            results.innerHTML = "";

            if (users.length === 0) {
                results.innerHTML = "<p>Aucun résultat.</p>";
                return;
            }

            users.forEach(user => {

                results.innerHTML += `
                    <div class="user">
                        <strong>${resto.name}</strong><br>
                        ${resto.email}
                    </div>
                `;

            });

        }, 300);

    });

}