<?php
namespace Shubham\Worldcup\Controllers;

use Shubham\Worldcup\Models\UserModel;
use Shubham\Worldcup\Lib\Response;


class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function register()
    {
        try {
            // Validate incoming data
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(empty($username) || empty($password)) {
                Response::error('Username add password are required.', [], 400);
                return;
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $postData = [
                'username' => $username,
                'password' => $hashedPassword
            ];
            $result = $this->userModel->create($postData);
            
            if($result) {
                Response::success('User created successfuly!');
            } else {
                Response::error('Error creating user.');
            }
        } catch (\PDOException $e) {
            Response::error('Database Error: ' .$e->getMessage(), [], 500);
        }
    }

    public function verify() 
    {
    
        try {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Validation: Make sure username and password are not empty
            if(empty($username) || empty($password)) {
                Response::error('Username add password are required.', [], 400);
                return;
            }

            // DO THIS
            $user = $this->userModel->getUserByUsername($username);

            if(!$user) {
                Response::error('User not found.', [], 404);
                return;
            }


            //Verify the password
            if(password_verify($password, $user['password'])) {

                   //Create a token
                   $token = bin2hex(random_bytes(16));

                   $this->userModel->storeUserToken($username, $token);

                   // Set HttpOnly cookie
                   setcookie("auth_token", $token, [
                    "httponly" => true,
                    // HttpOnly flag
                    "samesite" => "Strict",
                    //SameSite flag
                    ]);
        
                Response::success('Login successful.');
             } else {
               
                Response::error('User not found.', [], 401);
           
            }

        }
        catch(\PDOException $e) {
            Response::error('Database Error:' . $e->getMessage(), [], 500);
        }
    }

    public function allUsers()
    {
        $users = $this->userModel->getAllUsers();
        if ($users) {
            // If users were retrieved successfully
            header('Content-Type: application/json');
            // User the Response class and its static method 'success'
            Response::success('', ['users' => $users]);
        } else {
            // No users found or there was an error
            header('Content-Type: application/json');
            http_response_code(404); // Not Found status code
            Response::error('No users found.', [], 404);
        }
    }

    public function validateToken()
    {
        //Fetch token from HttpOnly cookie
        $token = $_COOKIE['auth_token'];

        if(!$token || !$this->userModel->getUserByToken($token)) {
            // Send unauthorised response
            Response::error('Unauthorized access', [], 401);
            return;
        }

        // If validation is successful, proceed to dashboard
        require_once(__DIR__ . '/../../views/dashboard.php');

    }

    public function logout() 
    {

        // Fetch token from HttpOnly cookie
        $token = $_COOKIE['auth_token'] ?? null;
        if(!$token) {
            Response::error('No token found.', [], 400);
            return;
        }

        try {

            $result = $this->userModel->removeUserToken($token);

            if($result) {
   
                unset($_COOKIE['auth_token']); //Test
                setcookie('auth_token', '', time() - 3600, '/'); // empty value and old timestamp

                Response::success('Logout successful.');
            } else {
                Response::error('Logout failed.');
            }
        } catch (\Exception $e) {
            Response::error('Database Error: '. $e->getMessage(), [], 500);
        }

    }

}

