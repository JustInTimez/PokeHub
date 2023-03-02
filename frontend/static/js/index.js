import { createPokemonCard } from "./components/pokemon-card.js";
import { checkLoggedIn } from "./components/check-login.js";
import { paginate } from "./components/pagination.js";
import { pages } from "./components/pagination.js";

let favorites = [];
let currentPage = 1; // initialize currentPage variable for pagination

const typedTextSpan = document.querySelector(".typed-text");
const cursorSpan = document.querySelector(".cursor");
const textArray = ["Welcome, Trainers!", "Wanna be the very best?"];
const typingDelay = 100;
const erasingDelay = 60;
const newTextDelay = 700;      // Delay between current and next text
let textArrayIndex = 0;
let charIndex = 0;

function type() {
  if (charIndex < textArray[textArrayIndex].length) {
      if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
      typedTextSpan.textContent += textArray[textArrayIndex].charAt(charIndex);
      charIndex++;
      setTimeout(type, typingDelay);
  }
  else {
      cursorSpan.classList.remove("typing");
      setTimeout(erase, newTextDelay);
  }
};

function erase() {
  if (charIndex > 0) {
      if (!cursorSpan.classList.contains("typing")) cursorSpan.classList.add("typing");
      typedTextSpan.textContent = textArray[textArrayIndex].substring(0, charIndex - 1);
      charIndex--;
      setTimeout(erase, erasingDelay);
  }
  else {
      cursorSpan.classList.remove("typing");
      textArrayIndex++;
      if (textArrayIndex >= textArray.length) textArrayIndex = 0;
      setTimeout(type, typingDelay + 1100);
  }
};

// On DOM Load, initiate the effect of typing at the top of the page
document.addEventListener("DOMContentLoaded", function () {    
  if (textArray.length) setTimeout(type, newTextDelay + 100);
});


document.addEventListener("DOMContentLoaded", function () {

const limit = 20; // set the limit per page (pagination)
let offset = 0; // set the initial offset (pagination)
let legendaryFilter = false; // initial state of filter
let typeFilter = ""; // initial state of filter

// define the function to fetch the paginated data
const fetchPokemonData = (page, legendaryFilter) => {
  offset = (page - 1) * limit;
  let url = `http://localhost/api/all-pokemon?limit=${limit}&offset=${offset}`;
  if (legendaryFilter) {
    url += "&legendary=1";
  }
  if (typeFilter) {
    url += `&type=${typeFilter}`;
  }
  axios
    .get(url)
    .then(function (response) {
      const data = response.data;
      const pokemonList = document.querySelector(".row");
      pokemonList.innerHTML = "";
      data.forEach((pokemon) => {
        let card = createPokemonCard(pokemon);
        pokemonList.appendChild(card);
      });
      paginate(pages, ".pagination");
      checkLoggedIn();

      // add event listeners to filter buttons
      const allButton = document.querySelector('.type-filter-button[data-type=""]');
      allButton.addEventListener("click", () => {
        typeFilter = "";
        fetchPokemonData(currentPage, legendaryFilter);
      });

      const legendaryButton = document.getElementById("toggle-legendary");
      legendaryButton.addEventListener("click", () => {
        legendaryFilter = !legendaryFilter;
        fetchPokemonData(currentPage, legendaryFilter);
      });

      const typeFilterButtons = document.querySelectorAll(".type-filter-button:not([data-type=''])");
      typeFilterButtons.forEach((button) => {
        button.addEventListener("click", () => {
          typeFilter = button.getAttribute("data-type");
          fetchPokemonData(currentPage, legendaryFilter);
        });
      });
    })
    .catch(function (error) {
      alert("Error fetching data from server. Please try again later.");
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

  axios.get(`http://localhost/api/fetch-user-favorites/${userId}`)
    .then(function (response) {
      favorites = response.data;
      // Loop through each favorite pokemon and set the state of the favorite button
      const favoriteButtons = document.querySelectorAll('.favorite-btn');

      favoriteButtons.forEach((button) => {
        const pokemonId = button.getAttribute('data-id');

        if (favorites.some((fav) => fav.pokemon_id == pokemonId)) {
          button.classList.add('favorited');
        }
      });
    })
    .catch((error) => {
      alert("Error user favorited Pokemon data from server. Please try again later.");
    });
});

// Show login modal on page load
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("login-modal");
  modal.classList.add("show");
  modal.style.display = "block";
});

// --------------------------------------------------------------------------
//    Collect and send user data to API endpoint for backend consumption
// --------------------------------------------------------------------------

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

    })
    .catch(function (error) {
      alert("Error logging you in. Please try again later or contact the administrator");
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

    })
    .catch(function (error) {
      alert("Error registering you on the system. Please try again later or contact the administrator");
    });
});
