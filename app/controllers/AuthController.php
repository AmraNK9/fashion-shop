<?php
require_once __DIR__ . "/../../configs/database.php";

class AuthController
{

    public function __construct()
    {

        // echo session_status();
        
        if (!isset($_SESSION)) {
            session_start();
        }
        // if (!isset($_SESSION['cart'])) {
        //     $_SESSION['cart'] = [];
        // }
    }

    /**
     * Register a new user
     */
    public function storeUser($userId, $name, $role,$email )
    {

        // Check if email already exists
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_role'] = $role;
        $_SESSION['email'] = $email;
    }

    
    /**
     * Log out a user
     */
    public function logout()
    {
        // Clear all session variables
        session_unset();
        session_destroy();
        header("Location: http://localhost/fashion_shop/");
        exit;

    }

    /**
     * Check if a user is logged in
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get the current logged-in user's details
     */
    public function getUser()
    {
        if ($this->isLoggedIn()) {
            return [
                'id' => $_SESSION['user_id'],
                'name' => $_SESSION['user_name'],
                'role' => $_SESSION['user_role'],
                'email' => $_SESSION['email']
            ];
        }

        return null;
    }

    public function index(){
        $user = $this->getUser();
        //  var_dump($user);
        include __DIR__.'/../../views/auth/myprofile.php';

    }
}
