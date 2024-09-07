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
        margin-left: 5%;
        flex-direction: column;
      }

      h4 {
        margin-left: 5%;
      }

      .place {
        width: 400px;
        border: solid;
        height: 250px;
        margin-bottom: 40px;
        display: flex;
      }

      .all-home {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 100%;
        height: 1000px;
        align-items: top;
      }

      .container-places {
        margin-right: 5%;
        width: 1000px;
        display: grid;
        grid-template-columns: 400px 400px;
        grid-column-gap: 200px;
        
      }

      img {
        width: 200px;
        height: auto;
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
          <a href="fav.html"><span>Favoritos</span></a>
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
          <img src="https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg" alt="erro">
          <div>
            <span><a href="mercado.php">Mercado Central</a> <br></span>
            <span>Av. Augusto de Lima, 744 - Centro, Belo Horizonte - MG, 30190-922</span>
          </div>
        </div>
        <div class="place">
        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Praca_do_Papa%2C_Belo_Horizonte_%28cropped%29.jpg" alt="erro">
          <div>
            <span>Praça do Papa<br></span>
            <span>Av. Agulhas Negras, s/n - Mangabeiras, Belo Horizonte - MG, 30210-060</span>
          </div>
        </div>
        <div class="place"></div>
        <div class="place"></div>
      </div>
    </div>
    </div>
  </body>
</html>
