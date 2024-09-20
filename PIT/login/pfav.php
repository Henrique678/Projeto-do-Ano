<?php
    include('protect.php');

    include('protect.php');

    require_once("..\conecta.php");
  $sqlplace1 = "select idPlace from places where idPlace = 1";
  $res1 = mysqli_query(con(), $sqlplace1);
  $linha1 = mysqli_fetch_array($res1, 1);
  $idsplace1 = implode(", ", $linha1);
  $sql1 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from favoritos join Places on(idPlace = fk_idPlace) where idPlace = '$idsplace1'";
  $res1 = mysqli_query(con(), $sql1);
  $linha1 = mysqli_fetch_array($res1, 1);

  $sqlplace2 = "select idPlace from places where idPlace = 2";
  $res2 = mysqli_query(con(), $sqlplace2);
  $linha2 = mysqli_fetch_array($res2, 1);
  $idsplace2 = implode(", ", $linha2);
  $sql2 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from favoritos join Places on(idPlace = fk_idPlace) where idPlace = '$idsplace2'";
  $res2 = mysqli_query(con(), $sql2);
  $linha2 = mysqli_fetch_array($res2, 1);

  $sqlplace3 = "select idPlace from places where idPlace = 3";
  $res3 = mysqli_query(con(), $sqlplace3);
  $linha3 = mysqli_fetch_array($res3, 1);
  $idsplace3 = implode(", ", $linha3);
  $sql3 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from favoritos join Places on(idPlace = fk_idPlace) where idPlace = '$idsplace3'";
  $res3 = mysqli_query(con(), $sql3);
  $linha3 = mysqli_fetch_array($res3, 1);

  $sqlplace4 = "select idPlace from places where idPlace = 4";
  $res4 = mysqli_query(con(), $sqlplace4);
  $linha4 = mysqli_fetch_array($res4, 1);
  $idsplace4 = implode(", ", $linha4);
  $sql4 = "select nome, endereco, numero, bairro, cidade, cep, telefone, emailPlace, img from favoritos join Places on(idPlace = fk_idPlace) where idPlace = '$idsplace4'";
  $res4 = mysqli_query(con(), $sql4);
  $linha4 = mysqli_fetch_array($res4, 1);
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
          <input id="tema" type="checkbox"></input>
        </div>
      </div>
    </header>
    <h1>FAVORITOS</h1>
    <div class="container-places">
    <?php 
      if($res1->num_rows != 0)
      {
        ?>
          <div class="place">
            <img src="<?php echo $linha1['img']?>" alt="img-error">
            <h3 id="title"><a href="mercado.php"><?php echo $linha1['nome']?></a><form action="..\login\index2.php?action=2" method="post"><button  name="btn-favoritar">Remover favorito</button></form></h3>
            <div class="info-places">
            <div class="endereco">
              <span ><?php echo $linha1['endereco'], ", ", $linha1['numero'], ", " ,$linha1['bairro']?> <br> <?php echo $linha1['cidade'], " - ", $linha1['cep']?> <br> <a href="">Compartilhar</a></span>
            </div>
            <div class="contato-place" >
              <span><?php echo $linha1['telefone']?></span>
              <span>E-mail: <?php echo $linha1['emailPlace']?></span>
            </div>
          </div>
        </div>
      <?php
      } else {
        $linha1['nome'] = " ";
        $linha1['endereco'] = " ";
        $linha1['numero'] = " ";
        $linha1['bairro'] = " ";
        $linha1['cidade'] = " ";
        $linha1['cep'] = " ";
        $linha1['telefone'] = " ";
        $linha1['emailPlace'] = " ";
        $linha1['img'] = " ";
      }

      if($res2->num_rows != 0)
      {
        ?>
          <div class="place">
            <img src="<?php echo $linha2['img']?>" alt="img-error">
            <h3 id="title"><a href="mercado.php"><?php echo $linha2['nome']?></a><form action="..\login\index2.php?action=4" method="post"><button  name="btn-favoritar">Remover favorito</button></form></h3>
            <div class="info-places">
            <div class="endereco">
              <span ><?php echo $linha2['endereco'], ", ", $linha2['numero'], ", " ,$linha2['bairro']?> <br> <?php echo $linha2['cidade'], " - ", $linha2['cep']?> <br> <a href="">Compartilhar</a></span>
            </div>
            <div class="contato-place" >
              <span><?php echo $linha2['telefone']?></span>
              <span>E-mail: <?php echo $linha2['emailPlace']?></span>
            </div>
          </div>
        </div>
    <?php
      } else {
        $linha2['nome'] = " ";
        $linha2['endereco'] = " ";
        $linha2['numero'] = " ";
        $linha2['bairro'] = " ";
        $linha2['cidade'] = " ";
        $linha2['cep'] = " ";
        $linha2['telefone'] = " ";
        $linha2['emailPlace'] = " ";
        $linha2['img'] = " ";
      }

      if($res3->num_rows != 0)
      {
        ?>
          <div class="place">
            <img src="<?php echo $linha3['img']?>" alt="img-error">
            <h3 id="title"><a href="mercado.php"><?php echo $linha3['nome']?></a><form action="..\login\index2.php?action=6" method="post"><button  name="btn-favoritar">Remover favorito</button></form></h3>
            <div class="info-places">
            <div class="endereco">
              <span ><?php echo $linha3['endereco'], ", ", $linha3['numero'], ", " ,$linha3['bairro']?> <br> <?php echo $linha3['cidade'], " - ", $linha3['cep']?> <br> <a href="">Compartilhar</a></span>
            </div>
            <div class="contato-place" >
              <span><?php echo $linha3['telefone']?></span>
              <span>E-mail: <?php echo $linha3['emailPlace']?></span>
            </div>
          </div>
        </div>
    <?php
      } else {
        $linha3['nome'] = " ";
        $linha3['endereco'] = " ";
        $linha3['numero'] = " ";
        $linha3['bairro'] = " ";
        $linha3['cidade'] = " ";
        $linha3['cep'] = " ";
        $linha3['telefone'] = " ";
        $linha3['emailPlace'] = " ";
        $linha3['img'] = " ";
      }

      if($res4->num_rows != 0)
      {
        ?>
          <div class="place">
            <img src="<?php echo $linha4['img']?>" alt="img-error">
            <h3 id="title"><a href="mercado.php"><?php echo $linha4['nome']?></a><form action="..\login\index2.php?action=8" method="post"><button  name="btn-favoritar">Remover favorito</button></form></h3>
            <div class="info-places">
            <div class="endereco">
              <span ><?php echo $linha4['endereco'], ", ", $linha4['numero'], ", " ,$linha4['bairro']?> <br> <?php echo $linha4['cidade'], " - ", $linha4['cep']?> <br> <a href="">Compartilhar</a></span>
            </div>
            <div class="contato-place" >
              <span><?php echo $linha4['telefone']?></span>
              <span>E-mail: <?php echo $linha4['emailPlace']?></span>
            </div>
          </div>
        </div>
    <?php
      } else {
        $linha4['nome'] = " ";
        $linha4['endereco'] = " ";
        $linha4['numero'] = " ";
        $linha4['bairro'] = " ";
        $linha4['cidade'] = " ";
        $linha4['cep'] = " ";
        $linha4['telefone'] = " ";
        $linha4['emailPlace'] = " ";
        $linha4['img'] = " ";
      }
    ?>
    </div>
</body>
</html>