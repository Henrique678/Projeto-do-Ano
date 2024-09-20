<?php 
    function con()
{
    $pc = "localhost";
    $user = "root"; 
    $senha = "";
    $db = "pit";
    $con = mysqli_connect ($pc, $user, $senha, $db);
    if(!$con)
    {
        echo "Erro de conexão: ". mysqli_connect_error();
    }
    return $con;
    
}
