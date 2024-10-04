<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Digite seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Digite sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "select * from usuarios where email = '$email' and senha =  '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['idUser'] = $usuario['idUser'];
            $_SESSION['name'] = $usuario['name'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style.css" />
    <title>Login</title>
    <style>
    .form-login {
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

    .title-form-login {
        color: var(--font-color);
        font-weight: 900;
        font-size: 20px;
        margin-bottom: 25px;
    }

    .title-form-login span {
        color: var(--font-color-sub);
        font-weight: 600;
        font-size: 17px;
    }

    .input-form-login {
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

    .input-form-login::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
    }

    .input-form-login:focus {
        border: 2px solid var(--input-focus);
    }

    .login-with {
        display: flex;
        gap: 20px;
    }

    .button-confirm:active {
        box-shadow: 0px 0px var(--main-color);
        transform: translate(3px, 3px);
    }

    .button-confirm {
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

    .container-login {
        width: 100%;
        height: 750px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>

<body>
    <header>
        <div class="div_principal">
            <div id="nome">
                <a href="..\home.php">BH Explorer</a>
            </div>
            <div id="central">
                <a href="..\home.php">Home</a>
                <a href="..\sobre.php">Sobre</a>
            </div>
            <div id="cadastro">
                <a href="pfav.php"><span>Favoritos</span></a>
                <a href="login.php"><span>Logar / Criar conta</span></a>
                <label class="switch">
                    <input id="tema" type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </header>
    <div class="container-login">
        <form class="form-login" method="post">
            <div class="title-form-login">Bem Vindo,<br><span>faça login para continuar</span></div>
            <input type="email" placeholder="Email" name="email" class="input-form-login">
            <input type="password" placeholder="Senha" name="senha" class="input-form-login">
            <span class="title-form-login">Ainda não possui cadastro? <br><a href="..\create.php">Clique Aqui</a></span>
            <div class="login-with">
            </div>
            <button class="button-confirm" type="submit">Confirmar</button>
        </form>
    </div>
    <script src="..\javascript.js"></script>
</body>

</html>