<?php

include_once 'database.php';
include_once 'Controller.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$placeController = new PlaceController($db);
$comentController = new ComentController($db);
$favController = new FavController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$idPlace = isset($_GET['idPlace']) ? $_GET['idPlace'] : null;



// Determinar a ação do usuário
switch ($action) {
    case 'create-user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $message = $userController->create_user($name, $email, $senha);
            echo $message;
            header("Location: login.php");
        } else {
            include 'create.php';
        }
        break;

        
    case 'read-user':
        if ($idUser) {
            $user = $userController->readOne_user($idUser);
            if (is_array($user)) {
                include 'views/user/show.php';
            } else {
                echo $user; // Exibir mensagem de erro
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'update-user': 
        if ($idUser) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $message = $userController->update_user($id, $name, $email, $senha);
                echo $message;
                echo '<a href="index.php">Back to User List</a>';
            } else {
                $user = $userController->readOne_user($idUser);
                include 'views/user/update.php';
            }
        } else {
            echo 'User ID is required.';
        }
        break;

    case 'delete-user':
        if ($idUser) {
            $message = $userController->delete_user($idUser);
            echo $message; 
            echo '<a href="index.php">Back to User List</a>';
        } else {
            echo 'User ID is required.';
        }
        break;

        case 'read-place':
                $place = $placeController->readOne_place($idPlace);
                if (is_array($place)) {
                    include 'places.php';
                } else {
                    echo $places; // Exibir mensagem de erro
                }
            break;

        case 'add-coment':
            require_once('protect.php');
            $coment = $_POST['coment'];
            $fk_idUser = $_SESSION['idUser'];
            $message = $comentController->create_coment($coment, $fk_idUser);
            header('Location: mercado.php');    
       break;

        // criar favorito
    case (1 && 2 && 3 && 4 && 5 && 6 && 7 && 8):
            require_once('protect.php');
            $fk_idUser = $_SESSION['idUser'];
            $fk_idPlace = $action; 
            $message = $favController->create_fav($fk_idUser, $fk_idPlace);
            include ('painel.php');
            ?>
<script>
alert('Favorito adicionado!');
</script>
<?php
            
        break;

        



    default:
        // header('Location: home.php');
        break;  

    }

    $delete = isset($_GET['delete']) ? $_GET['delete'] : '';
    $fk_idPlace = isset($_GET['fk_idPlace']) ? $_GET['fk_idPlace'] : null;
    
    switch ($delete) {
 
    case (1 && 2 && 3 && 4 && 5 && 6):
            $message = $favController->delete_fav($fk_idPlace);
            include('pfav.php');
            ?>
<script>
alert('Favorito removido!');
</script>
<?php 
        break;   
    }
?>


<?php 
    
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch ($action) {
       
       
    }
    ?>