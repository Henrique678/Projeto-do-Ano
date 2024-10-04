<?php 
    require_once("..\conecta.php");
    include('protect.php');
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch ($action) {
        case (1 && 2 && 3 && 4 && 5 && 6 && 7 && 8):
                $idUser = $_SESSION['idUser'];
                $sql = "insert into favoritos (fk_idUser, fk_idPlace) values ('$idUser', '$action')";
                $res = mysqli_query(con(), $sql);
                header("Location: ..\login\painel.php");
            break;
  
        case 'add-coment':
                if(isset($_POST['btn']))
                {
                 $coment = $_POST['coment'];
                    $sql = "insert into comentarios (coment, datahora) values ('$coment', now())";
                    $res = mysqli_query(con(), $sql);
                    header("Location: ..\mercado.php");
                };
            break;

    }
?>