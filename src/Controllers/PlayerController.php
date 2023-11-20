<?php
namespace Shubham\Worldcup\Controllers;

use Shubham\Worldcup\Models\PlayerModel;
use Shubham\Worldcup\Lib\Response;

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
        $name = urldecode($name);
        $players = $this->playerModel->filterPlayers($name);
        if ($players) {
            header('Content-Type: application/json');
            Response::success('', ['players' => $players]);
        } else {
            header('Content-Type: application/json');
            http_response_code(404); // Not Found status code
            Response::error('No players found.', [], 404);
        }

    }
    public function filterByPosition($position)
    {
        $players = $this->playerModel->filterPlayersByPosition($position);
        if ($players) {
            header('Content-Type: application/json');
            Response::success('', ['players' => $players]);
        } else {
            header('Content-Type: application/json');
            http_response_code(404); // Not Found status code
            Response::error('No Postions found.', [], 404);
        }
    }
    
    public function findPlayer($id)
    {
    }

    public function updatePlayer() 
    {

        try {
            $id = $_POST["id"];
            $name = $_POST['name'] ?? null;
            $position = $_POST['position'] ?? null;
            // Validation: Make sure name and postion are not empty
            if(empty($name) || empty($position)) {
                Response::error('Name and Postion are required.', [], 400);
                return;
            }
            $result = $this->playerModel->update($id, $_POST);
            // The returned $stmt value is stored in $result, could be true, false or rowCount value
            // for the number of rows affected, I choose to use the truthy/falsy result.
            if($result) {
                Response::success('Update successfully', [], 200);
            }
            else {
                header('Content-Type: application/json');
                http_response_code(404); // Not Found status code
                Response::error('No player found.', [], 404);
            }
        } catch(\PDOException $e) {
            Response::error('Database Error: ' .$e->getMessage(), [], 500);
        }
    }

    public function deletePlayer($player_id) {


        try { 
            
            $result = $this->playerModel->DeleteByPlayer($player_id);
            
            if($result) {
                Response::success('Player deleted successfully', [], 200);
            } else {
                header('Content-Type: application/json');
                http_response_code(404); // Not Found status code
                Response::error('No player found or deletion failed.', [], 404);
            }
        } catch(\PDOException $e) { 
            Response::error('Database Error: ' . $e->getMessage(), [], 500);
        }

    }
}