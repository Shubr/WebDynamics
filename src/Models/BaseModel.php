<?php
namespace Shubham\Worldcup\Models;

use Shubham\Worldcup\Lib\Database;

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new Database();
    }

    // CREATE
    public function create(array $data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $this->db->query($sql, $data);

        return $this->db->getLastInsertId();
    }

    // READ by ID
    public function read($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->db->query($sql, ['id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // UPDATE by ID
    public function update($id, array $data)
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key} = :{$key}, ";
        }
        $set = rtrim($set, ', ');

        $sql = "UPDATE {$this->table} SET {$set} WHERE id = :id";
        $data['id'] = $id; // Add ID to bind parameters

        return $this->db->query($sql, $data);
    }

    // DELETE by ID
    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        return $this->db->query($sql, ['id' => $id]);
    }

    // UTILITY: Retrieve all records
    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // UTILITY: Count all records
    public function countAll()
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->table}";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['count'];
    }
}