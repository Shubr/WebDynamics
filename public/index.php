<?php
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';
use Shubham\Worldcup\Lib\Router;
use Shubham\Worldcup\Controllers\PlayerController;
use Shubham\Worldcup\Controllers\TeamController;

$router = new Router();

$router->get('/', function() {
    require_once(__DIR__ . '/../views/home.html');
});

/* Player Routes */
$router->get('/players/{team_id}', PlayerController::class . '@getPlayersByTeam');
$router->get('/players/filter/{name}', PlayerController::class . '@filterByName');
$router->get('/players/filterByPosition/{position}', PlayerController::class . '@filterByPosition');

/* Team Routes */
$router->get('/teams', TeamController::class . '@getTeams');
$router->get('/teams/{id}', TeamController::class . '@getTeams');

$router->dispatch();