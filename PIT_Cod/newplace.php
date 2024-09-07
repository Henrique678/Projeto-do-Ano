<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Botão com Opções e Imagem</title>
    <link rel="stylesheet" href="style.css" />
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
      <style>
            .form-newplace {
            --input-focus: #2d8cf0;
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --main-color: #323232;
            padding: 20px;
            background: lightgrey;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 20px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            box-shadow: 4px 4px var(--main-color);
            width: 300px;
            }

            .title-form-newplace {
            color: var(--font-color);
            font-weight: 900;
            font-size: 20px;
            margin-bottom: 25px;
            }

            .title-form-newplace span {
            color: var(--font-color-sub);
            font-weight: 600;
            font-size: 17px;
            }

            .input-form-newplace {
            width: 250px;
            height: 40px;
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

            .input-form-newplace::placeholder {
            color: var(--font-color-sub);
            opacity: 0.8;
            }

            .input-form-newplace:focus {
            border: 2px solid var(--input-focus);
            }

            .newplace-with {
            display: flex;
            gap: 20px;
            }

            .button-log {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            color: var(--font-color);
            font-size: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            }

            .button-log:active, .button-send:active {
            box-shadow: 0px 0px var(--main-color);
            transform: translate(3px, 3px);
            }

            .button-send {
            margin: 50px auto 0 auto;
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

            .container-newplace {
                width: 100%;
                height: 750px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
    </style>
    </header>
    <form class="form-newplace" method="post">
            <div class="title-form-newplace">Bem Vindo,<br><span>faça login para continuar</span></div>
            <input type="email" placeholder="Email" name="email" class="input-form-newplace">
            <input type="password" placeholder="Senha" name="senha" class="input-form-newplace">
            <span class="title-form-newplace">Ainda não possui cadastro? <br><a href="..\create.php">Clique Aqui</a></span>
            <div class="newplace-with">
            </div>
            <button class="button-send" type="submit">Enviar</button>
        </form>
  </body>
</html>
