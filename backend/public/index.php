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
use Data\UserDAO;
use Config\DatabaseConfig;

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

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
    $user = new Model\User($userData['id'], $userData['fname'], $userData['lname'], $userData['email'], $userData['password'], $userData['contact_no']);
    
    // Add user to database
    $UserData->addUser($user);

    // Create response
    $responseData = json_encode(['message' => 'User added successfully']);
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;

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


$app->get('/api/login', function (Request $request, Response $response, $args) {
    $params = $request->getQueryParams();

    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $UserData = new UserDAO($DatabaseConfig);

    // Get User data
    $user = $UserData->getUserByEmail($params['email']);

    // Set response data
    $responseData = json_encode($user);

    // Create new Response object with JSON data as the body
    $newResponse = $response->withHeader('Content-Type', 'application/json');
    $newResponse->getBody()->write($responseData);
    return $newResponse;
});



// ====== RETURN 404 IF NOT ONE OF THE FOLLOWING: ======
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();
