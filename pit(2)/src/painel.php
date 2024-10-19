<?php
    include('protect.php');
    include('conexao.php');
    require_once("conecta.php");
    $idPlace;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel</title>
    <link rel="stylesheet" href="style.css" />
    <script type="module" src="https://unpkg.com/@googlemaps/extended-component-library@0.6"></script>
    </script>
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

    h3 {
        margin: 0;
    }

    #title {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
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
            <h4>
                <a href="newplace.php">Deseja incluir seu estabelecimento em nosso site? Clique
                    Aqui!</a>
            </h4>
        </div>
        <?php include('show.php'); ?>
    </div>
    <script src="javascript.js"></script>
</body>

</html>