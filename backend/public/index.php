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

// ---- App requires ----
use Model\Pokemon;
use PkmData\PokemonDAO;
use Config\DatabaseConfig;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/public"); // Set the base path to reach index.php

// $app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world! I'm working");
    return $response;
});



// ====== READ ======
$app->get('/api/all-pokemon', function (Request $request, Response $response, $args) {
    
    // Dependencies
    $DatabaseConfig = new DatabaseConfig();
    $PokemonData = new PokemonDAO($DatabaseConfig);

    // Get Pokemon data & convert to JSON
    $pokemon = $PokemonData->readAllPkm();
    $responseData = json_encode($pokemon);

    // Write JSON data to response object & assign type JSON
    return $response->withHeader('Content-Type', 'application/json')->getBody()->write($responseData);

});


// ====== RETURN 404 IF NOT ONE OF THE FOLLOWING: ======
$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
    return $handler($req, $res);
});

$app->run();
