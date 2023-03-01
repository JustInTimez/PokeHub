import { createPokemonCard } from "./components/pokemon-card.js";
import { checkLoggedIn } from "./components/check-login.js";
import { paginate } from "./components/pagination.js";
import { pages } from "./components/pagination.js";

let favorites = [];
let currentPage = 1; // initialize currentPage variable

document.addEventListener("DOMContentLoaded", function () {
  const limit = 20; // set the limit per page
  let offset = 0; // set the initial offset

  // define the function to fetch the paginated data
  const fetchPokemonData = (page) => {
    offset = (page - 1) * limit; // update offset variable based on current page
    axios
      .get(`http://localhost/api/all-pokemon?limit=${limit}&offset=${offset}`)
      .then(function (response) {
        const data = response.data;
        const pokemonList = document.querySelector(".row");
  
        pokemonList.innerHTML = ""; // clear the existing list
  
        data.forEach((pokemon) => {
          let card = createPokemonCard(pokemon);
          pokemonList.appendChild(card);
        });
  
        paginate(pages, '.pagination');
  
        checkLoggedIn();
      })
      .catch(function (error) {
        console.log(error);
      });
  };

  fetchPokemonData(currentPage); // fetch the initial page

  // add event listeners for pagination buttons
  const prevButton = document.querySelector("#prev-page");
  const nextButton = document.querySelector("#next-page");

  prevButton.addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--;
      fetchPokemonData(currentPage); // fetch previous page
    }
  });
  
  nextButton.addEventListener("click", () => {
    if (currentPage < pages.length) {
      currentPage++;
      fetchPokemonData(currentPage); // fetch next page
    }
  });
    
  paginate(pages, '.pagination')

  const modal = document.getElementById("login-modal");
  modal.classList.add("show");
  modal.style.display = "block";
  
});

// Fetch favorite pokemon for the user
window.addEventListener('load', function () {
  // Get user ID from local storage
  const userId = localStorage.getItem('userID');
  // console.log(localStorage.getItem("userID"));

  axios.get(`http://localhost/api/fetch-user-favorites/${userId}`)
    .then(function (response) {
      favorites = response.data;
      // console.log(response);

      // Loop through each favorite pokemon and set the state of the favorite button
      const favoriteButtons = document.querySelectorAll('.favorite-btn');
      // console.log('favorites:', favorites);
      console.log(favoriteButtons);
      favoriteButtons.forEach((button) => {
        const pokemonId = button.getAttribute('data-id');

        // console.log(`pokemonId: ${pokemonId}, favorites:`, favorites);

        if (favorites.some((fav) => fav.pokemon_id == pokemonId)) {
          button.classList.add('favorited');
        }
      });
    })
    .catch((error) => {
      // console.log(error);
    });
});

// Show login modal on page load
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("login-modal");
  modal.classList.add("show");
  modal.style.display = "block";
});

// =================================== Collect and send user data to API endpoint for backend consumption =================================== //

const form = document.querySelector("#login-register-form");
const loginButton = document.querySelector(".btn-login");
const registerButton = document.querySelector(".btn-register");
const overlay = document.querySelector("#overlay");

loginButton.addEventListener("click", function () {
  const emailRegex = /\S+@\S+\.\S+/;
  const passwordInput = document.querySelector("#password");
  const emailInput = document.querySelector("#email");

  if (!emailRegex.test(emailInput.value)) {
    // Display an error message
    alert("Please enter a valid email address.");
    return;
  }

  if (passwordInput.value.length < 8) {
    // Display an error message
    alert("Password must be at least 8 characters long.");
    return;
  }

  const formData = new FormData(form);
  const data = JSON.stringify(Object.fromEntries(formData)); // convert FormData object to JSON string

  axios
    .post("http://localhost/api/login", data, {
      headers: {
        "Content-Type": "application/json",
      },
    })
    .then(function (response) {
      // Remove overlay
      overlay.style.display = "none";

      // Close the modal
      const modal = document.querySelector("#login-modal");
      modal.classList.remove("show");
      modal.setAttribute("aria-hidden", "true");
      modal.setAttribute("style", "display: none");

      // Save user's logged-in state and ID to LocalStorage
      localStorage.setItem("isLoggedIn", true);
      localStorage.setItem("userID", response.data.id);

      checkLoggedIn();
      console.log(response + "AWEEEEEEEEEEEEEEEE!");
    })
    .catch(function (error) {
      console.log(error + "Agh naai, no work");
    });
});

registerButton.addEventListener("click", function () {
  const emailInput = document.querySelector("#email");
  const emailRegex = /\S+@\S+\.\S+/;
  const passwordInput = document.querySelector("#password");

  if (!emailRegex.test(emailInput.value)) {
    // Display an error message
    alert("Please enter a valid email address.");
    return;
  }

  if (passwordInput.value.length < 8) {
    // Display an error message
    alert("Password must be at least 8 characters long.");
    return;
  }
  const formData = new FormData(form);
  const data = JSON.stringify(Object.fromEntries(formData)); // convert FormData object to JSON string

  axios
    .post("http://localhost/api/register", data, {
      headers: {
        "Content-Type": "application/json",
      },
    })
    .then(function (response) {
      // Remove overlay
      overlay.style.display = "none";

      // Close the modal
      const modal = document.querySelector("#login-modal");
      modal.classList.remove("show");
      modal.setAttribute("aria-hidden", "true");
      modal.setAttribute("style", "display: none");

      // Save user's logged-in state to LocalStorage
      localStorage.setItem("isLoggedIn", true);
      localStorage.setItem("userID", response.data.id);
      checkLoggedIn();

      console.log(response + "AWEEEEEEEEEEEEEEEE!");
    })
    .catch(function (error) {
      console.log(error + "Agh naai, no work");
    });
});
