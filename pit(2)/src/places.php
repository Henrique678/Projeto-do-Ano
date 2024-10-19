<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <style>
    img {
        width: 600px;
    }

    .main-div {
        display: grid;
        grid-template-columns: 600px 600px;
        grid-template-rows: 400px;
        grid-column-gap: 50px;
    }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="main-div">
        <div id="div-img">
            <img src="<?php echo $place['img']?>" alt="erro">
        </div>
        <div id="div-dados">
            <h1><?php echo $place['nome']?></h1>
            <p><?php echo $place['categoria']?></p>
            <div class="endereco">
                <span><?php echo $place['endereco'], ", ", $place['numero'], ", " ,$place['bairro']?> <br>
                    <?php echo $place['cidade'], " - ", $place['cep']?> <br>
                </span>
            </div>
            <div class=" contato-place">
                <span class="telefone">Telefone: <?php echo $place['telefone']?></span> <br>
                <span>E-mail: <br><?php echo $place['emailPlace']?> <br> <a
                        href=" https://api.whatsapp.com/send?text=">Compartilhar</a></span>
            </div>
            <div id="div-texto"><?php echo $place['descricao']?></div>
            <p>Avalie esse local!!</p>
            <input type="text">
        </div>
    </div>
</body>

</html>