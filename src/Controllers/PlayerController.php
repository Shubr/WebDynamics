<?php
namespace Richard\Worldcup\Controllers;

use Richard\Worldcup\Models\PlayerModel;
use Richard\Worldcup\Lib\Response;

class PlayerController
{
    private $playerModel;
    public function __construct()
    {
        $this->playerModel = new PlayerModel();
    }

    public function getPlayersByTeam($team_id)
    {
        $players = $this->playerModel->getPlayersByTeam($team_id);
        if ($players) {
            header('Content-Type: application/json');
            Response::success('', ['players' => $players]);
        } else {
            header('Content-Type: application/json');
            http_response_code(404); // Not Found status code
            Response::error('No players found.', [], 404);
        }
    }
    public function filterByName($name)
    {

    }
    public function filterByPosition($position)
    {

    }
    public function findPlayer($id)
    {

    }
}