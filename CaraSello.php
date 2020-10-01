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
                    <a class="nav-link" href="login.php">Mi Cuenta</a>
                </span>
            </div>
        </nav>
    </header>

    <main role="main">
        <div class="NombreJuego">
            <h1>Cara o Sello</h1>
        </div>
        <div class="Juego">
            <img src="assets/images/moneda_juego.png" class="img-fluid" alt="JuegoRuleta">
        </div>
        <div class="container-text">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col">
                            <label for="Selector-CaraSello">Elige Cara o Sello</label>
                            <select class="form-control" id="Opcion-CaraSello">
                                <option>Cara</option>
                                <option>Sello</option>
                            </select>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
    window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
</body>

</html>