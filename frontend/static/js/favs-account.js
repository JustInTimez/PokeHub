import { createPokemonCard } from "./components/pokemon-card.js";

let favorites = [];

document.addEventListener("DOMContentLoaded", function () {
  
  // Fetch favorite pokemon for the user
  window.addEventListener("load", function () {

    // Get user ID from local storage
    const userId = localStorage.getItem("userID");

    axios
      .get(`http://localhost/api/fetch-user-favorites/${userId}`)
      .then(function (response) {
        favorites = response.data;
        displayFavorites();
      })
      .catch(function (error) {
        alert("Error fetching user favorites data from server. Please try again later.");
      });
  });
});

function displayFavorites() {
  const pokemonList = document.querySelector(".row");
  pokemonList.innerHTML = "";

  for (const favorite of favorites) {
    axios
      .get(`http://localhost/api/fetch-a-pokemon/${favorite.pokemon_id}`)
      .then(function (response) {
        const pokemonData = response.data;
        const card = createPokemonCard(pokemonData);
        pokemonList.appendChild(card);

      })
      .catch(function (error) {
        alert("Error displaying single Pokemon data from server. Please try again later.");
      });
  }
}

