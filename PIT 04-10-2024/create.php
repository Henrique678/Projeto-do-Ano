<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Create</title>
    <style>
    .form-create {
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

    .title-form-create {
        color: var(--font-color);
        font-weight: 900;
        font-size: 20px;
        margin-bottom: 25px;
    }

    .title-form-create span {
        color: var(--font-color-sub);
        font-weight: 600;
        font-size: 17px;
    }

    .input-form-create {
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

    .input-form-create::placeholder {
        color: var(--font-color-sub);
        opacity: 0.8;
    }

    .input-form-create:focus {
        border: 2px solid var(--input-focus);
    }

    .create-with {
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

    .button-log:active,
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

    .container-create {
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
                <a href="home.php">BH Explorer</a>
            </div>
            <div id="central">
                <a href="home.php">Home</a>
                <a href="sobre.php">Sobre</a>
            </div>
            <div id="cadastro">
                <a href="login\pfav.php"><span>Favoritos</span></a>
                <a href="login\login.php"><span>Logar / Criar conta</span></a>
                <label class="switch">
                    <input id="tema" type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>
        </div>
    </header>
    <div class="container-create">
        <form action="index.php?action=create" class="form-create" method="post">
            <div class="title-form-create">Bem Vindo,<br>
                <span>insira seus dados para continuar</span>
            </div>
            <input type="text" placeholder="Nome" name="name" class="input-form-create" required>
            <input type="email" placeholder="Email" name="email" class="input-form-create" required>
            <input type="password" placeholder="Senha" name="senha" class="input-form-create" required>
            <div class="create-with"></div>
            <button class="button-confirm" type="submit">Confirmar</button>
        </form>
    </div>
    <script src="..\javascript.js"></script>
</body>

</html>