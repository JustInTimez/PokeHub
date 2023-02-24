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
        console.log(error);
      });
  });

  return card;
}

function showDetails(pokemon) {
  // Create a modal to display the details
  const modal = document.createElement("div");
  modal.classList.add("modal");
  modal.innerHTML = `
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">${pokemon.name}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 col-md-12 mb-3">
            <img src="${pokemon.img}" class="modal-img img-fluid" alt="${
    pokemon.name
  }">
          </div>
          <div class="col-lg-8 col-md-12">
            <p><strong>DEX no:</strong> ${pokemon.pokedex_number}</p>
            <p><strong>Type 1:</strong> ${
              pokemon.type1
            } | <strong>Type 2:</strong> ${pokemon.type2}</p>
            <p><strong>Classification:</strong> ${pokemon.classification}</p>
            <p><strong>Abilities:</strong> ${pokemon.abilities.join(", ")}</p>
            <p><strong>Base HP:</strong> ${pokemon.hp}</p>
            <p><strong>Attack:</strong> ${pokemon.attack}</p>
            <p><strong>Defense:</strong> ${pokemon.defense}</p>
            <p><strong>Special Attack:</strong> ${pokemon.special_attack}</p>
            <p><strong>Special Defense:</strong> ${pokemon.special_defense}</p>
            <p><strong>Speed:</strong> ${pokemon.speed}</p>
            <p><strong>Height:</strong> ${pokemon.height_m} m</p>
            <p><strong>Weight:</strong> ${pokemon.weight_kg} kg</p>
            <p><strong>Egg Steps:</strong> ${pokemon.base_egg_steps}</p>
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
  modalInstance.show();
}

export { createPokemonCard };
