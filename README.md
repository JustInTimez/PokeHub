# PokeHub
This website is a basic fullstack web app with the theme of Pokemon!
I've tried to incorporate the feel of old Pokemon GBA game aesthetics. There is obviously a lot to improve on.

The idea was to create a sort of Pokedex that a user can visit to review stat information on specific Pokemon. Adding functionality in the form of a favoriting system that allows the user to add any Pokemon to their favorites, and have quick access to viewing that information from their account page instead of searching for the Pokemon again.

Stack used...
- Backend:
    - [X] MySQL
    - [X] PHP - Slim4 Framework for API route endpoints
- Frontend:
    - [X] Vanilla JavaScript
    - [X] Bootstrap5
    - [X] HTML & CSS

## Description of App

The main focus of building this app was to get practice and experience creating and consuming APIs and using the response on frontend. 
__All communication between frontend and backend is done through the use of Axios to Slim4 endpoints.__
From there, DAO namespaces and model classes were created in PHP in order to facilitate the connection to the MySQL database and interact with the respective tables.

- [X] Login/Register modal for auth (GET/POST, with LocalStorage used for userID and LoggedIn status)
- [X] Fetch all Pokemon / Filter them from the database when landing on the homepage (GET)
- [X] Fetch individual Pokemon stats from the database when viewing details (GET)
- [X] Add/Remove Pokemon from user favorites using API endpoints (GET/POST & stateful)

I am still busy/wanting to implement:
- [ ] Pagination - this is in progress, and is isolated - does not break the core functionality of the app.
- [ ] Filtering options:
    - [ ] Filter by type (Fire, Grass, Normal, Flying etc...)
    - [X] Filter by Legendary status - **Completed!**
    - [ ] Search capabilities - search result by typing the Pokemon name
- [ ] Intentionally left out some Pokemon - the focus was on Gen 1 Pokemon only. I would like to build out functionality that allows the user to add any missing pokemon to the DEX!

## Project Setup

- Please find the export of the database in the folder path **backend/src/config/pokemon_app.sql**
- Import the database so that you may use it with your AMP software and PHP MyAdmin
- In order for the backend to work properly, please set your AMP software Document Root path to **\PokeHub\backend\public** so that the Slim App can be fired
- Launch index.html with a live server of your choice to get started!

If you want to test the login feature, please use these credentials: _jislaaik@gmail.com_ | _gqGAw6vwLyGWAjV_<br>
Alternatively, register a new account!<br>
You now have access to look for and add Pokemon to your favorites, and to view their indiviual stats<br>