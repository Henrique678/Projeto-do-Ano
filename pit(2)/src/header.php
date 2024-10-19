<?php 
    if(!isset($_SESSION)) {
?>
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
            <a href="pfav.php"><span>Favoritos</span></a>
            <a href="login.php"><span>Logar / Criar conta</span></a>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
    </div>
</header>
<?php
    } else { 
?>
<header>
    <div class="div_principal">
        <div id="nome">
            <a href="painel.php">BH Explorer</a>
        </div>
        <div id="central">
            <a href="painel.php">Home</a>
            <a href="sobre-protected.php">Sobre</a>
        </div>
        <div id="cadastro">
            <a href="pfav.php"><span>Favoritos</span></a>
            <a class="nome_usuario" href="logout.php">Bem vindo
                <?php echo $_SESSION['name']?></a>
            <label class="switch">
                <input id="tema" type="checkbox">
                <span class="slider"></span>
            </label>
        </div>
    </div>
</header>
<?php
}
?>