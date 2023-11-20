<?php
namespace Shubham\Worldcup\Models;

use Shubham\Worldcup\Models\BaseModel;
use \PDOException;

class UserModel extends BaseModel
{

    // protected $db;
    protected $table = 'users';
    private $userModel;

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserById($id)
    {
    }

    public function getUserByUsername($username)
    {   
        $sql = "SELECT * FROM {$this->table} WHERE username = :username";
        $params = [':username' => $username];
        $stmt = $this->db->query($sql, $params);   
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserByToken($token)
    {
        $sql = "SELECT * FROM {$this->table} WHERE token = :token";
        $params = [':token' => $token];
        $stmt = $this->db->query($sql, $params);   
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function storeUserToken($username, $token)
    {
        try {
            $sql = "UPDATE users SET token =:token WHERE username = :username";
            $params = [':token' => $token, ':username' => $username];
            $stmt = $this->db->query($sql, $params);
        } catch (PDOException $e) {

        }
    }

    public function removeUserToken($token)
    {
        try {
            $sql = "UPDATE users SET token = NULL WHERE token =:token";
            $params = [':token' => $token];
            $stmt = $this->db->query($sql, $params);
            return true;
        } catch (PDOException $e) {

        }

    }

}