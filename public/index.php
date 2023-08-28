<?php
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';
use Richard\Worldcup\Lib\Router;
use Richard\Worldcup\Controllers\PlayerController;
use Richard\Worldcup\Controllers\TeamController;

$router = new Router();

$router->get('/', function() {
    require_once(__DIR__ . '/../views/home.html');
});

/* Player Routes */
$router->get('/players/{team_id}', PlayerController::class . '@getPlayersByTeam');
$router->get('/player/filter/{name}', PlayerController::class . '@filterByName');
$router->get('/player/filterByPosition/{position}', PlayerController::class . '@filterByPosition');

/* Team Routes */
$router->get('/teams', TeamController::class . '@teams');
$router->get('/team/{id}', PlayerController::class . '@findPlayersByTeam');

$router->dispatch();