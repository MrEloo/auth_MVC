<?php

class UserManager extends AbstractManager
{
    private array $allUsers = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function find($email, $password): void
    {
        $selectQuery = $this->db->prepare('SELECT * FROM users  WHERE email = :email');
        $parameters = [
            'email' => $email
        ];
        $selectQuery->execute($parameters);
        $user = $selectQuery->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($email === $user['email']) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['connecter'] = true;
                } else {
                    $_SESSION['connecter'] = false;
                }
            }
        }
    }

    public function create(User $user): void
    {
        $CreateQuery = $this->db->prepare('INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)');
        $parameters = [
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
        ];
        $CreateQuery->execute($parameters);

        $user->setId($this->db->lastInsertId());

        $this->allUsers[] = $user;
    }
}
