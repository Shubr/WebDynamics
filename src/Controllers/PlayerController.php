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

    public function getCoach($team_id){
        $teams = $this->playerModel->getCoach($team_id);
        if($teams){
            header("Content->Type: application/json");
            Response::success('', ['teams'=>$teams]);
        }else{
            header('Content-Tpe: application/json');
            http_response_code(404);
            Response::error('No teams found.', [], 404);
        }
    }
    public function FilterByName($name)
    {
        $name = urldecode($name);

        $player = $this->playerModel->filterPlayers($name);
        if($player){
            header("Content->Type: application/json");
            Response::success('', ['players'=>$player]);
        }else{
            header('Content-Tpe: application/json');
            http_response_code(404);
            Response::error('No players found.', [], 404);
        }
    }
    public function filterByPosition($position)
    {
        $position = urldecode($position);

        $player = $this->playerModel->filterPlayersByPosition($position);
        if($player){
            header("Content->Type: application/json");
            Response::success('', ['players'=>$player]);
        }else{
            header('Content-Tpe: application/json');
            http_response_code(404);
            Response::error('No players found.', [], 404);
        }
    }
    public function findPlayer($id)
    {

    }
}