<?php
namespace Shubham\Worldcup\Controllers;
use Shubham\Worldcup\Models\TeamModel;
use Shubham\Worldcup\Lib\Response;

class TeamController
{
    private $teamModel; 
    public function __construct()
    {   
        $this->teamModel = new TeamModel(); 
    }

    public function teams() 
    {
        $teams = $this->teamModel->getTeams();
        if ($teams) {
            header('Content-Type: application/json');
            Response::success('', ['teams' => $teams]);
        } else {
            header('Content-Type: application/json');
            http_response_code(404); // Not Found status code
            Response::error('Teams not found.', [], 404);
        }
    }

    public function findByTeam($id) 
    {

    }
}

