<?php

include_once 'config/database.php';
include_once 'controllers/UserController.php';
include_once 'controllers/PlaceController.php';
include_once 'controllers/ComentController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$placeController = new PlaceController($db);
$comentController = new ComentController($db);

// Obter a ação e o ID (se aplicável) dos parâmetros da URL
$action = isset($_GET['action']) ? $_GET['action'] : '';
$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : null;
$idPlace = isset($_GET['idPlace']) ? $_GET['idPlace'] : null;
$idComent = isset($_GET['idComent']) ? $_GET['idComent'] : null;

// Determinar a ação do usuário
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $message = $userController->create($name, $email, $senha);
            echo '<script>alert("Usuário criado com sucesso");</script>';
            header("Location: login/login.php");
        } else {
            include 'views/user/create.php';
        }
        break;

        case 'read':
            if ($idComent) {
                $coment = $comentController->readOne($idComent);
                if (is_array($idComent)) {
                    include 'views/user/show.php';
                } else {
                    echo $coment; // Exibir mensagem de erro
                }
            } else {
                echo 'User ID is required.';
            }
            break;

        case 'delete':
            if ($id) {
                $message = $userController->delete($id);
                echo $message;
                echo '<a href="index.php">Back to User List</a>';
            } else {
                echo 'User ID is required.';
            }
            break;

        default:
            $places = $placeController->index();
            include 'home.php';
            break;
        }
?>
<?php

            include_once 'config/database.php';
            include_once 'controllers/ComentController.php';
            
            $database = new Database();
            $db = $database->getConnection();
            
            $comentController = new ComentController($db);
            
            // Obter a ação e o idComent (se aplicável) dos parâmetros da URL
            $action = isset($_GET['action']) ? $_GET['action'] : '';
            $idComent = isset($_GET['idComent']) ? $_GET['idComent'] : null;
            
            // Determinar a ação do usuário
            switch ($action) {
                case 'create-coment':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $comentario = $_POST['comentario'];
                        $prazo = $_POST['prazo'];
                        $message = $comentController->create($comentario, $prazo);
                        echo $message;
                        echo '<a href="index.php">Back to Coment List</a>';
                    } else {
                        include 'views/coment/create.php';
                    }
                    break;
            
                case 'read-coment':
                    if ($idComent) {
                        $coment = $comentController->readOne($idComent);
                        if (is_array($coment)) {
                            include 'views/coment/show.php';
                        } else {
                            echo $coment; // Exibir mensagem de erro
                        }
                    } else {
                        echo 'Coment idComent is required.';
                    }
                    break;
            
                case 'update-coment':
                    if ($idComent) {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $comentario = $_POST['comentario'];
                            $prazo = $_POST['prazo'];
                            $message = $comentController->update($idComent, $comentario, $prazo);
                            echo $message;
                            echo '<a href="index.php">Back to Coment List</a>';
                        } else {
                            $coment = $comentController->readOne($idComent);
                            include 'views/coment/update.php';
                        }
                    } else {
                        echo 'Coment idComent is required.';
                    }
                    break;
            
                case 'delete-coment':
                    if ($idComent) {
                        $message = $comentController->delete($idComent);
                        echo $message;
                        echo '<a href="index.php">Back to Coment List</a>';
                    } else {
                        echo 'Coment ID is required.';
                    }
                    break;
            
                default:
                    $coments = $comentController->index();
                    include 'mercado.php';
                    break;
            }
?>




