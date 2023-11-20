<?php
namespace Shubham\Worldcup\Models;

use Shubham\Worldcup\Models\BaseModel;

class TeamModel extends BaseModel
{
    // protected $db;
    protected $table = 'teams';
    public function getTeams()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY team DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}