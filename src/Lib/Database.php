<?php
namespace Shubham\Worldcup\Lib;
class Database
{
    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new \PDO("mysql:host=localhost;dbname=world-cup", 'root', '');
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            die("Database query error: " . $e->getMessage());
        }
    }

    public function getLastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}

