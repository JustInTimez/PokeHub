import { createPokemonCard } from '/components/pokemon-card.js';

document.addEventListener("DOMContentLoaded", function () {
  axios
    .get("http://localhost/api/all-pokemon")
    .then(function (response) {
      const data = response.data;
      const pokemonList = document.querySelector(".row");

      console.log(response.data);
      data.forEach((pokemon) => {
        
        let card = createPokemonCard(pokemon);

        pokemonList.appendChild(card);
      });
    })
    .catch(function (error) {
      console.log(error);
    });
});
