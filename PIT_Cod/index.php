<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $message = $userController->create($name, $email, $senha);
            echo $message;
            echo '<a href="login/login.php">Voltar para tela de login</a>';
        } else {
            include 'views/user/create.php';
        }
        break;

        // case 'read':
        //     if ($id) {
        //         $user = $userController->readOne($id);
        //         if (is_array($user)) {
        //             include 'views/user/show.php';
        //         } else {
        //             echo $user; // Exibir mensagem de erro
        //         }
        //     } else {
        //         echo 'User ID is required.';
        //     }
        //     break;

}
?>
