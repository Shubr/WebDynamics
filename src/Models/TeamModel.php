<?php
namespace Richard\Worldcup\Models;

use Richard\Worldcup\Models\BaseModel;

class TeamModel extends BaseModel
{
    // protected $db;
    protected $table = 'teams';
    public function getTeams($teams)
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY team DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}