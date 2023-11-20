<?php
namespace Shubham\Worldcup\Models;

use Shubham\Worldcup\Models\BaseModel;

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
        $sql = "SELECT * FROM {$this->table} WHERE name LIKE :name LIMIT 18";
        $params = [':name' => "%$name%"];
        $stmt = $this->db->query($sql, $params);   
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function filterPlayersByPosition($position)
    {
        $sql = "SELECT * FROM {$this->table} WHERE position = :position LIMIT 18";
        $params = [':position' => $position];
        $stmt = $this->db->query($sql, $params);   
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected $table1 = 'players';

    public function DeleteByPlayer($player_id)
    {
        $sql = "DELETE FROM {$this->table1} WHERE id = :player_id";
        $params = ['player_id' => $player_id];
        return $this->db->query($sql, $params);
    }

}