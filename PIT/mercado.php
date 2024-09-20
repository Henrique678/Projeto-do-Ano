<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Botão com Opções e Imagem</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      img {
        width: 500px;
      }
      #comentario {
        width: 200px;
        height: 200px;
        resize: none;
        outline: none;
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
          <a href="fav.php"><span>Favoritos</span></a>
          <a href="login\login.php"><span>Logar / Criar conta</span></a>
          <input id="tema" type="checkbox"></input>
        </div>
      </div>
    </header>
    <img src="https://mercadocentral.com.br/sitenovo/wp-content/uploads/2024/01/FACHADA-DA-PINTURA-NOVA-37-scaled.jpg" alt="erro">
    <p>O Mercado Central, anteriormente denominado Mercado Municipal de Belo Horizonte, é um mercado localizado no Centro de Belo Horizonte, na cidade de Belo Horizonte, no Brasil. Foi criado em 7 de setembro de 1929 pelo então prefeito Cristiano Machado. Pertenceu à Prefeitura de Belo Horizonte até 1964.[1] Seu galpão ocupa um quarteirão inteiro do Centro da cidade, sendo a entrada principal voltada para a avenida Augusto de Lima.</p>
    <p>Cristiano Machado fundou o Mercado em 1929. Na época, o mercado era um campo aberto, com barracas simples. Funcionava como um centro de distribuição de alimentos e outros gêneros, assim como hoje temos a CEASA-MG.

O Mercado funcionou perfeitamente até 1964, quando o prefeito Jorge Carone resolveu vender o terreno, alegando impossibilidade de administração. Cristiano Machado, juntamente com alguns comerciantes, comprou o mercado, para que a venda a terceiros fosse evitada. No entanto, os compradores enfrentaram, imediatamente, um primeiro empecilho: teriam que construir um galpão coberto, na área total do antigo mercado, dentro de um prazo de cinco anos. Caso não conseguissem, teriam que devolver a área à Prefeitura. A cada dia, novas dificuldades impediram o início da construção. A 15 dias do prazo dado pela prefeitura, ainda faltava o fechamento do mercado.
Foi então que os irmãos Osvaldo, Vicente e Milton de Araújo, fundadores do Banco Mercantil do Brasil, decidiram acreditar no empreendimento e investiram no projeto, financiando a construção, confiando no valor do empreendimento para a cidade e em respeito à amizade que mantinham com o administrador do mercado, Olímpio Marteleto. Para que o galpão pudesse ser fechado no prazo estabelecido, foram contratadas quatro construtoras, cada uma responsável pela obra em uma das fachadas. Ao fim de 15 dias, os 14 000 metros quadrados de terreno estavam totalmente fechados. Os associados, com seu empreendedorismo e entusiasmo, viam seu esforço recompensado.</p>

<div class="comentarios">
    <form action="" method="post">
      <textarea name="coment" id="coment" rows="10" cols="50" required></textarea><br>
      <button type="submit" name="btn">Enviar</button>
    </form>
</div>
 <div class="cx-coment">

<?php
  require_once("conecta.php");
  if(isset($_POST['btn']))
  {
      $coment = $_POST['coment'];
      $sql = "insert into comentarios (coment, datahora) values ('$coment', now())";
      $res = mysqli_query(con(), $sql);
  };
  $sql2 = "select * from comentarios order by datahora desc";
  $res2 = mysqli_query(con(), $sql2);
  while($linha = mysqli_fetch_array($res2, 2))
  {
    echo "<li>$linha[1]";
  }
?>
 </div>

 </div>

</body>
</html>
