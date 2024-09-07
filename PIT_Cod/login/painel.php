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
          <a href="fav.html"><span>Favoritos</span></a>
          <div>
            <a class="nome_usuario" href="logout.php">Bem vindo <?php echo $_SESSION['name']?></a>
          </div>
            <div class="container_usuario">
                <img src="..\img\usuario_img-removebg-preview.png" alt="img_error" class="img_usuario"> 
                <div><span><?php echo $_SESSION['nome']?></span></div>
            </div>
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
      </div>
      
      <h4>
        <a href="newplace.php"
          >Deseja incluir seu estabelecimento em nosso site? Clique Aqui!</a
        >
      </h4>
    </div>
  </body>
</html>
