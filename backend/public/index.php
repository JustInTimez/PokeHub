<?php

// Error Reporting

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// --------------------------------------------------------------------------
//                                  CORS
// --------------------------------------------------------------------------

header("Access-Control-Allow-Origin: *");   // allow any origin to access resources on this API
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH");  // Allow the following HTTP methods on this API

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '../../vendor/autoload.php';

// --------------------------------------------------------------------------
//                               APP REQUIRES
// --------------------------------------------------------------------------

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

// --------------------------------------------------------------------------
//                                CREATE
// --------------------------------------------------------------------------

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

    // Add user to database and get ID of new user
    $newUserId = $UserData->addUser($userData['email'], $userData['password']);

    // Create response with ID of new user
    $response = $response->withStatus(200);
    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode(['message' => 'User added successfully', 'id' => $newUserId]));
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



// --------------------------------------------------------------------------
//                                READ
// --------------------------------------------------------------------------

$app->get('/api/all-pokemon', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $PokemonData = new PokemonDAO($DatabaseConfig);

    // Get query parameters for pagination
    $limit = $request->getQueryParams()['limit'] ?? 20;
    $page = $request->getQueryParams()['page'] ?? 1;
    $offset = ($page - 1) * $limit;

    // Get Pokemon data & convert to JSON
    $pokemon = $PokemonData->readAllPkm($limit, $offset);
    $responseData = json_encode($pokemon);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});


$app->get('/api/fetch-user-favorites/{userId}', function (Request $request, Response $response, $args) {

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $FavoritesData = new FavoritesDAO($DatabaseConfig);

    // Get a single Pokemon & convert to JSON
    $allFavorites = $FavoritesData->fetchByUserId($args['userId']);
    $responseData = json_encode($allFavorites);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});

$app->get('/api/check-if-favorited', function (Request $request, Response $response, $args) {
    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $FavoritesData = new FavoritesDAO($DatabaseConfig);

    $params = $request->getQueryParams();
    $userId = $params['userId'];
    $pokemonId = $params['pokemonId'];

    if (empty($userId) || empty($pokemonId)) {
        error_log('Error: Missing user ID or Pokemon ID');
        $response = $response->withStatus(400);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode(['error' => 'Missing user ID or Pokemon ID']));
        return $response;
    }

    $isFavorited = $FavoritesData->checkIfFavorited($userId, $pokemonId);
    $responseData = json_encode($isFavorited);

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


// --------------------------------------------------------------------------
//                                 DELETE
// --------------------------------------------------------------------------

$app->post('/api/favorite/delete', function (Request $request, Response $response, $args) {

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
    $FavoritesData->removeFavorite($requestData['userId'], $requestData['pokemonId']);

    // Create response
    $response = $response->withStatus(200);
    $response = $response->withHeader('Content-Type', 'application/json');
    $response->getBody()->write(json_encode(['message' => 'Favorite Pokemon added']));
    return $response;
});

// --------------------------------------------------------------------------
//                  RETURN 404 IF NOT ONE OF THE FOLLOWING:
// --------------------------------------------------------------------------

$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) use ($notFoundHandler) {
    return $notFoundHandler($request, $response);
});


$app->run();
