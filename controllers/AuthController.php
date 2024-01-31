<?php

class AuthController extends AbstractManager
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login(): void
    {
        $route = 'login';
        require 'templates/layout.phtml';
    }

    public function register(): void
    {
        $route = 'register';
        require 'templates/layout.phtml';
    }
    public function checkLogin(): void
    {
        $newUserManager = new UserManager();
        if (isset($_POST['email'], $_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $newUserManager->find($email, $password);
            if ($_SESSION['connecter'] === true) {
                header('location: http://localhost/Auth_MVC/auth_MVC/index.php?route=espace_perso');;
            } else if ($_SESSION['connecter'] === false) {
                header('location: http://localhost/Auth_MVC/auth_MVC/index.php?route=login');;
            }
        }
    }

    public function checkRegister(): void
    {
        $newUserManager = new UserManager();
        if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            $newUser = new User($username, $email, $password, $role);
            $newUserManager->create($newUser);
            header('location: index.php?route=espace_perso');
            exit;
        }
    }
}
