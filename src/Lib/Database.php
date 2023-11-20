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
            
            // This part will bind the parameters to named placehoder in SQL
            foreach($params as $key => &$val) {
                $stmt->bindParam($key, $val);
            }

            $stmt->execute();

            return $stmt;
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getLastInsertId()
    {
        return $this->connection->lastInsertId();
    }
}

