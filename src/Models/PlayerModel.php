<?php
namespace Richard\Worldcup\Models;

use Richard\Worldcup\Models\BaseModel;

class PlayerModel extends BaseModel
{
    protected $db;
    protected $table = 'players_teams_vw';

    public function getPlayersByTeamId($id)
    {
        return $this->read($id);
    }

    public function getPlayersByTeam($team_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE team_id = :team_id LIMIT 18";
        $params = [':team_id' => $team_id];
        $stmt = $this->db->query($sql, $params);   
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function filterPlayers($name)
    {

    }
    public function filterPlayersByPosition($position)
    {

    }

}