<?php
include_once("header.php");

?>

<body>
    <header>
        <?php 
    if (isset($_SESSION["user"]["Email"])){ ?>
        <div class="alert alert-success" role="alert">
            <?php print($_SESSION["user"]["Email"]);?>
        </div>
        <?php } ?>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="/">7Lucky!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
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

        <div class="MainImg"><img src="assets/images/Main.webp" class="img-fluid" alt="Responsive image"></div>



        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img src="assets/images/ruleta_thumbnail.webp" alt="Miniatura Ruleta" class="rounded-circle">
                    <h2>Ruleta</h2>
                    <h6>Arriesgate!</h6>
                    <p><a class="btn btn-secondary" href="Ruleta.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="assets/images/dados_thumbnail.webp" alt="Miniatura Dados" class="rounded-circle">
                    <h2>Dados</h2>
                    <h6>Ya vienen con la suerte</h6>
                    <p><a class="btn btn-secondary" href="Dados.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img src="assets/images/moneda_thumbnail.webp" alt="Miniatura CaraSello" class="rounded-circle">
                    <h2>Cara o Sello</h2>
                    <h6>Prueba tu suerte con la moneda</h6>
                    <p><a class="btn btn-secondary" href="CaraSello.php" role="button">Jugar &raquo;</a></p>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->



        </div><!-- /.container -->
    </main>
    <?php  include_once("Footer.php")?>
</body>

</html>