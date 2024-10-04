<?php 
    require_once("..\conecta.php");
    include('protect.php');
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    switch ($action) {

        case (1 && 2 && 3 && 4 && 5 && 6):
            $sql = "delete from favoritos where fk_idPlace = '$action'";
            $res = mysqli_query(con(), $sql);
            header("Location: ..\login\pfav.php");
        break;   
    }
?>