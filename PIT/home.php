<?php
  require_once("conecta.php");
  $idmercado = 1;
  $sql = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from places where idPlace = '$idmercado'";
  $res = mysqli_query(con(), $sql);
  $linha = mysqli_fetch_array($res, 1);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Botão com Opções e Imagem</title>
    <link rel="stylesheet" href="style.css" />
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
          <a href="login\fav.php"><span>Favoritos</span></a>
          <a href="login\login.php"><span>Logar / Criar conta</span></a>
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
        <a href="newplace.php">Deseja incluir seu estabelecimento em nosso site? Clique Aqui!</a>
      </h4>
      </div>
      <div class="container-places">
        <div class="place">
          <img src="https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg" alt="img-error">
          <h3 id="title"><a href="mercado.php"><?php echo $linha['nome']?></a><form action="favoritar" method="post"><button name="btn-favoritar">Favoritar</button></form></h3>
          <div class="info-places">
            <div class="endereco">
              <span><?php echo $linha['endereco'], ", ", $linha['numero'], ", " ,$linha['bairro']?> <br> <?php echo $linha['cidade'], " - ", $linha['cep']?> <br> <a href="">Compartilhar</a></span>
            </div>
            <div class="contato-place">
              <span><?php echo $linha['telefone']?></span>
              <span>E-mail: <?php echo $linha['emailPlace']?></span>
            </div>
          </div>
        </div>
        <div class="place">
          <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Praca_do_Papa%2C_Belo_Horizonte_%28cropped%29.jpg" alt="img-erro">
          <h3 id="title"><a href="mercado.php">Praça do Papa</a></h3>
          <div class="info-places">
            <div class="endereco">
              <span>Av. Agulhas Negras, Mangabeiras, <br> Belo Horizonte - MG 30210-060</span>
            </div>
            <div class="contato-place">
              <span>Telefone: (31) 35551100</span>
              <span>E-mail: cgpd@cmbh.mg.gov.br</span>
            </div>
          </div>
        </div>
        <div class="place">
          <img src="https://www.hojeemdia.com.br/image/policy:1.822039.1671229484:1671229484/image.jpg?w=1280&" alt="img-error">
            <div class="info-places">
              <h3>Praça da Estação</h3>
              <span>Av. dos Andradas <br> Centro, Belo Horizonte <br> MG 30110-009</span>
            </div>
        </div>
        <div class="place">
          <?php 
            echo $linha['nome'];
          ?>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
