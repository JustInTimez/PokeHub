<?php

// Error Reporting

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// ---- CORS ----

header("Access-Control-Allow-Origin: *");   // allow any origin to access resources on this API
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH");  // Allow the following HTTP methods on this API

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '../../vendor/autoload.php';

// ---- App requires ----
use Model\Pokemon;
use Model\User;
use Data\PokemonDAO;
use Data\FavoritesDAO;
use Data\UserDAO;
use Config\DatabaseConfig;

$app = AppFactory::create();


$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$app->addBodyParsingMiddleware();

$notFoundHandler = function ($request, $response) use ($app) {
    $response->getBody()->write("Page not found");
    return $response->withStatus(404);
};

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world! I'm working");
    return $response;
});

// ====== CREATE ====== //

$app->post('/api/register', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $UserData = new UserDAO($DatabaseConfig);

    // Extract user data from request body
    $userData = $request->getParsedBody();

    if (empty($userData)) {
        error_log('Error: User data not found in request body');
        $response = $response->withStatus(400);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(['error' => 'Invalid request body']));
        return $response;
    }

    // Add user to database
    $UserData->addUser($userData['email'], $userData['password']);

    // Create response
    $response = $response->withStatus(200);
    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode(['message' => 'User added successfully']));
    return $response;
});


$app->post('/api/favorite/add', function (Request $request, Response $response, $args) {
    
    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $FavoritesData = new FavoritesDAO($DatabaseConfig);

    // Extract favorite data from request body
    $requestData = $request->getParsedBody();

    if (empty($requestData)) {
        error_log('Error: User data not found in request body');
        $response = $response->withStatus(400);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(['error' => 'Invalid request body']));
        return $response;
    }

    // Add favorited pokemon to DB
    $FavoritesData->createFavorite($requestData['userId'], $requestData['pokemonId']);

    // Create response
    $response = $response->withStatus(200);
    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode(['message' => 'Favorite Pokemon added']));
    return $response;

});



// ====== READ ====== //

$app->get('/api/all-pokemon', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $PokemonData = new PokemonDAO($DatabaseConfig);

    // Get Pokemon data & convert to JSON
    $pokemon = $PokemonData->readAllPkm();
    $responseData = json_encode($pokemon);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});

// $app->get('/api/favorite/read', function (Request $request, Response $response, $args) {


// });


$app->get('/api/fetch-user-favorites/{userID}', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $FavoritesData = new FavoritesDAO($DatabaseConfig);

    // Get a single Pokemon & convert to JSON
    $allFavorites = $FavoritesData->fetchByUserId($args['userID']);
    $responseData = json_encode($allFavorites);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});



$app->get('/api/fetch-a-pokemon/{id}', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $PokemonData = new PokemonDAO($DatabaseConfig);

    // Get a single Pokemon & convert to JSON
    $singlePokemon = $PokemonData->readPkmById($args['id']);
    $responseData = json_encode($singlePokemon);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});

$app->post('/api/login', function (Request $request, Response $response, $args) {
    // Get User data from request body
    $userData = $request->getParsedBody();

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $UserData = new UserDAO($DatabaseConfig);

    // Get User data
    $user = $UserData->getUserByEmail($userData['email']);

    // Check if user exists
    if ($user === null) {
        // User not found
        $response->getBody()->write(json_encode(["error" => "User not found."]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    // Check if password matches
    if ($user->getPassword() !== $userData['password']) {
        // Password doesn't match
        $response->getBody()->write(json_encode(["error" => "Incorrect password."]));
        return $response->withHeader('Content-Type', 'application/json');
    }

    // Set response data
    $responseData = json_encode($user);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});


// ====== DELETE ====== //

$app->delete('/api/favorite/delete', function (Request $request, Response $response, $args) {

 
});

// ====== RETURN 404 IF NOT ONE OF THE FOLLOWING: ======
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) use ($notFoundHandler) {
    return $notFoundHandler($request, $response);
});


$app->run();
