<?php
include_once("header.php")
?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="/">7Lucky!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Inicio</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Ruleta.php">Ruleta</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="Dados.php">Dados</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="CaraSello.php">Cara o Sello</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php 
                    if ( isset($_SESSION["user"]["Email"]) && $_SESSION["user"]["Email"] != "" ){
                        ?>
                    <a class="nav-link" href="Profile.php"><?php printf($_SESSION["user"]["Email"])?></a>
                </span>
                <?php
                }else{ ?>
                <span class="navbar-text">
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                    <?php }?>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="NombreJuego">
            <h1>Dados</h1>
        </div>
        <div class="Juego">
            <img src="assets/images/dados_juego.webp" class="img-fluid" alt="JuegoDados">
        </div>

        <div class="container-text">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="NumeroApuesta">Numero a apostar</label><br>
                            <input type="number" min="2" max="12" step="1" />
                        </div>
                        <div class="col">
                            <label for="CantApuesta">Cantidad a apostar</label><br>
                            <input type="number" min="0" step="1" />
                            <button type="submit" class="btn btn-primary mb-2">Ingresar apuesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php  include_once("Footer.php")?>
</body>

</html>