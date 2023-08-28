<?php
namespace Richard\Worldcup\Controllers;
use Richard\Worldcup\Models\TeamModel;
use Richard\Worldcup\Lib\Response;

class TeamController
{
    private $teamModel; 
    public function __construct()
    {   
        $this->teamModel = new TeamModel(); 
    }

    public function teams() 
    {

    }

    public function findByTeam($id) 
    {

    }
}

