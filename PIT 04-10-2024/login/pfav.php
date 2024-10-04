<?php
    include('protect.php');
    include('..\login\conexao.php');
    include('protect.php');
    require_once("..\conecta.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\style.css" />
    <style>
    h1 {
        width: 100%;
        text-align: center;
    }

    .container-places {
        margin-right: 5%;
        width: 1000px;
        display: grid;
        grid-template-columns: 500px 500px 500px;
        grid-template-rows: 400px 400px;
        grid-column-gap: 150px;
        grid-row-gap: 50px;
    }

    img {
        width: 500px;
        height: 300px;
        margin-right: 10px;
    }

    .info-places {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        margin-top: 10px;
    }

    .info-places span {
        font-size: 14px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .info-places h3 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h3 {
        margin: 0;
    }

    .contato-place {
        display: flex;
        width: min-content;
        flex-direction: column;
    }

    #title {
        display: flex;
        justify-content: center;
    }

    .place button {
        margin-left: 10px;
        border-radius: 50px;
    }

    .place {
        width: 500px;
        border: solid;
        height: 400px;
        margin-bottom: 40px;
        display: flex;
        background-color: white;
        flex-direction: column;
    }
    </style>
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
    <h1>FAVORITOS</h1>
    <div class="container-places">
        <?php  
          $sql = "select fk_idPlace, nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from favoritos inner join Places on(idPlace = fk_idPlace)";
          $sql_query2 = $mysqli->query($sql) or die("Erro ao consultar");
          while($dados = $sql_query2->fetch_assoc()) {
                ?>
        <div class="place">
            <img src="<?php echo $dados['img']?>" alt="erro">
            <h3 id="title"><a href="..\mercado.php"><?php echo $dados['nome']?></a>
                <form action="..\login\index3.php?action=<?php echo $dados['fk_idPlace']?>" method="post">
                    <button name="btn-favoritar">Remover favorito</button>
                </form>
            </h3>
            <div class="info-places">
                <div class="endereco">
                    <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br>
                        <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a
                            href="https://api.whatsapp.com/send?text=">Compartilhar</a></span>
                </div>
                <div class="contato-place">
                    <span class="telefone">Telefone: <?php echo $dados['telefone']?></span>
                    <span>E-mail: <br><?php echo $dados['emailPlace']?></span>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>
    <script src="..\javascript.js"></script>
</body>

</html>