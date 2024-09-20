<?php
    include('protect.php');
    include('..\login\conexao.php');

    require_once("..\conecta.php");
    $idmercado = 1;
    $idpraca = 2;
    $idpraca2 = 3;
    $idlagoa = 4;
  $sql1 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where idPlace = '$idmercado'";
  $res1 = mysqli_query(con(), $sql1);
  $linha = mysqli_fetch_array($res1, 1);
  $sql2 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where idPlace = '$idpraca'";
  $res2 = mysqli_query(con(), $sql2);
  $linha2 = mysqli_fetch_array($res2, 1);
  $sql3 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where idPlace = '$idpraca2'";
  $res3 = mysqli_query(con(), $sql3);
  $linha3 = mysqli_fetch_array($res3, 1);
  $sql4 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where idPlace = '$idlagoa'";
  $res4 = mysqli_query(con(), $sql4);
  $linha4 = mysqli_fetch_array($res4, 1);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Botão com Opções e Imagem</title>
    <link rel="stylesheet" href="..\style.css" />
    <script
      type="module"
      src="https://unpkg.com/@googlemaps/extended-component-library@0.6"
    ></script>
    <style>
      .place-picker-container {
        padding: 20px;
        width: 300px;
      }
      #map {
        height: 700px;
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

      .header-busca {
        height: 100px;
        width: 1000px;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .header-busca form input {
        width: 500px;
      }

      .right {
        display: grid;
        grid-template-columns: 1000px;
        grid-template-rows: 100px 400px;
        grid-column-gap: 150px;
        grid-row-gap: 50px;
      }

    .wrapper {
  display: inline-flex;
  list-style: none;
  height: 40px;
  width: 30%;
  font-family: "Poppins", sans-serif;
  justify-content: center;
  margin: 0;
  border: 0;
}

.wrapper .icon {
  position: relative;
  background: #fff;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  font-size: 18px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip {
  position: absolute;
  top: 0;
  font-size: 14px;
  background: #fff;
  color: #fff;
  padding: 5px 8px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip::before {
  position: absolute;
  content: "";
  height: 8px;
  width: 8px;
  background: #fff;
  bottom: -3px;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover .tooltip {
  top: -45px;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.wrapper .icon:hover span,
.wrapper .icon:hover .tooltip {
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.1);
}

.wrapper .instagram:hover,
.wrapper .instagram:hover .tooltip,
.wrapper .instagram:hover .tooltip::before {
  background: #e4405f;
  color: #fff;
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
          <input id="tema" type="checkbox"></input>
        </div>
      </div>
    </header>
    <div class="all-home">
      <div id="map">
      <gmpx-api-loader
      key="AIzaSyCHD4wW2cRkm8DYYIFzp6PNcW3-UI6HJW0"
      solution-channel="GMP_GE_mapsandplacesautocomplete_v1"
    >
    </gmpx-api-loader>
    <gmp-map center="-19.919065043645404, -43.938633023313436" zoom="13" map-id="DEMO_MAP_ID">
      <div
        slot="control-block-start-inline-start"
        class="place-picker-container"
      >
        <gmpx-place-picker placeholder="Enter an address"></gmpx-place-picker>
      </div>
      <gmp-advanced-marker></gmp-advanced-marker>
    </gmp-map>
    <script src="javascript.js"></script>
    <h4>
        <a href="..\newplace.php">Deseja incluir seu estabelecimento em nosso site? Clique Aqui!</a>
      </h4>
      </div>
      <div class="right">
      <div class="header-busca">
        <h1>Pontos Turísticos</h1>
        <form action="">
          <input name="busca" value="<?php if(isset($_GET['busca'])) echo $_GET['busca'];?>" placeholder="Digite o nome do local" type="text">
          <button type="submit">Pesquisar</button>
        </form>
      </div>
      <?php 
        if (!isset($_GET['busca'])) {
          ?> <div class="container-places">
          <div class="place">
            <img src="<?php echo $linha['img']?>" alt="erro">
            <h3 id="title"><a href="mercado.php"><?php echo $linha['nome']?></a><form action="..\login\index2.php?action=1" method="post"><button name="btn-favoritar">Favoritar</button></form></h3>
            <div class="info-places">
              <div class="endereco">
                <span><?php echo $linha['endereco'], ", ", $linha['numero'], ", " ,$linha['bairro']?> <br> <?php echo $linha['cidade'], " - ", $linha['cep']?> <br> <a href="">Compartilhar</a></span>
              </div>
              <div class="contato-place">
                <span>Telefone: <?php echo $linha['telefone']?></span>
                <span>E-mail: <?php echo $linha['emailPlace']?></span>
              </div>
            </div>
          </div>
          <div class="place">
            <img src="<?php echo $linha2['img']?>" alt="img-erro">
            <h3 id="title"><a href="mercado.php"><?php echo $linha2['nome']?></a><form action="..\login\index2.php?action=3" method="post"><button name="btn-favoritar">Favoritar</button></form>
            <ul class="wrapper"><li class="icon instagram">
    <span class="tooltip">Instagram</span>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      height="1.2em"
      fill="currentColor"
      class="bi bi-instagram"
      viewBox="0 0 16 16"
    >
      <path
        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
      ></path>
    </svg>
  </li></ul></h3>
            <div class="info-places">
              <div class="endereco">
                <span><?php echo $linha2['endereco'], ", ", $linha2['numero'], ", " ,$linha2['bairro']?> <br> <?php echo $linha2['cidade'], " - ", $linha2['cep']?> <br> <a href="">Compartilhar</a></span>
              </div>
              <div class="contato-place">
                <span>Telefone: <?php echo $linha2['telefone']?></span>
                <span>E-mail: <?php echo $linha2['emailPlace']?></span>
              </div>
            </div>
          </div>
          <div class="place">
            <img src="<?php echo $linha3['img']?>" alt="img-error">
            <h3 id="title"><a href="mercado.php"><?php echo $linha3['nome']?></a><form action="..\login\index2.php?action=5" method="post"><button name="btn-favoritar">Favoritar</button></form>
            <ul class="wrapper"><li class="icon instagram">
    <span class="tooltip">Instagram</span>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      height="1.2em"
      fill="currentColor"
      class="bi bi-instagram"
      viewBox="0 0 16 16"
    >
      <path
        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
      ></path>
    </svg>
  </li></ul></h3>
            <div class="info-places">
              <div class="endereco">
                <span><?php echo $linha3['endereco'], ", ", $linha3['numero'], ", " ,$linha3['bairro']?> <br> <?php echo $linha3['cidade'], " - ", $linha3['cep']?> <br> <a href="">Compartilhar</a></span>
              </div>
              <div class="contato-place">
                <span>Telefone: <?php echo $linha3['telefone']?></span>
                <span>E-mail: <?php echo $linha3['emailPlace']?></span>
              </div>
            </div>
          </div>
          <div class="place">
            <img src="<?php echo $linha4['img']?>" alt="img-error">
              <h3 id="title"><a href="mercado.php"><?php echo $linha4['nome']?></a><form action="..\login\index2.php?action=7" method="post"><button name="btn-favoritar">Favoritar</button></form>
              <ul class="wrapper"><li class="icon instagram">
    <span class="tooltip">Instagram</span>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      height="1.2em"
      fill="currentColor"
      class="bi bi-instagram"
      viewBox="0 0 16 16"
    >
      <path
        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
      ></path>
    </svg>
  </li></ul></h3>
              <div class="info-places">
                <div class="endereco">
                  <span><?php echo $linha4['endereco'], ", ", $linha4['numero'], ", " ,$linha4['bairro']?> <br> <?php echo $linha4['cidade'], " - ", $linha4['cep']?> <br> <a href="">Compartilhar</a></span>
                </div>
                <div class="contato-place">
                  <span>Telefone: <?php echo $linha4['telefone']?></span>
                  <span>E-mail: <?php echo $linha4['emailPlace']?></span>
                </div>
              </div>
            </div>
          </div>
      </div> <?php
        } else {
          $pesquisa = $mysqli->real_escape_string($_GET['busca']);
          $sql_code = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where nome like '%$pesquisa%'";
          $sql_query = $mysqli->query($sql_code) or die("Erro ao consultar");

          if ($sql_query->num_rows == 0) {
            echo "Nenhum resultado encontrado";
            echo $_GET['busca'];
          } else {
            
              while($dados = $sql_query->fetch_assoc()) {
                ?>
                  <div class="place">
            <img src="<?php echo $dados['img']?>" alt="erro">
            <h3 id="title"><a href="..\mercado.php"><?php echo $dados['nome']?></a><form action="..\login\index2.php?action=1" method="post"><button name="btn-favoritar">Favoritar</button></form></h3>
            <div class="info-places">
              <div class="endereco">
                <span><?php echo $dados['endereco'], ", ", $dados['numero'], ", " ,$dados['bairro']?> <br> <?php echo $dados['cidade'], " - ", $dados['cep']?> <br> <a href="https://api.whatsapp.com/send?text=">Compartilhar</a></span>
              </div>
              <div class="contato-place">
                <span>Telefone: <?php echo $dados['telefone']?></span>
                <span>E-mail: <?php echo $dados['emailPlace']?></span>
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
  </body>
</html>

