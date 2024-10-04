<?php
    if(!isset($_SESSION)) {
        session_start();
    }
?>

<?php
    if(!isset($_SESSION['idUser'])) {
        die('<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect</title>
    <link rel="stylesheet" href="..\style.css" />
    <style>
    .all-in {
        height: 300px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    img {
        width: 100px;
    }

    .card {
        width: 250px;
        padding: 1.9rem 1.2rem;
        text-align: center;
        background: #2a2b38;
    }

    /*Inputs*/
    .field {
        margin-top: .5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: .5em;
        background-color: #1f2029;
        border-radius: 4px;
        padding: .5em 1em;
    }

    .input-icon {
        height: 1em;
        width: 1em;
        fill: #ffeba7;
    }

    .input-field {
        background: none;
        border: none;
        outline: none;
        width: 100%;
        color: #d3d3d3;
    }

    /*Text*/
    .title {
        margin-bottom: 1rem;
        font-size: 1.5em;
        font-weight: 500;
        color: #f5f5f5;
    }

    /*Buttons*/
    .btn {
        margin: 1rem;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        font-size: .8em;
        text-transform: uppercase;
        padding: 0.6em 1.2em;
        background-color: #ffeba7;
        color: #5e6681;
        box-shadow: 0 8px 24px 0 rgb(255 235 167 / 20%);
        transition: all .3s ease-in-out;
    }

    .btn-link {
        color: #f5f5f5;
        display: block;
        font-size: .75em;
        transition: color .3s ease-out;
    }

    /*Hover & focus*/
    .field input:focus::placeholder {
        opacity: 0;
        transition: opacity .3s;
    }

    .btn:hover {
        background-color: #5e6681;
        color: #ffeba7;
        box-shadow: 0 8px 24px 0 rgb(16 39 112 / 20%);
    }

    .btn-link:hover {
        color: #ffeba7;
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
                <input id="tema" type="checkbox"></input>
            </div>
        </div>
    </header>
    <div class="all-in">
        <div class="card">
            <img src="https://www.freeiconspng.com/uploads/error-icon-32.png" alt="img-error">
            <p>Você não pode acessar esta página porque não está logado</p>
            <button class="btn" type="submit"><a href="login.php">Entrar</a></button>
            <button class=" btn" type="submit"><a href="..\home.php">Home</a></button>

            </form>
        </div>
    </div>
</body>

</html>');
    }
?>