<?php
    include('protect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Botão com Opções e Imagem</title>
    <link rel="stylesheet" href="..\style.css" />
</head>

<body>
    <header>
        <div class="div_principal">
            <div id="nome">
                <a href="painel.php">BH Explorer</a>
            </div>
            <div id="central">
                <a href="painel.php">Home</a>
                <a href="sobre.php">Sobre</a>
            </div>
            <div id="cadastro">
                <a href="pfav.php"><span>Favoritos</span></a>
                <a class="nome_usuario" href="logout.php">Bem vindo <?php echo $_SESSION['name']?></a>
                <label class="switch">
                    <input id="tema" type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </header>
    <h1>SOBRE</h1>
    <script src="..\javascript.js"></script>
</body>

</html>