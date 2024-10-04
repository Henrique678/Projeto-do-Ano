<?php
  include('login\conexao.php');
  require_once("conecta.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    <style>
    :root {
        --input-focus: #2d8cf0;
        --font-color: #323232;
        --font-color-sub: #666;
        --bg-color: #fff;
        --main-color: #323232;
    }

    .place-picker-container {
        padding: 20px;
        width: 300px;
    }

    #map {
        height: 90%;
        width: 30%;
        display: flex;
        justify-content: center;
        width: 30%;
        margin-left: 2%;
        margin-right: 80px;
        flex-direction: column;
    }

    h4 {
        margin-left: 5%;
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

    .all-home {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 1000px;
        align-items: top;
    }

    .container-places {
        margin-right: 5%;
        width: 1000px;
        display: grid;
        grid-template-columns: 500px 500px;
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
        display: grid;
        grid-template-columns: 220px 220px;
        grid-template-rows: auto;
        grid-column-gap: 20px;
        grid-row-gap: 0;
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

    .header-busca {
        height: 100px;
        width: 1000px;
        display: flex;
        flex-direction: column;
        align-items: center;
        grid-column-start: 1;
        grid-column-end: 3;
    }

    .header-busca form input {
        width: 500px;
    }

    .right {
        display: grid;
        grid-template-columns: 500px 500px;
        grid-template-rows: 150px 400px 400px;
        grid-column-gap: 150px;
        grid-row-gap: 50px;
    }

    .input-form-login {
        width: 250px;
        height: 26px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 15px;
        font-weight: 600;
        color: var(--font-color);
        padding: 5px 10px;
        outline: none;
    }

    .input-form-login::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
    }

    .input-form-login:focus {
        border: 2px solid var(--input-focus);
    }

    .button-confirm:active {
        box-shadow: 0px 0px var(--main-color);
        transform: translate(3px, 3px);
    }

    .button-confirm {
        width: 120px;
        height: 40px;
        border-radius: 5px;
        border: 2px solid var(--main-color);
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 17px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
    }

    .telefone {
        width: 220px;
    }
    </style>
</head>

<body>
    <header>
        <div class="div_principal">
            <div id="nome">
                <a href="home.php">BH Explorer</a>
            </div>
            <div id="central">
                <a href="home.php">Home</a>
                <a href="sobre.php">Sobre</a>
            </div>
            <div id="cadastro">
                <a href="login\pfav.php"><span>Favoritos</span></a>
                <a href="login\login.php"><span>Logar / Criar conta</span></a>
                <label class="switch">
                    <input id="tema" type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </header>
    <div class="all-home">
        <div id="map">
            <gmpx-api-loader key="AIzaSyCHD4wW2cRkm8DYYIFzp6PNcW3-UI6HJW0"
                solution-channel="GMP_GE_mapsandplacesautocomplete_v1">
            </gmpx-api-loader>
            <gmp-map center="-19.919065043645404, -43.938633023313436" zoom="13" map-id="DEMO_MAP_ID">
                <div slot="control-block-start-inline-start" class="place-picker-container">
                    <gmpx-place-picker placeholder="Enter an address"></gmpx-place-picker>
                </div>
                <gmp-advanced-marker></gmp-advanced-marker>
            </gmp-map>
            <script src="javascript.js"></script>
            <h4>
                <a href="newplace.php">Deseja incluir seu estabelecimento em nosso site? Clique Aqui!</a>
            </h4>
        </div>
        <div class="right">
            <div class="header-busca">
                <h1>Pontos Turísticos</h1>
                <form action="">
                    <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>"
                        placeholder="Digite o nome do local" type="text" class="input-form-login">
                    <button type="submit" class="button-confirm">Pesquisar</button>
                </form>
            </div>
            <?php 
        if (!isset($_GET['busca'])) {
            $sql_code = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img, insta, waze from places";
            $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar");
            while($dados = $sql_query->fetch_assoc()) { ?>
            <div class="place">
                <img src="<?php echo $dados['img']?>" alt="erro">
                <h3 id="title"><a href="mercado.php"><?php echo $dados['nome']?></a>
                    <button name="btn-favoritar"><a href="login\pfav.php">Favoritar</a></button>
                </h3>
                <div class="info-places">
                    <div class="endereco">
                        <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br>
                            <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a
                                href="<?php echo $dados['insta']?>" style="margin-right: 20px">Instagram</a><a
                                href="<?php echo $dados['waze']?>">Rotas</a></span>
                    </div>
                    <div class="contato-place">
                        <span class="telefone">Telefone: <?php echo $dados['telefone']?></span>
                        <span>E-mail: <br><?php echo $dados['emailPlace']?></span>
                    </div>
                </div>
            </div>
            <?php
          
          } 
        } else {
          $pesquisa = $mysqli->real_escape_string($_GET['busca']);
          $sql_code = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img, insta, waze from places where nome like '%$pesquisa%'";
          $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar");

          if ($sql_query->num_rows == 0) {
            echo "Nenhum resultado encontrado para: ";
            echo $_GET['busca'];
          } else {
            
              while($dados = $sql_query->fetch_assoc()) {
                ?>
            <div class="place">
                <img src="<?php echo $dados['img']?>" alt="erro">
                <h3 id="title"><a href="..\mercado.php"><?php echo $dados['nome']?></a>
                    <button name="btn-favoritar"><a href="login\pfav.php">Favoritar</a></button>
                </h3>
                <div class="info-places">
                    <div class="endereco">
                        <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br>
                            <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a
                                href="<?php echo $dados['insta']?>" style="margin-right: 20px">Instagram</a><a
                                href="<?php echo $dados['waze']?>">Rotas</a></span>
                    </div>
                    <div class="contato-place">
                        <span class="telefone">Telefone: <?php echo $dados['telefone']?></span>
                        <span>E-mail: <br><?php echo $dados['emailPlace']?></span>
                    </div>
                </div>
            </div>
            <?php
              
              }
          }
        }
      ?>
        </div>
    </div>
    <script src="../javascript.js"></script>
</body>

</html>