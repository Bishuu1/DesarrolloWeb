<?php
    include_once("header.php");
    $randomNumber = rand(0,37);
    $message = "<p>Elige un número entre 0 y 37(Equivale al 00), y la cantidad que quieras apostar para comenzar a jugar!</p>";
    $ganador = 36*$_GET["CantApuesta"];

    if ( isset($_GET["CantApuesta"]) && isset($_GET["NumeroApuesta"]) && $_GET["CantApuesta"] !="" && $_GET["NumeroApuesta"] !=""){
?>

<script>
$(function() {
    function rotate(numero) {
        arregloNumero = [-1, -172, 8, 226, 405, -97, 84, -58, 122, -20, 160, -49, 131, -161, 18, -124, 56, -86,
            93, 112, -67, 74, -104, 37, -142, -150, -29, 170, -10, 141, -38, 103, -76, 65, -113, 27, -152,
            178
        ];
        $("#ruleta-juego-imagen").css({'transform': 'rotate(' +parseInt(3600+arregloNumero[numero])+ 'deg)'});
    }


    rotate(<?php print($randomNumber) ?>);

    setTimeout(function() {
        $("#messageRuleta").css({
            'display': 'block'
        });
    }, 4000);

});
</script>

<?php
    if($_GET["NumeroApuesta"] == $randomNumber){
        $message = "<p id='messageRuleta' style='display:none;'> Felicitaciones, salió ".$randomNumber." ganaste $ ".$ganador."! Sigue jugando!</p>";
    }
    else{
        $message = "<p id='messageRuleta' style='display:none;'> Que lastima salió ".$randomNumber." y perdiste ".$_GET["CantApuesta"].". Sigue jugando!</p>";
    }
}

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
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="NombreJuego">
            <h1>Ruleta</h1>
        </div>
        <div class="Juego">
            <?php print($message);?>
            <img id="ruleta-juego-imagen" src="assets/images/ruleta_juego.webp" alt="JuegoRuleta" />
            <div class="ruleta-indicador"></div>
        </div>

        <div class="container-text">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="NumeroApuesta">Numero a apostar</label><br>
                            <input name="NumeroApuesta" type="number" min="0" max="37" step="1" />
                        </div>
                        <div class="col">
                            <label for="CantApuesta">Cantidad a apostar</label><br>
                            <input name="CantApuesta" type="number" min="0" step="1" />
                            <button type="submit" class="btn btn-primary mb-2">Ingresar apuesta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="text">
                <a href="AboutUs.php">Sobre Nosotros</a>
            </div>
            <div class="text">
                <a class="UsoResponsable" href="UsoResponsable.php">Uso Responsable</a>
            </div>
            <div class="copyright">
                <h7>Powerby Bishuu1</h7>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </script>
    <script>
    window.jQuery ||
        document.write(
            '<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>'
        );
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
</body>

</html>