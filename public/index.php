<?php
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require __DIR__ . '/../vendor/autoload.php';
use Shubham\Worldcup\Lib\Router;
use Shubham\Worldcup\Controllers\PlayerController;
use Shubham\Worldcup\Controllers\TeamController;
use Shubham\Worldcup\Controllers\UserController;

$router = new Router();

/* User Routes */
$router->get('/', function() {
    require_once(__DIR__ . '/../views/home.php');
});

/* Register */
$router->get('/register', function() {
    require_once(__DIR__ . '/../views/register.html');
});
$router->post('/register', UserController::class . '@register');

/* Login */
$router->get('/login', function() {
    require_once(__DIR__ . '/../views/login.html');
});

$router->post('/login', UserController::class . '@verify');
$router->get('/logout', UserController::class . '@logout');
$router->get('/dashboard', UserController::class . '@validateToken');
    
/* Player Routes */
$router->get('/players/{team_id}', PlayerController::class . '@getPlayersByTeam');
$router->get('/player/filter/{name}', PlayerController::class . '@filterByName');
$router->get('/player/filterByPosition/{position}', PlayerController::class . '@filterByPosition');
$router->post('/player/update', PlayerController::class . '@updatePlayer');
$router->post('/player/{player_id}/delete', PlayerController::class . '@deletePlayer');

/* Team Routes */
$router->get('/teams', TeamController::class . '@teams');
$router->get('/team/{id}', PlayerController::class . '@findPlayersByTeam');

$router->dispatch();