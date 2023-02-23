import { createPokemonCard } from './components/pokemon-card.js';

// Fetch the Pokemon data from API endpoint to display on frontend
document.addEventListener("DOMContentLoaded", function () {
  axios
    .get("http://localhost/api/all-pokemon")
    .then(function (response) {
      const data = response.data;
      const pokemonList = document.querySelector(".row");

      console.log(response.data);
      data.forEach((pokemon) => {

        // Use import function from pokemon-card
        let card = createPokemonCard(pokemon);

        pokemonList.appendChild(card);
      });
    })
    .catch(function (error) {
      console.log(error);
    });
});

// Show login modal on page load
document.addEventListener('DOMContentLoaded', function() {
  const modal = document.getElementById('login-modal');
  modal.classList.add('show');
  modal.style.display = 'block';
});