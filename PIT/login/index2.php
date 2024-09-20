<?php 
    require_once("..\conecta.php");
    include('protect.php');
    $idmercado = 1;
    $idpraca = 2;
    $idpraca2 = 3;
    $idlagoa = 4;
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    
    switch ($action) {
      case '1':
                $idUser = $_SESSION['idUser'];
                $sql1 = "insert into favoritos (fk_idUser, fk_idPlace) values ('$idUser', '$idmercado')";
                $res1 = mysqli_query(con(), $sql1);
                header("Location: ..\login\painel.php");
            break;

      case '2':
                $sql2 = "delete from favoritos where fk_idPlace = '$idmercado'";
                $res2 = mysqli_query(con(), $sql2);
                header("Location: ..\login\pfav.php");
            break;

            case '3':
                $idUser = $_SESSION['idUser'];
                $sql3 = "insert into favoritos (fk_idUser, fk_idPlace) values ('$idUser', '$idpraca')";
                $res3 = mysqli_query(con(), $sql3);
                header("Location: ..\login\painel.php");
            break;

      case '4':
                $sql4 = "delete from favoritos where fk_idPlace = '$idpraca'";
                $res4 = mysqli_query(con(), $sql4);
                header("Location: ..\login\pfav.php");
            break;

            case '5':
                $idUser = $_SESSION['idUser'];
                $sql5 = "insert into favoritos (fk_idUser, fk_idPlace) values ('$idUser', '$idpraca2')";
                $res5 = mysqli_query(con(), $sql5);
                header("Location: ..\login\painel.php");
            break;

      case '6':
                $sql6 = "delete from favoritos where fk_idPlace = '$idpraca2'";
                $res6 = mysqli_query(con(), $sql6);
                header("Location: ..\login\pfav.php");
            break;

            case '7':
                $idUser = $_SESSION['idUser'];
                $sql7 = "insert into favoritos (fk_idUser, fk_idPlace) values ('$idUser', '$idlagoa')";
                $res7 = mysqli_query(con(), $sql7);
                header("Location: ..\login\painel.php");
            break;

      case '8':
                $sql8 = "delete from favoritos where fk_idPlace = '$idlagoa'";
                $res8 = mysqli_query(con(), $sql8);
                header("Location: ..\login\pfav.php");
            break;

    }
?>