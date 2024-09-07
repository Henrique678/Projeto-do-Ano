<?php

include_once 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    // Método para criar um novo usuário
    public function create($name, $email, $senha) {
        $this->user->name = $name;
        $this->user->email = $email;
        $this->user->senha = $senha;

        if($this->user->create()) {
            return "Usuário criado.";
        } else {
            return "Não foi possível criar usuário.";
        }
    }
}
?>
