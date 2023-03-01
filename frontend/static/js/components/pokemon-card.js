let userId = localStorage.getItem("userID");

function createPokemonCard(pokemon) {
  const card = document.createElement("div");
  card.classList.add("col");
  card.innerHTML = `
    <div class="card h-100")">
      <img src="${pokemon.img}" class="card-img-top card-img" alt="${pokemon.name}">
      <div class="card-body">
        <h5 class="card-title">${pokemon.name}</h5>
        <p class="card-text">DEX no:${pokemon.pokedex_number}</p>
        <button class="btn btn-primary pokemon-details">View Details</button>
      </div>
      <div class="card-footer">
        <small class="text-muted">Type: ${pokemon.type1}</small>
      </div>
    </div>
  `;

  const viewDetailsButton = card.querySelector(".pokemon-details");
  viewDetailsButton.addEventListener("click", (event) => {
    // Fetch single pokemon details from backend
    axios
      .get(`http://localhost/api/fetch-a-pokemon/${pokemon.id}`)
      .then((response) => {
        const data = response.data;

        // Run function to display modal data
        showDetails(data);
      })
      .catch((error) => {
        alert("Error fetching single Pokemon data from server. Please try again later.");
      });
  });

  return card;
}

function showDetails(pokemon) {
  // Create a modal to display the details
  const modal = document.createElement("div");
  modal.classList.add("modal");

  let favoritedClass = "";
  let isFavorited = false;
  userId = localStorage.getItem("userID");

  axios
  .get(`http://localhost/api/check-if-favorited?userId=${userId}&pokemonId=${pokemon.id}`, {
    headers: {
      "Content-Type": "application/json",
    },
  })
  .then((response) => {
    const data = response.data;
    isFavorited = data;
    favoritedClass = isFavorited ? "favorited" : "";


    modal.innerHTML = `
                  <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">${pokemon.name}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row gx-3">
                        <div class="col-md-4 text-center">
                          <img src="${pokemon.img}" class="modal-img" height="200px" width="200px" alt="${pokemon.name}">
                        </div>
                        <div class="col-md-8">
                          <p><span class="fw-bold">DEX no:</span> ${pokemon.pokedex_number}</p>
                          <p><span class="fw-bold">Type:</span> ${pokemon.type1} ${pokemon.type1 ? `| ${pokemon.type2}` : ""}</p>
                          <p><span class="fw-bold">Height:</span> ${pokemon.height_m} m</p>
                          <p><span class="fw-bold">Weight:</span> ${pokemon.weight_kg} kg</p>
                          <p><span class="fw-bold">Abilities:</span> ${pokemon.abilities.join(", ")}</p>

                          <button class="favorite-btn ${favoritedClass}" data-id="${pokemon.id}">
                            <img src="static/images/icons/pokeballs-50.png">
                          </button>

                        </div>
                      </div>
                      <hr>
                      <div class="row gx-3 d-flex align-self-baseline">
                        <div class="col-md-4">
                          <p><span class="fw-bold">Base HP:</span> ${pokemon.hp}</p>
                          <p><span class="fw-bold">Attack:</span> ${pokemon.attack}</p>
                        </div>
                        <div class="col-md-4">
                          <p><span class="fw-bold">Defense:</span> ${pokemon.defense}</p>
                          <p><span class="fw-bold">Special Attack:</span> ${pokemon.sp_attack}</p>
                        </div>
                        <div class="col-md-4">
                          <p><span class="fw-bold">Speed:</span> ${pokemon.speed}</p>
                          <p><span class="fw-bold">Special Defense:</span> ${pokemon.sp_defense}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
  `;

  // Add the modal to the page
  document.body.appendChild(modal);

  // Show the modal
  const modalInstance = new bootstrap.Modal(modal);

  const favBtn = modal.querySelector(".favorite-btn");
  const pokemonId = favBtn.getAttribute("data-id");
  userId = localStorage.getItem("userID");

  const favData = { pokemonId: pokemonId, userId: userId };

  favBtn.addEventListener("click", () => {
    let requestURL = favBtn.classList.contains("favorited") ? "http://localhost/api/favorite/delete" : "http://localhost/api/favorite/add";

    // Send selected pokemon as favorite to backend
    axios
      .post(requestURL, favData, {
        headers: {
          "Content-Type": "application/json",
        },
      })
      .then(function (response) {

        // Run function to save favorite pokemon
        favBtn.classList.toggle("favorited");
      })
      .catch((error) => {
        alert("Error adding or removing favorited Pokemon. Please try again later.");
      });
  });

  modalInstance.show();

  });
}

export { createPokemonCard };
