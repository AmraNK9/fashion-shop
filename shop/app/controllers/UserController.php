<?php
require_once __DIR__.'/../models/user.php';

class UserController{
    private $userModel = new User();
    public function index(){
        $users = $this->userModel->getUsers();
        include '/../../views/admin/users.php';
    }
    public function signUp(string $userName,string $password){
        
    }

    public function signIn(string $userName,string $password):bool{
        
        return false;
    }

    public function signOut(string $userName,string $password):bool{
        return false;
    }
}
?>