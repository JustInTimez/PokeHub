function createPokemonCard(pokemon) {
  const card = document.createElement("div");
  card.classList.add("col");
  card.innerHTML = `
    <div class="card h-100")">
      <img src="${pokemon.img}" class="card-img-top card-img" alt="${pokemon.name}">
      <div class="card-body">
        <h5 class="card-title">${pokemon.name}</h5>
        <p class="card-text">DEX no:${pokemon.pokedex_number}</p>
        <button class="btn btn-primary">View Details</button>
      </div>
      <div class="card-footer">
        <small class="text-muted">Type: ${pokemon.type1}</small>
      </div>
    </div>
  `;

  const viewDetailsButton = card.querySelector(".btn-primary");
  viewDetailsButton.addEventListener("click", (event) => {
    axios
      .get(`http://localhost/api/fetch-a-pokemon/${pokemon.id}`)
      .then((response) => {
        const data = response.data;
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
              <img src="${pokemon.img}" class="modal-img" alt="${pokemon.name}">
              <p>DEX no: ${pokemon.pokedex_number}</p>
              <p>Type: ${pokemon.type1}</p>
              <p>Height: ${pokemon.height} m</p>
              <p>Weight: ${pokemon.weight} kg</p>
              <p>Abilities: ${pokemon.abilities.join(", ")}</p>
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
